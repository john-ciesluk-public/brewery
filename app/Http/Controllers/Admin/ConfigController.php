<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Config;

class ConfigController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Show configs
    *
    * @return \Illuminate\View\View
    *
    */
    public function index()
    {
        $config = Config::firstOrFail();

        return view('admin/config/index',[
            'config' => $config
        ]);
    }

    /**
    * Show create config form
    *
    * @return \Illuminate\View\View
    *
    */
    public function create()
    {
        $config = Config::where('id',1)->firstOrFail();
        if (!$config) {
            return view('admin/config/create',[
                'boolean' => $this->boolean()
            ]);
        }

        return Redirect('admin/config');
    }

    /**
    * Save a new config
    *
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postCreate(Request $request)
    {
        $this->validateForm($request);

        Config::insert([
            'email' => $request->input('email'),
            'company' => $request->input('company'),
            'address_title' => $request->input('address_title'),
            'address_line1' => $request->input('address_line1'),
            'address_line2' => $request->input('address_line2'),
            'address_city' => $request->input('address_city'),
            'address_state' => $request->input('address_state'),
            'address_zipcode' => $request->input('address_zipcode'),
            'address_phone' => $request->input('address_phone'),
            'enable_registration' => $request->input('enable_registration'),
            'timestamps' => false
        ]);

        return redirect('/admin/config')->with('message', 'Your configuration settings have been successfully created');
    }

    /**
    * Show update config form
    *
    * @param integer $id
    * @return \Illuminate\View\View
    *
    */
    public function update($id)
    {
        $config = Config::where('id',$id)->firstOrFail();
        if ($config) {

            return view('admin/config/update',[
                'config' => $config,
                'boolean' => $this->boolean()
            ]);
        }

        abort(404);
    }

    /**
    * Update a config
    *
    * @param Request $request
    * @param integer $id
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postUpdate(Request $request, $id)
    {
        $this->validateForm($request);
        $config = Config::where('id',$id)->first();

        $config->email = $request->input('email');
        $config->company = $request->input('company');
        $config->address_title = $request->input('address_title');
        $config->address_line1 = $request->input('address_line1');
        $config->address_line2 = $request->input('address_line2');
        $config->address_city = $request->input('address_city');
        $config->address_state = $request->input('address_state');
        $config->address_zipcode = $request->input('address_zipcode');
        $config->address_phone = $request->input('address_phone');
        $config->enable_registration = $request->input('enable_registration');
        $config->timestamps = false;
        $config->save();

        return redirect('/admin/config')->with('message', 'Your configuration settings have been successfully updated');
    }

    /**
    *
    * Validate a form request
    *
    * @param $request
    */
    private function validateForm($request)
    {
        $request->validate([
            'email' => 'required|email',
            'company' => 'required|max:255',
            'address_title' => 'required|max:255',
            'address_line1' => 'required',
            'address_city' => 'required',
            'address_state' => 'required',
            'address_zipcode' => 'required',
            'address_phone' => 'required'
        ]);
    }

    /**
    *
    * Lists boolean form options
    *
    * @return array
    */
    private function boolean()
    {
        return [
            0 => 'No',
            1 => 'Yes'
        ];
    }
}
