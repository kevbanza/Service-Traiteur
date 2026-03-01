
@extends('layouts.master')
@section('bigbreadcrumb', 'Dashboards')
@section('smallbreadcrumb', 'Default')
@section('content')
        <!-- Header -->
    
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats" style="height:80%">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h5 class="card-title text-uppercase text-muted mb-0">Badge</h5>
                    </div>
                    <div class="col-4">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-badge"></i>
                      </div>
                    </div>
                    <div class="col-12">
                      <span class="h3 font-weight-bold mb-0">{{auth()->user()->badge_name}}</span>
                    </div>
                  </div>
                   </div>
                 </div>
               </div>
               <div class="col-xl-3 col-md-6">
                 <div class="card card-stats" style="height:80%">
                   <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h5 class="card-title text-uppercase text-muted mb-0">Category</h5>
                    </div>
                    <div class="col-4">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                    <div class="col-12">
                      <span class="h3 font-weight-bold mb-0">{{auth()->user()->category_name}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats" style="height:80%">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h5 class="card-title text-uppercase text-muted mb-0">Number of Quizzes</h5>
                    </div>
                    <div class="col-4">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="fa fa-list"></i>
                      </div>
                    </div>
                    <div class="col-12">
                      <span class="h2 font-weight-bold mb-0">{{$quiz_number}}</span>
                    </div>
                  </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6">
                  <div class="card card-stats" style="height:80%">
                    <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h5 class="card-title text-uppercase text-muted mb-0">Highest Score</h5>
                    </div>
                    <div class="col-4">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                    <div class="col-12">
                      <span class="h2 font-weight-bold mb-0">{{$highest_score}} %</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div>
          <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                      <div class="col">
                        <h5 class="h3 mb-0">GAMIFICATION FOR TRAINING</h5>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Chart -->
                    <p>
                      <b>The main aim of this study</b> is to measure the impact of this gamification method on employees' participation and training outcomes
                    </p>
                    <p>
                      <b>The gamification method in training</b>  provides a joyful training environment to increase motivation and engagement and ensure more successful outcomes
                    </p>
                    <p>
                      For this purpose, a gamified learning environment is created to measure employee engagement and training outcomes. This training environment includes a <b>pre-survey</b> about engagement, four videos about <b>Microsoft Excel (spreadsheet)</b>, and a <b>post-test</b> about training outcomes.
                    </p>
                    <p>
                      It is expected that trainees who will participate in this experiment will complete all these stages in an average of <b>xx minutes</b>. Participation is completely voluntary and the data collected here will not be shared with third parties and will only be used for research.
                    </p>
                    <p>
                      Thank you for your co-operation. <br>
                      <b>Cyprus International University</b><br>
                      <b>Management Information Systems</b><br>
                      <b>Researcher:</b> Hyelda Ibrahim Kefas - E-mail: khyelda@yahoo.com<br>
                      <b>Thesis Advisor:</b> Assoc. Prof. Dr. Müesser Nat - E-mail: mnat@ciu.edu.tr<br>
                    </p>
                  </div>
                </div>
              </div>
          </div>
        </div>

    	    @include('layouts.footer')
    </div>

@endsection
@section('scripts')
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
@endsection
