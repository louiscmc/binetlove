


<div id="jumbo1" class="jumbotron jumbotron-fluid bg-faded">
    <div class="container">
        <h1 class="display-4 text-focus-in">Voici quelques <span class='red'>statistiques</span> !</h1>
    </div>
</div>
<div class='container chart'>
    <div class="ct-chart ct-major-sixth" id='timeline'></div> 
</div>
<br>
<br>


<!-- scripts pour graphes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.25.0/build/global/luxon.min.js"></script>
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<script src="js/chartist-plugin-axistitle.js"></script>
<script src="js/chartist-plugin-zoom.js"></script>

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
    var options = {
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
            //Axes
            Chartist.plugins.ctAxisTitle({
                axisX: {
                axisTitle: 'Rose :  Lettres, Rouge :  Chupa Chups',
                axisClass: 'ct-axis-title-x',
                offset: {
                    x: 0,
                    y: 30
                },
                textAnchor: 'middle'
                },
                axisY: {
                axisTitle: 'Rose :  Lettres, Rouge :  Chupa Chups',
                axisClass: 'ct-axis-title-y',
                offset: {
                    x: 0,
                    y: -1000
                },
                textAnchor: 'middle',
                flipTitle: true
                }
            })
        ] 
};
    //Magie !
    var chart = Chartist.Line('.ct-chart', data, options);

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
    var parent = document.querySelector('.chart');
    !parent.querySelector('#reset-zoom-btn') && parent.appendChild(btn);
</script>
