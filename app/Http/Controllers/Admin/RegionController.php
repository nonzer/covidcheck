<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Region.index')->with('regions', Region::orderByDesc('id')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Region.create');
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

        $region = new Region();
        $region->name = $request->name;
        $region->slug = $request->slug;
        $region->save();

        Session::flash('success', 'Enregistrement reussi');

        return redirect()->route('region.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region $region
     * @return void
     */
    public function show(Region $region){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Region.edit')->with('region', Region::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validator();

        $region = Region::find($id);
        $region->name = $request->name;
        $region->slug = $request->slug;
        $region->save();

        Session::flash('success', 'Mise à jour reussi');

        return redirect()->route('region.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Region::destroy($id);
        Session::flash('success', 'Suppression effectuée avec success');

        return redirect()->route('region.index');
    }

    /**
     * @return array
     */
    private function validator(){
        return request()->validate([
            'name' => ['required', 'string'],
            'slug' => ['required', 'string']
        ]);
    }
}
