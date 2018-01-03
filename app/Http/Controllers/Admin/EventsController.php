<?php

namespace App\Http\Controllers\Admin;

use App\Events;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
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
        $upcomingEvents = Events::whereDate('event_date', '>=', Carbon::today()->toDateString())->get();
        $pastEvents = Events::whereDate('event_date', '<', Carbon::today()->toDateString())->get();

        return view('admin/events/index',[
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents,
        ]);
    }

    /**
     * Show create event form
     *
     * @return \Illuminate\View\View
     *
     */
    public function create()
    {
        return view('admin/events/create',[
            'boolean' => $this->boolean()
        ]);
    }

    /**
     * Save a new event
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function postCreate(Request $request)
    {
        $this->validateForm($request);

        Events::insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'event_date' => $request->input('event_date'),
            'deleted' => $request->input('deleted')
        ]);

        return redirect('/admin/events')->with('message', 'Your event has been successfully created');
    }

    /**
     * Show update event form
     *
     * @param integer $id
     * @return \Illuminate\View\View
     *
     */
    public function update($id)
    {
        $event = Events::where('id',$id)->firstOrFail();
        if ($event) {
            return view('admin/events/update',[
                'event' => $event,
                'id' => $id,
                'boolean' => $this->boolean()
            ]);
        }

        abort(404);
    }

    /**
     * Update an event
     *
     * @param Request $request
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function postUpdate(Request $request, $id)
    {
        $this->validateForm($request);
        $events = Events::where('id',$id)->first();

        $events->title = $request->input('title');
        $events->description = $request->input('description');
        $events->event_date = $request->input('event_date');
        $events->deleted = $request->input('deleted');
        $events->save();

        return redirect('/admin/events')->with('message', 'Your event has been successfully updated');
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

    /**
     *
     * Validate a form request
     *
     * @param $request
     */
    private function validateForm($request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'deleted' => 'required'
        ]);
    }
}
