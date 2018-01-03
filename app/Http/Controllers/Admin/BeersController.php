<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Beers;
use App\BeerMaltsLinks;
use App\BeerHopsLinks;
use App\BeerHops;
use App\BeerMalts;

class BeersController extends Controller
{
    public $seasonal = 'seasonal';
    public $signature = 'signature';
    public $experimental = 'experimental';

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
    * Show beers
    *
    * @return \Illuminate\View\View
    *
    */
    public function index()
    {
        $beers = Beers::join('beer_types','beers.beer_types_id','=','beer_types.id')->orderBy('type','ASC')->get();
        foreach($beers as $beer) {
            $ids[] = $beer['id'];
        }

        $malts = BeerMaltsLinks::join('beer_malts','beer_malts.id','=','beer_malts_links.beer_malts_id')->whereIn('beer_malts_links.beers_id', $ids)->get();
        $hops = BeerHopsLinks::join('beer_hops','beer_hops.id','=','beer_hops_links.beer_hops_id')->whereIn('beer_hops_links.beers_id', $ids)->get();

        return view('admin/beers/index',[
            'beers' => $beers,
            'malts' => $malts,
            'hops' => $hops
        ]);
    }

    /**
    * Show create beer form
    *
    * @return \Illuminate\View\View
    *
    */
    public function create()
    {
        return view('admin/beers/create',[
            'boolean' => $this->boolean(),
            'beerTypes' => $this->beerTypes()
        ]);
    }

    /**
    * Save a new beer
    *
    * @param Request $request
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postCreate(Request $request)
    {
        $this->validateForm($request);

        Beers::insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'ibu' => $request->input('ibu'),
            'og' => $request->input('og'),
            'abv' => $request->input('abv'),
            'hops' => $request->input('hops'),
            'malts' => $request->input('malts'),
            'calories' => $request->input('calories'),
            'available' => $request->input('available'),
            'deleted' => $request->input('deleted')
        ]);

        return redirect('/admin/beers')->with('message', 'Your beer has been successfully created');
    }

    /**
    * Show update beer form
    *
    * @param string $slug
    * @return \Illuminate\View\View
    *
    */
    public function update($slug)
    {
        $beer = Beers::where('slug',$slug)->firstOrFail();
        if ($beer) {

            $hops = $this->getBeerHops($beer['id']);
            $malts = $this->getBeerMalts($beer['id']);

            return view('admin/beers/update',[
                'beer' => $beer,
                'slug' => $slug,
                'boolean' => $this->boolean(),
                'beerTypes' => $this->beerTypes(),
                'hops' => $hops['hops'],
                'malts' => $malts['malts'],
                'hopsIds' => $hops['ids'],
                'maltsIds' => $malts['ids']
            ]);
        }

        abort(404);
    }

    /**
    * Update a beer
    *
    * @param Request $request
    * @param string $slug
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function postUpdate(Request $request, $slug)
    {
        $this->validateForm($request);
        $beers = Beers::where('slug',$slug)->first();

        $beers->title = $request->input('title');
        $beers->description = $request->input('description');
        $beers->image = $request->input('image');
        $beers->ibu = $request->input('ibu');
        $beers->og = $request->input('og');
        $beers->abv = $request->input('abv');
        $beers->calories = $request->input('calories');
        $beers->available = $request->input('available');
        $beers->deleted = $request->input('deleted');
        $beers->save();

        $this->updateHops($request->input('hops_ids'),$beers->id);
        $this->updateMalts($request->input('malts_ids'),$beers->id);

        return redirect('/admin/beers')->with('message', 'Your beer has been successfully updated');
    }

    /**
    * Show beer statistics page
    *
    * @return \Illuminate\View\View
    *
    */
    public function statistics()
    {
        $beers = Beers::get();
        $total_pints_sold = Beers::sum('pints_sold');
        $total_sales = Beers::select(\DB::raw('SUM(pints_sold * price) AS total_sales'))->get();

        return view('admin/beers/statistics',[
            'beers' => $beers,
            'total_pints_sold' => $total_pints_sold,
            'total_sales' => $total_sales
        ]);
    }

    /**
    *
    * Get all hops
    *
    * @return Json
    */
    public function getHops()
    {
        $hops = BeerHops::get();

        foreach ($hops as $hop) {
            $data[] = ['value' => $hop['hop'], 'id' => $hop['id']];
        }

        return json_encode($data);
    }

    /**
    *
    * Get all malts
    *
    * @return Json
    */
    public function getMalts()
    {

        $malts = BeerMalts::get();

        foreach ($malts as $malt) {
            $data[] = ['value' => $malt['malt'], 'id' => $malt['id']];
        }

        return json_encode($data);
    }

    /**
    *
    * Get hops for a beer
    *
    * @param integer $beerId
    * @return array
    */
    private function getBeerHops($beerId)
    {
        $h=$hid=[];

        $hops = BeerHopsLinks::join('beer_hops','beer_hops.id','=','beer_hops_links.beer_hops_id')->where('beer_hops_links.beers_id', $beerId)->get();

        foreach ($hops as $hop) {
            $h[] = $hop['hop'];
            $hid[] = $hop['beer_hops_id'];
        }

        $hops = implode(",",$h);
        $hopsIds = implode(",",$hid);

        return ['hops' => $hops, 'ids' => $hopsIds];
    }

    /**
    *
    * Get malts for a beer
    *
    * @param integer $beerId
    * @return array
    */
    private function getBeerMalts($beerId)
    {
        $m=$mid=[];
        $malts = BeerMaltsLinks::join('beer_malts','beer_malts.id','=','beer_malts_links.beer_malts_id')->where('beer_malts_links.beers_id', $beerId)->get();

        foreach ($malts as $malt) {
            $m[] = $malt['malt'];
            $mid[] = $malt['beer_malts_id'];
        }

        $malts = implode(",",$m);
        $maltsIds = implode(",",$mid);

        return ['malts' => $malts, 'ids' => $maltsIds];
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
    * Lists beer types
    *
    * @return array
    */
    private function beerTypes()
    {
        return [
            $this->signature => ucfirst($this->signature),
            $this->seasonal => ucfirst($this->seasonal),
            $this->experimental => ucfirst($this->experimental)
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
            'image' => 'required',
            'ibu' => 'required|numeric',
            'og' => 'required|numeric',
            'abv' => 'required',
            'hops' => 'required',
            'malts' => 'required',
            'calories' => 'required|numeric',
            'available' => 'required',
            'deleted' => 'required'
        ]);
    }


    /**
    *
    * Update hops for a beer
    *
    * @param string $hops
    * @param integer $beerId
    */
    private function updateHops($hops,$beerId)
    {
        BeerHopsLinks::where('beers_id',$beerId)->delete();

        $hops = explode(",",$hops);
        foreach ($hops as $hop) {
            $data[] = ['beer_hops_id' => $hop, 'beers_id' => $beerId];
        }

        BeerHopsLinks::insert($data);
    }

    /**
    *
    * Update malts for a beer
    *
    * @param string $hops
    * @param integer $beerId
    */
    private function updateMalts($malts,$beerId)
    {
        BeerMaltsLinks::where('beers_id',$beerId)->delete();

        $malts = explode(",",$malts);
        foreach ($malts as $malt) {
            $data[] = ['beer_malts_id' => $malts, 'beers_id' => $beerId];
        }

        BeerMaltsLinks::insert($data);
    }
}
