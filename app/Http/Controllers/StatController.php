<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Stat, Region, Citie};

class StatController extends Controller
{
    /**
     * Get all the regions stats.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_region()
    {
        $regions= Region::all(); 
        $tab = $this->make_chart_tab($regions);
        return response()->json($tab);
    }

    /**
     * 
     * tab stats for all regions 
     * */
    protected function make_chart_tab($regions){
        $tab = [];

        // $tab = [
        //     'names'=>[],
        //     'stat'=>[
        //         'death'=>[],
        //         'infecte'=>[],
        //         'recovered'=>[]
        //     ]
        // ];
        
        // foreach( $regions as $key=>$region){
        //     $tab['names'][$key] = $region->name;
           
        //     foreach($region->cities()->get() as $city){
        //         $tab['stat']['death'][$key] += isset($city->stats()->get()->death)? $city->stats()->get()->death: 0;
        //         $tab['stat']['infecte'][$key] += isset($city->stats()->get()->infected)? $city->stats()->get()->infected: 0;
        //         $tab['stat']['recovered'][$key] += isset($city->stats()->get()->recoverd)? $city->stats()->get()->recoverd: 0;
        //     }
        // }
       
        foreach($regions as $key=>$region){

            $tab[$key]['name']= isset($region->name)?$region->name:'';
            $tab[$key]['death']=0;
            $tab[$key]['infecte']=0;
            $tab[$key]['recovered']=0;

            foreach($region->cities()->get() as $city){
                foreach($city->stats()->get() as $stats){
                    $tab[$key]['death']+= isset($stats->death)? $stats->death: 0;
                    $tab[$key]['infecte']+= isset($stats->infecte)? $stats->infecte: 0;
                    $tab[$key]['recovered']+= isset($stats->recovered)? $stats->recovered: 0;
                }
            }
        }
        return $tab;
    }

    protected function chart_global(){

        $tab = [];

        $stats = \DB::table('stats')
                            ->selectRaw('date_out as name, recovered, death, infecte')
                            ->orderBy('name','asc')
                            // ->where('date_out',$stat[2]->date_out)
                            ->get();

        $tab = $stats->groupBy('name')->toArray();
        $t= []; $i=0;
    
        foreach($tab as $key=>$el ){
            $t[$i]['name']=date('d M',strtotime($key));
            $t[$i]['death']=0;
            $t[$i]['recovered']=0;
            $t[$i]['infecte']=0;

            foreach($el as $k=>$stat ){
                $t[$i]['death']+= (int)$stat->death;
                $t[$i]['recovered']+= (int)$stat->recovered;
                $t[$i]['infecte']+= (int)$stat->infecte;
            }
            $i++;

        }

        return response()->json($t);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_one_region($name)
    {
        $region = Region::whereName($name)->first();
        $tab = $this->make_chart_tab_once($region);

        return response()->json($tab);
    }

    // just Form ONE region
    /**
     * 
     * methode qui retourne des donnees pour les Charts consernant une region specifique
     */
    protected function make_chart_tab_once($regions){
        $tab = [];
        
        foreach($regions->cities()->get() as $city){
            foreach($city->stats()->orderBy('date_out')->get() as $key=>$stats){

                // les libelles des Charts sont des dates
                $tab[$key]['name']= date("d M",strtotime($stats->date_out)) ; //avant cetait created_at
                $deaths= \DB::table('stats')
                                    ->select(\DB::raw('SUM(death) as deaths'))
                                    ->whereRaw("day(date_out) = day(?)",[$stats->date_out])
                                    ->get();
                $infectes=\DB::table('stats')
                                    ->select(\DB::raw('SUM(infecte) as infectes'))
                                    ->whereRaw("day(date_out) = day(?)",[$stats->date_out])
                                    ->get();
                $recovereds=\DB::table('stats')
                                    ->select(\DB::raw('SUM(recovered) as recovereds'))
                                    ->whereRaw("day(date_out) = day(?)",[$stats->date_out])
                                    ->get();

                $tab[$key]['death']=$deaths[0]->deaths;
                $tab[$key]['infecte']=$infectes[0]->infectes;
                $tab[$key]['recovered']=$recovereds[0]->recovereds;
            }
        }

        return $tab;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
