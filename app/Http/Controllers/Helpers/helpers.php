<?php
use App\City;
use App\Statistic;
use Illuminate\Support\Facades\Auth;



if(!function_exists('total_of')){

    //determine les total des count
    function total_of($type_stat = 'infecte', $region=''){
        $total =0;
        $sql = "SUM($type_stat) as total";
        
        if($region != "" && !empty($region)){
            $sql = "SELECT SUM($type_stat) as 'total' 
                    FROM stats 
                        INNER JOIN cities ON cities.id=stats.cities_id
                        INNER JOIN regions ON regions.id=cities.regions_id
                        WHERE regions.name='$region'";

            $total = DB::select($sql);
            $total = $total[0]->total;
        }else{
            $total = \DB::table('stats')
                                ->select(\DB::raw($sql))
                                ->get();
            $total = $total[0]->total;
        }

        return (int)$total;
    }
}

function dateForBd($date){
    if(!empty($date))
        return \DateTime::createFromFormat('m/d/Y', $date)->format('Y-m-d') ;
    return $date;
}

/**
 * Simon Helspers
 */

function Username(){
        return Auth::user()->username;
}

function RoleUser(){
    return Auth::user()->role;
}

function AvatarUser(){
    return Auth::user()->avatar;
}

function addZero($number){
    return ($number > 9) ? $number : '0'.$number;
}

function countCasCity($name, $val){
    $datas = Statistic::where('cities_id', $val)->pluck($name);
    $response = 0;
    foreach ($datas as $data):
        $response += $data;
    endforeach;

    return addZero($response);
}

function countCas($name){
    $datas = Statistic::all()->pluck($name);
    $response = 0;
    foreach ($datas as $data):
        $response += $data;
    endforeach;

    return addZero($response);
}
function countCasRegion($region_id, $name){
    $response = 0;
    $cities = City::where('regions_id', $region_id)->get();
    foreach ($cities as $city):
        $val = $city->id;
        $datas = Statistic::where('cities_id', $val)->pluck($name);
        foreach ($datas as $data):
            $response += $data;
        endforeach;
    endforeach;

    return $response;
}
function newFormat($date){ //modify by nkd
    // setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
    //     return \DateTime::createFromFormat('m/d/Y', $date)->format('d/m/Y') ;      
    return date("d, M Y",strtotime($date));
}
