<script type="text/javascript">
    $(function () {
     var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }
  var mode = 'index'
  var intersect = true

  var $graf = $('#grafLibrosxGeneros');
  
  var graf = new Chart($graf, {
    type: 'bar', /*OTROS TIPOS DE GRAFICO SON EL PIE=PASTEL BAR=BARRAS LINE=LINEAS doughnut=dona*/
    data: {
      labels: <?=json_encode($graf1['labels'])?>,
      datasets: [
        {
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          borderColor: 'white',
          data: <?=json_encode($graf1['data'])?>
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 10) {
                value /= 10
                value += 'k'
              }

              return  value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  });
        
/// ESTADÍSTICAS
});
///GRAFICO DE PASTEL VENTAS POR GENEROS EN DIFERENTES////
$(function () {
     var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }
  var mode = 'index'
  var intersect = true

    var $graf = $('#ventasxgeneros');

    var graf = new Chart($graf, {
      type: 'doughnut',
      data: {
         labels: <?=json_encode($graf2['labels'])?>,
         datasets: [
              {
                data: <?=json_encode($graf2['data'])?>,
                backgroundColor : ['#2FB7FA','#1ED63F','#EADC19','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
              }
            ]
      },

      options: {
      maintainAspectRatio : false,
      responsive : true,
    }
    });
  });

    //-------------
    //- LINE CHART -
    //--------------
    $(function () {
     var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }
  var mode = 'index'
  var intersect = true

    var $graf = $('#librosxstock');

    var graf = new Chart($graf, {
      type: 'pie',
      data: {
         labels: <?=json_encode($graf3['labels'])?>,
         datasets: [
              {
                data: <?=json_encode($graf3['data'])?>,
                backgroundColor : ['#2FB7FA','#1ED63F','#EADC19','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
              }
            ]
      },

      options: {
      maintainAspectRatio : false,
      responsive : true,
    }
    });
  });


</script>
