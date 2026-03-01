@extends('layouts.master')
@section('bigbreadcrumb', 'Dashboards')
@section('smallbreadcrumb', 'Default')
@section('content')
        <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Persons</h5>
                      <span class="h2 font-weight-bold mb-0">{{$persons}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="fa fa-user"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                      <!--  <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
                       <span class="text-nowrap">Number of Persons</span>
                     </p>
                   </div>
                 </div>
               </div>
               <div class="col-xl-3 col-md-6">
                 <div class="card card-stats">
                   <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Surveys</h5>
                      <span class="h2 font-weight-bold mb-0">{{$surveyTaken}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="fa fa-check-square"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                      <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
                    <span class="text-nowrap">Number of surveys taken</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Questions</h5>
                      <span class="h2 font-weight-bold mb-0">{{$questions}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="fa fa-question-circle"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                      <!--   <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
                        <span class="text-nowrap">Number of questions</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6">
                  <div class="card card-stats">
                    <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                   <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>-->
                    <span class="text-nowrap">Toutes vos visites</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h5 class="h3 mb-0">Total orders</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>




      @include('layouts.footer')
    </div>
@endsection
@section('script')
 <!--   <script> $.get('s').done(function (response) {
            console.log(response.data.values);
            console.log(response);
            new Chart(document.getElementById("consumption-graph"), {
                type: 'line',
                data: {labels: response.data.labels, datasets: response.data.values.consumptions},
                options: {title: {display: true, text: ''}}
            });
            new Chart(document.getElementById("production-graph"), {
                type: 'line',
                data: {labels: response.data.labels, datasets: response.data.values.productions},
                options: {title: {display: true, text: ''}}
            });
        });

    </script>-->

    <script>
      var chartData = @json($data);
      var SalesChart = (function() {

  // Variables

  var $chart = $('#chart-bars');

  // Methods

  function init($chart) {

      var ordersChart = new Chart($chart, {
      type: 'bar',
      data: {
        labels: chartData.labels,
        datasets: [{
          label: 'Badge',
          data: chartData.values
        }]
      }
    });

    // Save to jQuery object
    $chart.data('chart', ordersChart);

  /*  var salesChart = new Chart($chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            gridLines: {
              lineWidth: 1,
              color: Charts.colors.gray[900],
              zeroLineColor: Charts.colors.gray[900]
            },
            ticks: {
              callback: function(value) {
                if (!(value % 10)) {
                  return '$' + value + 'k';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">$' + yLabel + 'k</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: chartData.labels,
        datasets: [{
          label: 'Performance',
          data: chartData.values
        }]
      }
    });

    // Save to jQuery object

    $chart.data('chart', salesChart);*/

  };


  // Events

  if ($chart.length) {
    init($chart);
  }

})();
    </script>
@endsection
