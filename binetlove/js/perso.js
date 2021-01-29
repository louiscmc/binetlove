window.onload = function() {

  var dataPoints = [];
  
  var chart = new CanvasJS.Chart("timeline", {
    animationEnabled: true,
    theme: "light2",
    title: {
      text: "Timeline des Lettres"
    },
    axisY: {
      title: "Units",
      titleFontSize: 24,
      includeZero: true
    },
    data: [{
      type: "column",
      yValueFormatString: "#,### Units",
      dataPoints: dataPoints
    }]
  });
  
  function addData(data) {
    for (var i = 0; i < data.length; i++) {
      dataPoints.push({
        x: new Date(data[i].date),
        y: data[i].units
      });
    }
    chart.render();
  
  }
  
  $.getJSON("https://canvasjs.com/data/gallery/javascript/daily-sales-data.json", addData);
  
  }