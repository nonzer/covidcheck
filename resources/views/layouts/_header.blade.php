<nav class="header container-fluid">
    <div class="container">
        <div class="row">  
            <div class="col-md-4">
                <a href="/" class=logo_log >
                    <img src="/image/logo.svg" alt="logo CovidCheck" height="" width="150px">
                </a>   
            </div>      
                          
            <div id="menu" class="col-md-8">
                <ul class="text-right">
                    <li><a href="/" >Home</a> </li>
                    <li class="has-dropdown">
                        <a href="/">Region</a>
                        <!-- <ul class="dropdown">
                            <li>Est</li>
                            <li>Littoral</li>
                            <li>Ouest</li>
                            <li>Est</li>
                        </ul> -->
                    </li>
                    <li><a href="/">About</a></li>
                </ul>
            </div>

        </div>
    </div>
</nav>

<section class=section>
    <h2>Regions Camerounaise</h2>
    <ul>
        @foreach(\App\Region::all() as $region)
            <li>
                <a href="/region/{{$region->name}}">{{$region->name}}</a>
            </li>
        @endforeach
    </ul>
</section>
<!-- <div id="sub-head">
            
</div>     -->
