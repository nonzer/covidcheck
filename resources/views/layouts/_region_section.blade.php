<!-- Region Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class=title-big >Regions Camerounaises</h2>
                <div class="region btn">
                    @foreach(\App\Region::all() as $region)
                        <a href="{{route('show_region',$region->name)}}">{{$region->name}}</a>
                    @endforeach
                </div>
            </div >
            <br>
            <div class="col-md-4 ">
                <h3>Repartision du Nombre de Cas</h3>
                <canvas id="regiondoughnut-inf" width="30" height="30">
                </canvas>
            </div>
            <div class="col-md-4 col-sm-6">
                <h3>Repartision du Nombre de Décès</h3>
                <canvas id="regiondoughnut-dea" width="30" height="30">
                </canvas>
            </div>
            <div class="col-md-4 col-sm-6">
                <h3>Repartision du Nombre de Guéris</h3>
                <canvas id="regiondoughnut-rec" width="30" height="30">
                </canvas>
            </div>

        </div>
    </div>
</section>
<!-- End Region section -->
