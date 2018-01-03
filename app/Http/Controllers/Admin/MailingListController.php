<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MailingLists;

class MailingListController extends Controller
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
    * Show events
    *
    * @return \Illuminate\View\View
    *
    */
    public function index()
    {
        $mailingList = MailingLists::get();
        
        return view('admin/mailinglist/index',[
            'mailingList' => $mailingList,
        ]);
    }

}
