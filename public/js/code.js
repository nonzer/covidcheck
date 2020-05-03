
  
const getColor = (typeChart, opacity=1)=>{
    if(typeChart == 'recovered'){
        // rgba(0, 165, 100, 1)
        return 'rgba(0, 165, 100, '+opacity+')'; 
    }else if(typeChart == 'infecte'){
        return 'rgba(255, 153, 51, '+opacity+')';
    }else{
        // rgb(223, 74, 64);
        return 'rgba(223, 74, 64, '+opacity+')';
    }
}
const getTotalCount = (data)=>{
    var total = 0;
    for (let i = 0; i < data.length; i++) {
        total += data[i];
    }
    return total;
}


//evolution of stat
const evolution = (tab, type_stat="infecte")=>{
    if(type_stat=='death'){
        return (tab.death[tab.death.length-1] - tab.death[tab.death.length-2]) > 0;
    }else if(type_stat=='infecte'){
        return (tab.infecte[tab.infecte.length-1] - tab.infecte[tab.infecte.length-2]) > 0;
    }else if(type_stat=='recovered'){
        return (tab.recovered[tab.recovered.length-1] - tab.recovered[tab.recovered.length-2]) > 0;
    }
}


/*=============================================
	1. Chart js by nkd
===============================================*/ 


const chartLine = function(data, id){

    var ctx = document.getElementById(id).getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data:{ 
            labels: data.name,
            datasets: [
                {
                label: 'Nombre de Cas',
                data: data.infecte,
                    backgroundColor: [
                        'rgba(255, 221, 13, 0.1)',
                    ],
                    borderColor: [
                        'rgba(255, 221, 13, 1)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Nombre de Morts',
                    data: data.death,
                        backgroundColor: [
                            'rgba(232, 119, 11, 0.1)',
                        ],
                        borderColor: [
                            'rgba(255, 0, 0, 1)',
                        ],
                        borderWidth: 1
                },
                {
                    label: 'Nombre de Guéri',
                    data: data.recovered,
                        backgroundColor: [
                            'rgba(72, 155, 23, 0.1)',
                        ],
                        borderColor: [
                            'rgba(72, 155, 23, 1)',
                        ],
                        borderWidth: 1
                }
            ],
            
        }
        ,
        // options: options
    });
}

const chartBar = function(data, id){
        var ctx = document.getElementById(id).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.name,
                datasets: [{
                            label: 'Nombre de Cas',
                            data: data.infecte,
                            backgroundColor: [
                                'rgba(255, 221, 13, 0.1)',
                                'rgba(255, 221, 13, 0.1)',
                                'rgba(255, 221, 13, 0.1)',
                                'rgba(255, 221, 13, 0.1)',
                                'rgba(255, 221, 13, 0.1)',
                                'rgba(255, 221, 13, 0.1)',
                                'rgba(255, 221, 13, 0.1)',
                                'rgba(255, 221, 13, 0.1)',
                                'rgba(255, 221, 13, 0.1)',
                                'rgba(255, 221, 13, 0.1)',
                            
                            ],
                            borderColor: [
                                'rgba(255, 221, 13, 1)',
                                'rgba(255, 221, 13, 1)',
                                'rgba(255, 221, 13, 1)',
                                'rgba(255, 221, 13, 1)',
                                'rgba(255, 221, 13, 1)',
                                'rgba(255, 221, 13, 1)',
                                'rgba(255, 221, 13, 1)',
                                'rgba(255, 221, 13, 1)',
                                'rgba(255, 221, 13, 1)',
                                'rgba(255, 221, 13, 1)',
                                
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Nombre de Mort',
                            data: data.death,
                            backgroundColor: [
                                'rgba(255, 0, 0, 0.2)',
                                'rgba(255, 0, 0, 0.2)',
                                'rgba(255, 0, 0, 0.2)',
                                'rgba(255, 0, 0, 0.2)',
                                'rgba(255, 0, 0, 0.2)',
                                'rgba(255, 0, 0, 0.2)',
                                'rgba(255, 0, 0, 0.2)',
                                'rgba(255, 0, 0, 0.2)',
                                'rgba(255, 0, 0, 0.2)',
                                'rgba(255, 0, 0, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 0, 0, 1)',
                                'rgba(255, 0, 0, 1)',
                                'rgba(255, 0, 0, 1)',
                                'rgba(255, 0, 0, 1)',
                                'rgba(255, 0, 0, 1)',
                                'rgba(255, 0, 0, 1)',
                                'rgba(255, 0, 0, 1)',
                                'rgba(255, 0, 0, 1)',
                                'rgba(255, 0, 0, 1)',
                                'rgba(255, 0, 0, 1)',
                                
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Nombre de Guéri',
                            data: data.recovered,
                            backgroundColor: [
                                'rgba(72, 155, 23, 0.1)',
                                'rgba(72, 155, 23, 0.1)',
                                'rgba(72, 155, 23, 0.1)',
                                'rgba(72, 155, 23, 0.1)',
                                'rgba(72, 155, 23, 0.1)',
                                'rgba(72, 155, 23, 0.1)',
                                'rgba(72, 155, 23, 0.1)',
                                'rgba(72, 155, 23, 0.1)',
                                'rgba(72, 155, 23, 0.1)',
                                
                            ],
                            borderColor: [
                                'rgba(72, 155, 23, 1)',
                                'rgba(72, 155, 23, 1)',
                                'rgba(72, 155, 23, 1)',
                                'rgba(72, 155, 23, 1)',
                                'rgba(72, 155, 23, 1)',
                                'rgba(72, 155, 23, 1)',
                                'rgba(72, 155, 23, 1)',
                                'rgba(72, 155, 23, 1)',
                                'rgba(72, 155, 23, 1)',
                                'rgba(72, 155, 23, 1)',
                                
                            ],
                            borderWidth: 1
                        },

                ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

}

const chartDoughnut  = function(data, id, type='recovered' , typeChar='doughnut'){
   
    let ctxx = document.getElementById(id).getContext('2d');
    var myDoughnutChart = new Chart(ctxx, {
        type: typeChar,
        data:{
                datasets: [{
                    data: (type == 'death')? data.death : ((type == 'infected')?data.infected: data.recovered ) ,
                    backgroundColor: [
                        getColor(type),
                        getColor(type),
                        getColor(type),
                        getColor(type),
                        getColor(type),
                        getColor(type, 0.6),
                        getColor(type, 0.4),
                        getColor(type, 0.8),
                        getColor(type, 0.9),
                        getColor(type, 0.8),
                        getColor(type, 0.7),
                    ],
                }],
                labels: data.name,
            },
        // options: options
    });
}



/*=============================================
	2. Particle js 
===============================================*/ 

// particlesJS("particles-js", {
//     "particles": {
//         "number": {
//             "value":80, "density": {
//                 "enable": true, "value_area": 800
//             }
//         }
//         , "color": {
//             "value": "#ffffff"
//         }
//         , "shape": {
//             "type":"circle", "stroke": {
//                 "width": 0, "color": "#000000"
//             }
//             , "polygon": {
//                 "nb_sides": 5
//             }
//             , "image": {
//                 "src": "img/github.svg", "width": 100, "height": 100
//             }
//         }
//         , "opacity": {
//             "value":0.5, "random":false, "anim": {
//                 "enable": false, "speed": 1, "opacity_min": 0.1, "sync": false
//             }
//         }
//         , "size": {
//             "value":3, "random":true, "anim": {
//                 "enable": false, "speed": 40, "size_min": 0.1, "sync": false
//             }
//         }
//         , "line_linked": {
//             "enable": true, "distance": 150, "color": "#ffffff", "opacity": 0.4, "width": 1
//         }
//         , "move": {
//             "enable":true, "speed":6, "direction":"none", "random":false, "straight":false, "out_mode":"out", "bounce":false, "attract": {
//                 "enable": false, "rotateX": 600, "rotateY": 1200
//             }
//         }
//     }
//     , "interactivity": {
//         "detect_on":"canvas", "events": {
//             "onhover": {
//                 "enable": true, "mode": "repulse"
//             }
//             , "onclick": {
//                 "enable": true, "mode": "push"
//             }
//             , "resize":true
//         }
//         , "modes": {
//             "grab": {
//                 "distance":400, "line_linked": {
//                     "opacity": 1
//                 }
//             }
//             , "bubble": {
//                 "distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3
//             }
//             , "repulse": {
//                 "distance": 200, "duration": 0.4
//             }
//             , "push": {
//                 "particles_nb": 4
//             }
//             , "remove": {
//                 "particles_nb": 2
//             }
//         }
//     }
//     , "retina_detect":true
// }
// );
