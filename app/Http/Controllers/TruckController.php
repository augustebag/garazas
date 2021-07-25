<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use App\Models\Mechanic;
use Validator;
use PDF;

class TruckController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $trucks = Truck::orderBy('plate', 'asc')->paginate(15);
        $dir = 'asc';
        $sort = 'maker';
        $defaultMechanic = 0;
        $mechanics = Mechanic::all();
        $s = '';

// RUSIAVIMAS

        if ($request->sort_by && $request->dir) {
            if ('maker' == $request->sort_by && 'asc' == $request->dir) {
                $trucks = Truck::orderBy('maker')->paginate(15)->withQueryString();
            } elseif ('maker' == $request->sort_by && 'desc' == $request->dir) {
                $trucks = Truck::orderBy('maker')->paginate(15)->withQueryString();
                $dir = 'desc';
            } elseif ('plate' == $request->sort_by && 'asc' == $request->dir) {
                $trucks = Truck::orderBy('plate')->paginate(15)->withQueryString();
                $dir = 'plate';
            } elseif ('plate' == $request->sort_by && 'desc' == $request->dir) {
                $trucks = Truck::orderBy('plate')->paginate(15)->withQueryString()->withQueryString();
                $dir = 'desc';
                $sort = 'plate';
            } else { $trucks = Truck::paginate(15)->withQueryString();
        }
    }

// FILTRAVIMAS

        elseif ($request->mechanic_id) {
            $trucks = Truck::where('mechanic_id', (int)$request->mechanic_id)->paginate(15)->withQueryString();
            $defaultMechanic = (int)$request->mechanic_id;
        } 
        
// PAIESKA

        elseif ($request->s) {
        $trucks = Truck::where('maker', 'like', '%'.$request->s.'%')->paginate(15);
        $s = $request->s;
        }

        else {
            $trucks = Truck::paginate(15);
        }

        return view('truck.index', 
        ['trucks' => $trucks,
        'dir' => $dir,
        'sort' => $sort,
        'mechanics' => $mechanics,
        'defaultMechanic' => $defaultMechanic,
        's' => $s,
    ]);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mechanics = Mechanic::all();
        return view('truck.create', ['mechanics' => $mechanics]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
       [
           'truck_maker' => ['required', 'min:3', 'max:64'],
           'truck_plate' => ['required', 'integer', 'max:64'],
           'truck_make_year' => ['required', 'integer', 'max:64'],
           'truck_mechanic_notices' => ['required', 'min:1', 'max:64'],
       ],);
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $truck = new Truck;
        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_make_year;
        $truck->mechanic_notices = $request->truck_mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();
        return redirect()->route('truck.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Truck  $Truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        return view('truck.show', ['truck' => $truck]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Truck  $Truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        $mechanics = Mechanic::all();
        return view('truck.edit', ['truck' => $truck, 'mechanics' => $mechanics]);
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Truck  $Truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        $validator = Validator::make($request->all(),
        [
            'truck_maker' => ['required', 'min:3', 'max:64'],
           'truck_plate' => ['required', 'integer', 'max:64'],
           'truck_make_year' => ['required', 'integer', 'max:64'],
           'truck_mechanic_notices' => ['required', 'min:1', 'max:64'],
        ],);
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_make_year;
        $truck->mechanic_notices = $request->truck_mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();
        return redirect()->route('truck.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Truck  $Truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('truck.index')->with('success_message', 'Sekmingai ištrintas.');

    }

    public function pdf(Truck $truck)
    {
        $pdf = PDF::loadView('truck.pdf', ['truck' => $truck]);
        return $pdf->download($truck ->maker.'.pdf');
    }
}
