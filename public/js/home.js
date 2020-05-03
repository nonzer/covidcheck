
$(function(){
    $('#load').hide();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    $.get("/stat/global", function(data, status){
        $('#load').show();
        let tab = [];
        if(status){

            tab['name']=[];
            // tab['name'].push('Je suis cool');
            // tab['name'].push('nkd');

            tab['death']=[];
            tab['infecte']=[];
            tab['recovered']=[];

            // var i=0;
            
            // data.forEach(element => {
            //     tab['name'][i]= element.name;
            //     tab['death'][i]= element.death;
            //     tab['recovered'][i]= element.recovered;
            //     tab['infecte'][i]= element.infecte;
            //     i++;
            // });
            
            for (let i = 0; i < data.length; i++) {
                
                tab['name'][i] = data[i].name;          
                tab['death'][i] = data[i].death;
                tab['infecte'][i] = data[i].infecte;
                tab['recovered'][i] = data[i].recovered;
              
            }
            
        }else{
            alert("les donnees sont introuvables.");
        }
        chartLine(tab,'myChartLine');

    });

    $.get("/stat/regions", (data, status)=>{
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
                tab['infecte'][i] = data[i].infecte;
                tab['recovered'][i] = data[i].recovered;
      
            }
        }else{
            alert("les donnees sont introuvables.");
        }
        
        chartBar(tab,'myChart');

        // chartDoughnut(tab,'mydoughnut', 'infecte', 'pie');
        chartDoughnut(tab,'regiondoughnut-dea', 'death');
        chartDoughnut(tab,'regiondoughnut-inf', 'infecte');
        chartDoughnut(tab,'regiondoughnut-rec', 'recovered');
        
        $('#load').hide();
    });

});
