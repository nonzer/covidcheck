@extends('layouts.master',['title'=>'Acceuil', 'type_page'=>'home'])


@section("content")
<!-- PAge home -->
 <section class="grey-section">
        <div class="container">
            <div class="row">
                <h1 class="title-big">COVID-19 - Bilan Global Au Cameroun 
                    <img src="/image/loading.gif" alt="" id="load" height="46" width="46px">
                </h1>
                <p class="title-chart">Diagrammes recapitulatif <strong> en temps réel </strong>de la situation <strong> global au Cameroun</strong>. <br>
                </p>


                <div class="col-xs-12 col-md-8 boxchart">
                    <canvas id="myChartLine" width="400" height="400"></canvas>
                    <p class="text-center "><a href="#" class="btn  btn-xs">Partager</a></p>
                </div>
                <div class="col-md-2 col-xs-12 ">
                    <h4><i class="fa fa-sort-asc visible-xs"></i>Courbe d'évolution temporelle:</h4>
                    <div class="breadcrumb">
                        <span > Touchez les libellés pour interagir avec le Diagramme.</span>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur ad vitae tempora
                        obcaecati omnis incidunt modi nihil hic tenetur</p>
                </div>


                <div class="col-xs-12 col-md-8 boxchart">
                    <canvas id="myChart" width="400" height="400"></canvas>
                    <p class="text-center"><a href="#" class="btn  btn-xs">Partager</a></p>
                </div>
                <div class="col-md-2 col-xs-12 ">
                    <h4><i class="fa fa-sort-asc visible-xs"></i>Diagramme à bâton:</h4>
                    <div class="breadcrumb">
                        <span > Toucher les libellés pour interagir avec le Diagramme.</span>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur ad vitae tempora
                    </p>

                </div>

                
                
             </div>
        </div>
 </section>
   
<!-- end page home -->
@endsection

@section("js")
    <script src="/js/home.js"></script>
@endSection