<div id="jumbo1" class="jumbotron jumbotron-fluid bg-faded">
    <div class="container">
        <h1 class="display-4 text-focus-in">Quelques <span class='red'>statistiques</span> de la campagne !</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col md-4"></div>
        <div class="col md-4 text-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text"><span class="dot" id="dot-rose"></span> Nombre de Lettres</p>
                    <p class="card-text"><span class="dot" id="dot-rouge"></span> Nombre de Chupa Chups</p>
                </div>
            </div>
        </div>
        <div class="col md-4"></div>
    </div>
</div>
<div class='container chart' id='append_btn'>
    <div class="ct-chart ct-major-sixth" id='timeline'></div> 
</div>
<br>
<br>
<div class="row">
        <div class="col md-4"></div>
        <div class="col md-4"></div>
    </div>
<div class='container chart'>
    <div class="ct-chart ct-major-sixth" id='camembert'></div> 
</div>



<!-- scripts pour graphes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.25.0/build/global/luxon.min.js"></script>
<script src="js/chartist-plugin-zoom.js"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/chartist-plugin-legend/0.6.2/chartist-plugin-legend.min.js></script>


<script>
    // On récupère les données de la DB grâce à la fonction timeline de database.php qui renvoie un JSON
    var data_ini = '<?php timeline($dbh); ?>';
    var JSONObject = JSON.parse(data_ini);

    // On transforme les dates en js Date
    console.log(JSONObject);
    len_lettres=JSONObject.lettres.length;
    len_chupas = JSONObject.chupas.length;

    for (k= 0; k < len_lettres; k++ ){
        JSONObject.lettres[k]['x']=new Date(JSONObject.lettres[k]['x']);
    }; 
    for (i= 0; i < len_chupas; i++ ){
        JSONObject.chupas[i]['x']=new Date(JSONObject.chupas[i]['x']);
    }; 


    // on formate pour Chartist
    var data = { 
        series : [
            {
                name: 'lettres',
                data: JSONObject.lettres
            },
            {
                name: 'chupas',
                data: JSONObject.chupas
            },
        ]
    };

    // On donne les options pour que ça formate bien (espacement des dates conforme)
    var options = {onlyInteger: true,
        axisX: {
            type: Chartist.FixedScaleAxis,
            divisor: 5,
            labelInterpolationFnc: function(value) {
                return moment(value).format('ddd DD/MM HH:mm:ss');
            }
        },
        plugins: [
            //Zoom
            Chartist.plugins.zoom({onZoom: onZoom }),
        ] 
    };
    //Magie !
    var chart = Chartist.Line('#timeline', data, options);

    //On crée le bouton pour dézoomer
    var resetFnc;
    function onZoom(chart, reset) {
        resetFnc = reset;
    }

    var btn = document.createElement('button');
    btn.id = 'reset-zoom-btn';
    btn.classList.add("btn");
    btn.classList.add("btn-rose");
    btn.innerHTML = 'Dézoomer';
    btn.style.float = 'right';
    btn.addEventListener('click', function() {
        resetFnc && resetFnc();
    });
    var parent = document.querySelector('#append_btn');
    !parent.querySelector('#reset-zoom-btn') && parent.appendChild(btn);

// pour le camembert

var labels_cam = ['Natation', 'Escalade', 'Roulade', 'Aviron', 'Bad', 'Basket', 'Boxe', 'Crossfit', 'Equitation', 'Escrime', 'Foot', 'Hand', 'Judo', 'Raid', 'Rugby', 'Tennis', 'Ultimate', 'Volley', 'Anonyme'];
var series_cam = [JSONObject.section.Natation, JSONObject.section.Escalade, JSONObject.section.Roulade, JSONObject.section.Aviron, JSONObject.section.Bad, JSONObject.section.Basket, JSONObject.section.Boxe, JSONObject.section.Crossfit, JSONObject.section.Equitation, JSONObject.section.Escrime, JSONObject.section.Foot, JSONObject.section.Hand, JSONObject.section.Judo, JSONObject.section.Raid, JSONObject.section.Rugby, JSONObject.section.Tennis, JSONObject.section.Ultimate, JSONObject.section.Volley, JSONObject.section.Anonyme];
var data_cam = { labels: labels_cam, series: series_cam };
new Chartist.Pie('#camembert', data_cam, {
    labelInterpolationFnc: function(value, idx) {
            if (series_cam[idx]==0){
                return "";
            }
            else {return value + " - " + series_cam[idx];}
    },
    donut: true,
    donutWidth: 80,
    donutSolid: false,
    startAngle: 0,
    showLabel: true
});
</script>
