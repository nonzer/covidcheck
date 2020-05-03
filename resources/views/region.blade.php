@extends('layouts.master',['title'=>'Region', 'type_page'=>'region'])

@section("content")
<!-- PAge home -->
<section class="grey-section">

    <!-- <div class="container-fluid"> -->
        <div class="container">
            <div class="row">
                
                <div>
                    <h1 id="region-name" class="title-big">{{$name}}                    
                    </h1>
                    <hr>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum aliquid nobis 
                        maiores corporis odit omnis ratione dolor rerum tempore? Voluptatem sint numquam 
                        temporibus quos, quasi officiis aliquam vel nesciunt explicabo.
                    </p>
                </div><br>

                
                <div class="box-stat">
                    <div class="stat">
                        <div class="count">
                            <span >{{ total_of('infecte', $name)}} <i class="" id="evo_inf"></i></span>
                        </div>
                        <div id="libelle-infected">
                            <span> Cas</span>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="count">
                            <span >{{ total_of('recovered', $name)}} <i class="" id="evo_rec"></i></span>
                        </div>
                        <div id="libelle-recovered">
                            <span> Guéris</span>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="count">
                            <span >{{ total_of('death', $name)}} <i class="" id="evo_dea"></i></span>
                        </div>
                        <div id="libelle-death">
                            <span > Décès</span>
                        </div>
                    </div>
                </div>

                <br>
                <div class="col-xs-12 col-md-6 boxchart">
                    <canvas id="myChart" width="400" height="400">                    
                        <img src="/image/loading.gif" alt="" id="load" height="46" width="46px">
                    </canvas>
                    <center class=" "><a href="#" class="btn  btn-xs">Partager</a></center>
                </div>
                <div class="col-xs-12 col-md-6">
                </div>

            </div> 
        <!-- </div> -->
    </div>
</section>
    
<!-- end page home -->
@endsection

@section("js")
    <script src="/js/region.js"></script>
@endSection