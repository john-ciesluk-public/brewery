<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
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
    * Show users
    *
    * @return \Illuminate\View\View
    *
    */
    public function index()
    {
        $users = User::get();

        return view('admin/users/index',[
            'users' => $users
        ]);
    }

    /**
    * Show create user form
    *
    * @return \Illuminate\View\View
    *
    */
    public function create()
    {
        return view('admin/users/create');
    }

    /**
    * Save a new user
    *
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postCreate(Request $request)
    {
        $this->validateForm($request);
        $password = $this->encryptFormPassword($request);

        Users::insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password
        ]);

        return redirect('/admin/users')->with('message', 'User has been successfully created');
    }

    /**
    * Show update user form
    *
    * @param integer $id
    * @return \Illuminate\View\View
    *
    */
    public function update($id)
    {
        $user = User::where('id',$id)->firstOrFail();
        if ($user) {

            return view('admin/users/update',[
                'user' => $user
            ]);
        }

        abort(404);
    }

    /**
    * Update a user
    *
    * @param Request $request
    * @param integer $id
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postUpdate(Request $request, $id)
    {
        $this->validateForm($request);
        $password = $this->encryptFormPassword($request);
        $user = User::where('id',$id)->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($password) {
            $user->password = $password;
        }
        $user->save();

        return redirect('/admin/users')->with('message', 'User has been successfully updated');
    }

    /**
    * Show delete user form
    *
    * @param integer $id
    * @return \Illuminate\View\View
    *
    */
    public function delete($id)
    {
        $user = User::where('id',$id)->firstOrFail();
        if ($user) {

            return view('admin/users/delete',[
                'user' => $user
            ]);
        }

        abort(404);
    }

    /**
    * Delete a user
    *
    * @param Request $request
    * @param integer $id
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postDelete(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/admin/users')->with('message', 'User has been successfully deleted');
    }

    /**
    *
    * Validate a form request
    *
    * @param $request
    */
    private function validateForm($request)
    {
        if ($request->password) {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email',
                'password' => 'confirmed'
            ]);
        }
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email'
        ]);
    }

    /**
    *
    * Encrypt a form password
    *
    * @param $request
    * @return string $password
    */
    private function encryptFormPassword($request)
    {
        if ($request->password) {
            return bcrypt($request->password);
        }
        return false;
    }
}
