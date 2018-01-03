<?php

namespace App\Http\Controllers\Admin;

use App\BeerMalts;
use App\BeerMaltsLinks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaltsController extends Controller
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
    * Show malts
    *
    * @return \Illuminate\View\View
    *
    */
    public function index()
    {
        $malts = BeerMalts::get();

        return view('admin/malts/index',[
            'malts' => $malts
        ]);
    }

    /**
    * Show create malt form
    *
    * @return \Illuminate\View\View
    *
    */
    public function create()
    {
        return view('admin/malts/create');
    }

    /**
    * Save a new malt
    *
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postCreate(Request $request)
    {
        $this->validateForm($request);

        BeerMalts::insert([
            'malt' => $request->input('malt')
        ]);

        return redirect('/admin/malts')->with('message', 'Your malt has been successfully created');
    }

    /**
    * Show update malt form
    *
    * @param integer $id
    * @return \Illuminate\View\View
    *
    */
    public function update($id)
    {
        $malt = BeerMalts::where('id',$id)->firstOrFail();
        if ($malt) {

            return view('admin/malts/update',[
                'malt' => $malt
            ]);
        }

        abort(404);
    }

    /**
    * Update a malt
    *
    * @param Request $request
    * @param integer $id
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postUpdate(Request $request, $id)
    {
        $this->validateForm($request);
        $malt = BeerMalts::where('id',$id)->first();

        $malt->malt = $request->input('malt');
        $malt->save();

        return redirect('/admin/malts')->with('message', 'Your malt has been successfully updated');
    }

    /**
    * Show delete malt form
    *
    * @param integer $id
    * @return \Illuminate\View\View
    *
    */
    public function delete($id)
    {
        $malt = BeerMalts::where('id',$id)->firstOrFail();
        if ($malt) {

            return view('admin/malts/delete',[
                'malt' => $malt
            ]);
        }

        abort(404);
    }

    /**
    * Delete a malt and its link references
    *
    * @param Request $request
    * @param integer $id
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postDelete(Request $request, $id)
    {
        $malt = BeerMalts::findOrFail($id);
        BeerMaltsLinks::where('beer_malts_id',$id)->delete();

        $malt->delete();

        return redirect('/admin/malts')->with('message', 'Malt has been successfully deleted');
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
            'malt' => 'required|max:255'
        ]);
    }
}
