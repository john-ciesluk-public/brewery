<?php

namespace App\Http\Controllers;

use App\About;
use App\Beers;
use App\BeerHopsLinks;
use App\BeerMaltsLinks;
use App\Employment;
use App\Events;
use App\Home;
use App\Http\Controllers\Controller;
use App\MailingLists;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $description = Home::firstOrFail();

        $beers = Beers::get();
        $upcomingEvents = Events::whereDate('event_date', '>=', Carbon::today()->toDateString())->get();

        return view('welcome', [
            'beers' => $beers,
            'upcomingEvents' => $upcomingEvents,
            'ofAge' => session('ofAge') ? true : false,
            'description' => $description,
        ]);
    }

    /**
     * Show beers page
     *
     * @return \Illuminate\View\View
     *
     */
    public function beers()
    {
        $beers = Beers::where('deleted',0)->get();

        foreach($beers as $beer) {
            $ids[] = $beer['id'];
        }

        $malts = BeerMaltsLinks::join('beer_malts','beer_malts.id','=','beer_malts_links.beer_malts_id')->whereIn('beer_malts_links.beers_id', $ids)->get();
        $hops = BeerHopsLinks::join('beer_hops','beer_hops.id','=','beer_hops_links.beer_hops_id')->whereIn('beer_hops_links.beers_id', $ids)->get();

        $signatures = Beers::join('beer_types','beers.beer_types_id','=','beer_types.id')->where('type', 'signature')->where('deleted',0)->get();
        $seasonals = Beers::join('beer_types','beers.beer_types_id','=','beer_types.id')->where('type', 'seasonal')->where('deleted',0)->get();
        $experimentals = Beers::join('beer_types','beers.beer_types_id','=','beer_types.id')->where('type', 'experimental')->where('deleted',0)->get();

        return view('beers',
            [
                'beers' => $beers,
                'signatures' => $signatures,
                'seasonals' => $seasonals,
                'experimentals' => $experimentals,
                'malts' => $malts,
                'hops' => $hops
            ]
        );
    }

    /**
     * Show events page
     *
     * @return \Illuminate\View\View
     *
     */
    public function events()
    {
        $upcomingEvents = Events::whereDate('event_date', '>=', Carbon::today()->toDateString())->get();
        $pastEvents = Events::whereDate('event_date', '<', Carbon::today()->toDateString())->get();

        return view('events',[
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents
        ]);
    }

    /**
     * Show about page
     *
     * @return \Illuminate\View\View
     *
     */
    public function about()
    {
        $description = About::firstOrFail();

        return view('about',[
            'description' => $description
        ]);
    }

    /**
     * Show contact page
     *
     * @return \Illuminate\View\View
     *
     */
    public function contact()
    {

        return view('contact');
    }

    /**
     * Show jobs page
     *
     * @return \Illuminate\View\View
     *
     */
    public function jobs()
    {

        $description = Employment::firstOrFail();

        return view('jobs',[
            'description' => $description
        ]);
    }

    /**
     * Subscribe to the mailing list
     *
     * @param Request $request
     * @return string
     *
     */
    public function subscribe(Request $request)
    {
        $email = $request->input('email');
 		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $mailingList = MailingLists::where('email',$email)->first();

 			if ($mailingList) {
 				return 'This email has already been subscribed';
 			}

             MailingLists::insert([
                 'email' => $email,
             ]);

 			return 'Thanks for subscribing!';
 		}

 		return 'The email address you entered is not valid';
    }

    /**
     * Contact form submit
     *
     * @param Request $request
     * @return \Illuminate\View\View
     *
     */
    public function postContact(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Messages::insert([
            'name' => filter_var($request->input('name'), FILTER_SANITIZE_STRING),
            'email' => filter_var($request->input('email'), FILTER_VALIDATE_EMAIL),
            'message' => filter_var($request->input('message'), FILTER_SANITIZE_STRING)
        ]);

        return redirect()->back()->with('message', 'Your form has been submitted');
    }

    /**
     *
     * Set the ofAge session variable
     *
     */
    public function age()
    {
        session(["ofAge" => true]);
    }
}
