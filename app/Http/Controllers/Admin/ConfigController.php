<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Config;
use App\Home;
use App\Http\Controllers\Controller;
use App\Employment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    * Show update about form
    *
    * @return \Illuminate\View\View
    *
    */
    public function about()
    {
        $about = About::firstOrFail();
        if ($about) {

            return view('admin/config/about',[
                'about' => $about
            ]);
        }

        abort(404);
    }

    /**
    * Update the about page
    *
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postAbout(Request $request)
    {
        $this->validatePageForm($request);
        $about = About::first();

        $about->description = $request->input('description');
        $about->timestamps = false;
        $about->save();

        return redirect('/admin/config')->with('message', 'Your about page settings have been successfully updated');
    }

    /**
    * Show update jobs form
    *
    * @return \Illuminate\View\View
    *
    */
    public function jobs()
    {
        $jobs = Employment::firstOrFail();
        if ($jobs) {

            return view('admin/config/jobs',[
                'jobs' => $jobs
            ]);
        }

        abort(404);
    }

    /**
    * Update the jobs page
    *
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postJobs(Request $request)
    {
        $this->validatePageForm($request);
        $jobs = Employment::first();

        $jobs->description = $request->input('description');
        $jobs->timestamps = false;
        $jobs->save();

        return redirect('/admin/config')->with('message', 'Your jobs page settings have been successfully updated');
    }

    /**
    * Show update home form
    *
    * @return \Illuminate\View\View
    *
    */
    public function home()
    {
        $home = Home::firstOrFail();
        if ($home) {

            return view('admin/config/home',[
                'home' => $home
            ]);
        }

        abort(404);
    }

    /**
    * Update the home page
    *
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postHome(Request $request)
    {
        $this->validatePageForm($request);
        $home = Home::first();

        $home->description = $request->input('description');
        $home->timestamps = false;
        $home->save();

        return redirect('/admin/config')->with('message', 'Your home page settings have been successfully updated');
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
    * Validate a page form request
    *
    * @param $request
    */
    private function validatePageForm($request)
    {
        $request->validate([
            'description' => 'required'
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
