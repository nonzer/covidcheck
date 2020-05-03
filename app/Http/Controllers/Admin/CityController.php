<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.City.index')->with('cities', City::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.City.create')->with('regions', Region::all());
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

        $city = new City();
        $city->name = $request->name;
        $city->regions_id = $request->region_id;
        $city->save();

        Session::flash('success', 'Enregistrement reussi');

        return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.City.edit')->with([
            'city' => City::find($id),
            'regions' => Region::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator();

        $city = City::find($id);
        $city->name = $request->name;
        $city->regions_id = $request->region_id;
        $city->save();

        Session::flash('success', 'Mise à jour reussi');

        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::destroy($id);
        Session::flash('success', 'Suppression effectuée avec success');

        return redirect()->route('city.index');
    }

    /**
     * @return array
     */
    private function validator(){
        return request()->validate([
            'name' => ['required', 'string'],
            'region_id' => ['required', 'numeric']
        ]);
    }
}
