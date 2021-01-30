


<div id="jumbo1" class="jumbotron jumbotron-fluid bg-faded">
    <div class="container">
        <h1 class="display-4 text-focus-in">Voici quelques <span class='red'>statistiques</span> !</h1>
    </div>
</div>
<div class='container'>
    <div class="ct-chart ct-golden-section"></div>  
</div>

<!-- scripts pour graphes -->
<script src="https://cdn.jsdelivr.net/npm/luxon@1.25.0/build/global/luxon.min.js"></script>
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<script>
    var lettres = '<?php timeline($dbh); ?>';
    var JSONObject = JSON.parse(lettres);
    len=JSONObject.dates.length;
    console.log(JSONObject.dates);
    for (k= 0; k < len; k++ ){
        JSONObject.dates[k]=JSON.stringify(new Date(JSONObject.dates[k]));
    }; 
    var data = {"labels":JSONObject.dates, "series":[JSONObject.nombre, JSONObject.chupa]};
    var options = {
    seriesBarDistance: 15,
    axisX: {
            type: Chartist.FixedScaleAxis,
        divisor: 5,
        labelInterpolationFnc: function (value) {
                const date = luxon.DateTime.fromISO(value);
                return date.toLocaleString(luxon.DateTime.DATETIME_MED);
            }
    }
    };

    var responsiveOptions = [
    ['screen and (min-width: 641px) and (max-width: 1024px)', {
        seriesBarDistance: 10,
            axisX: {
                type: Chartist.FixedScaleAxis,
            divisor: 5,
            labelInterpolationFnc: function (value) {
                $date = DateTime.fromISO(value);
                return $date.toLocaleString(DateTime.DATETIME_MED);
            }
        }
    }],
    ['screen and (max-width: 640px)', {
        seriesBarDistance: 5,
        axisX: {
            type: Chartist.FixedScaleAxis,
        divisor: 5,
        labelInterpolationFnc: function (value) {
            $date = DateTime.fromISO(value);
            return $date.toLocaleString(DateTime.DATETIME_MED);
        }
        }
    }]
    ];

    new Chartist.Line('.ct-chart', data, options, responsiveOptions);
</script>
