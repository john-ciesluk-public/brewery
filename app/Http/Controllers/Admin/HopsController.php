<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BeerHopsLinks;
use App\BeerHops;

class HopsController extends Controller
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
    * Show hops
    *
    * @return \Illuminate\View\View
    *
    */
    public function index()
    {
        $hops = BeerHops::get();

        return view('admin/hops/index',[
            'hops' => $hops
        ]);
    }

    /**
    * Show create hop form
    *
    * @return \Illuminate\View\View
    *
    */
    public function create()
    {
        return view('admin/hops/create');
    }

    /**
    * Save a new hop
    *
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postCreate(Request $request)
    {
        $this->validateForm($request);

        BeerHops::insert([
            'hop' => $request->input('hop')
        ]);

        return redirect('/admin/hops')->with('message', 'Your hop has been successfully created');
    }

    /**
    * Show update hop form
    *
    * @param integer $id
    * @return \Illuminate\View\View
    *
    */
    public function update($id)
    {
        $hop = BeerHops::where('id',$id)->firstOrFail();
        if ($hop) {

            return view('admin/hops/update',[
                'hop' => $hop
            ]);
        }

        abort(404);
    }

    /**
    * Update a hop
    *
    * @param Request $request
    * @param integer $id
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postUpdate(Request $request, $id)
    {
        $this->validateForm($request);
        $hop = BeerHops::where('id',$id)->first();

        $hop->hop = $request->input('hop');
        $hop->save();

        return redirect('/admin/hops')->with('message', 'Your hop has been successfully updated');
    }

    /**
    * Show delete hop form
    *
    * @param integer $id
    * @return \Illuminate\View\View
    *
    */
    public function delete($id)
    {
        $hop = BeerHops::where('id',$id)->firstOrFail();
        if ($hop) {

            return view('admin/hops/delete',[
                'hop' => $hop
            ]);
        }

        abort(404);
    }

    /**
    * Delete a hop and its link references
    *
    * @param Request $request
    * @param integer $id
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postDelete(Request $request, $id)
    {
        $hop = BeerHops::findOrFail($id);
        BeerHopsLinks::where('beer_hops_id',$id)->delete();

        $hop->delete();

        return redirect('/admin/hops')->with('message', 'Hop has been successfully deleted');
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
            'hop' => 'required|max:255'
        ]);
    }
}
