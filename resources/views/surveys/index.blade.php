@extends('layouts.master')
@section('bigbreadcrumb', 'Survey')
@section('smallbreadcrumb', 'Survey')
@section('style')
@endsection

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1 mt-2">
                @include('layouts.message')
                <div class="card">
                    <!-- Card header -->
                    <form method="post" action="{{route('surveys.store.first.survey')}}"><!-- Insertion here---------------------->
                        @csrf
                        <input type="hidden" name="survey_id" value="{{$survey->id}}">
                        <input type="hidden" name="start_time" value="{{$startTime}}">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h3 class="mb-0">{{$survey->title}}</h3>
                            </div>
                            <div class="col-lg-4 row">
                                <div class="col-lg-6 text-right">
                                    <span id="counter">0:00</span> 
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>                                
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-10">
                            <div class="col-lg-12">
                                @if(isset($success))
                                <div class="alert alert-success" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Success!</strong> Operation was successful !</span>
                                </div>
                                @endif
                            </div>
                        </div>
                            <!-- Light table -->
                        <div class="row mb-10">
                        <div class="col-lg-12">

                            <table class="table align-items-center table-flush" id="datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th style="width: 20%;" class="font-weight-bold">Yes</th>
                                    <th style="width: 20%;" class="font-weight-bold">No</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($questions as $question)
                                    <tr>
                                        <td>{{$question->description}}</td>
                                        <td style="width: 20%;"><input type="radio" name="response_{{$question->id}}" value="1"></td>
                                        <td style="width: 20%;"><input type="radio" name="response_{{$question->id}}" value="0"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>

@endsection
@section('script')
    <script type="text/javascript">
    </script>
<script>
    var seconds=0;
  function formatTime(seconds) {
    var minutes = Math.floor(seconds / 60);
    var remainingSeconds = seconds % 60;

    // Add leading zero if necessary
    if (remainingSeconds < 10) {
      remainingSeconds = '0' + remainingSeconds;
    }

    return minutes + ':' + remainingSeconds;
  }

  function updateCounter() {
    var counterElement = $('#counter');
    //var seconds = parseInt(counterElement.data('seconds'));

    setInterval(function() {
      seconds++;
      counterElement.text(formatTime(seconds));
    }, 1000);
  }

  $(document).ready(function() {
    updateCounter();
  });
</script>
@endsection
