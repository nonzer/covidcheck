
$(function(){

    


    $('#load').hide();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let nameRegion = $('#region-name').html();

    $.get("/stat/regions/"+nameRegion, function(data, status){
        $('#load').show();
        let tab = [];
        if(status){

            tab['name']=[];
            tab['death']=[];
            tab['infecte']=[];
            tab['recovered']=[];
            for (let i = 0; i < data.length; i++) {
                tab['name'][i] = data[i].name;
                tab['death'][i] = data[i].death;
                tab['recovered'][i] = data[i].recovered;
                tab['infecte'][i] = data[i].infecte;
            }
        }else{
            alert("les donnees sont introuvables.");
        }
        //Charts      
        chartLine(tab,'myChart');

        // Evolutions
        if(evolution(tab)){
            $('#evo_inf').addClass("fa fa-sort-asc");
        }else{
            $('#evo_inf').addClass("fa fa-sort-desc");
        }
        if(evolution(tab, 'death')){
            $('#evo_dea').addClass("fa fa-sort-asc");
        }else{
            $('#evo_dea').addClass("fa fa-sort-desc");
        }
        if(evolution(tab, 'recovered')){
            $('#evo_rec').addClass("fa fa-sort-asc");
        }else{
            $('#evo_rec').addClass("fa fa-sort-desc");
        }



        
        $('#load').hide();
    });



});
