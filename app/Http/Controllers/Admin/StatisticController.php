<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Region;
use App\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Statistic.index')->with('statistics', Statistic::orderBy('date_out')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Statistic.create')->with('cities', City::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator();

        Statistic::create([
            "infecte" => $request->infecte,
            "recovered" => $request->recovered,
            "death" => $request->death,
            "cities_id" => $request->cities_id,
            "date_out" => dateForBd($request->date_out)
        ]);

        Session::flash('success', 'Enregistrement reussi');

        return redirect()->route('statistic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $val
     * @return \Illuminate\Http\Response
     */
    public function show($val)
    {
        return view('Admin.Statistic.show')->with([
            'regions' => Region::all(),
            'val' => $val
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Statistic.edit')->with([
            'statistic' => Statistic::find($id),
            'cities' => City::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validator();

        $stat = Statistic::find($id);
        $stat->infecte = $request->infecte;
        $stat->recovered = $request->recovered;
        $stat->death = $request->death;
        $stat->date_out = $request->date_out;
        $stat->save();

        Session::flash('success', 'Mise à jour reussi');

        return redirect()->route('statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Statistic::destroy($id);

        Session::flash('success', 'Suppression reussi');

        return redirect()->route('statistic.index');
    }

    /**
     * @return array
     */
    private function validator(){
        return request()->validate([
            'infecte' => ['required', 'numeric', 'min:0'],
            'recovered' => ['required', 'numeric', 'min:0'],
            'death' => ['required', 'numeric', 'min:0'],
            'date_out' => ['required', 'date']
        ]);
    }
}
