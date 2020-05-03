
<div class="bg-h">
        <div class="container">
            <div class="row">
                <h1 class="text-header">
                    COVID19 - <br>Les Chiffres En Temps Réel Au Cameroun.    
                </h1>
                <div class="box-stat">
                    <div class="stat">
                        <div class="count">
                            <span >{{ total_of('infecte')}} <i class="" id="evo_inf"></i></span>
                        </div>
                        <div id="libelle-infected">
                            <span> Cas</span>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="count">
                            <span >{{ total_of('recovered')}} <i class="" id="evo_rec"></i></span>
                        </div>
                        <div id="libelle-recovered">
                            <span> Guéris</span>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="count">
                            <span >{{ total_of('death')}} <i class="" id="evo_dea"></i></span>
                        </div>
                        <div id="libelle-death">
                            <span > Décès</span>
                        </div>
                    </div>
                </div>

                <hr>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia libero, harum quisquam aspernatur 
                    molestias eligendi voluptatem autem inventore corrupti? </p><br>
                <buttom class="btn-theme">Toutes Les Stats <img src="/image/arrow.svg" alt=""  width="18px" height="16px"> </buttom>
            </div>
    </div>
</div>   

