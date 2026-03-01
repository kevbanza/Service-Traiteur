@extends('layouts.master')
@section('bigbreadcrumb', 'Survey')
@section('smallbreadcrumb', 'Quiz')
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
                    <form method="post" action="{{route('surveys.store.quiz.survey')}}"><!-- Insertion here---------------------->
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
                        	@php
                        		$qCount=1;
                        	@endphp
							@foreach($questions as $questionKey=>$question)
                            <div class="col-lg-12" id="videoDiv_{{$questionKey}}" @if($questionKey!==0) style="display:none"  @endif>
								<div class="mb-5">
									<span class="mr-2">{{$qCount}}</span> {{$question->description}}
	                                <div class="row mt-2">
	                                    @foreach($question->answers as $key => $answer)
	                                    	<div class="col-lg-12">
	                                    		<input type="radio" name="response_{{$question->id}}" value="{{$answer->id}}" id="answer_{{$question->id.$key}}" class="ml-4">
	                                    		<label for="answer_{{$question->id.$key}}">{{$answer->description}}</label>
	                                    	</div>
	                                    @endforeach
	                                </div>
                                </div>
                                <div class="col-lg-12 row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4">
                                        @if($questionKey!==0) 
                                            <a class="btn btn-sm btn-secondary" onclick="previousVideo({{$questionKey}})">Previous</a>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 text-right mb-5">
                                        <a class="btn btn-sm btn-primary text-white" onclick="nextVideo({{$questionKey}})">Next</a>
                                    </div>
                                </div>
                            </div>
                            
                                @php
		                        	$qCount++;
		                        @endphp
                            @endforeach
                        
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
    alert('if you leave the quiz the form will be closed!!!')
  });

   $(document).ready(function() {
      function handleVisibilityChange() {
        if (document.hidden) {
          // Code to execute when the tab becomes inactive
          console.log('Tab is now inactive.');
        } else {
          // Code to execute when the tab becomes active
          console.log('Tab is now active.');
        }
      }

      // Add event listener for visibility change
      document.addEventListener('visibilitychange', handleVisibilityChange, false);
    });

      function previousVideo(id){
        var previoustId= id-1;
        $('#videoDiv_'+id).slideUp("slow");
        $('#videoDiv_'+previoustId).slideDown("slow");
   }

   function nextVideo(id){
        console.log(id)
        var nextId= id+1;
        setTimeout(function() {$('#videoDiv_'+id).slideUp("slow")}, 500);
        setTimeout(function() {$('#videoDiv_'+nextId).slideDown("slow")}, 1000)

    }
</script>
@endsection
