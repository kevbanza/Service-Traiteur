@extends('layouts.master')
@section('bigbreadcrumb', 'Survey')
@section('smallbreadcrumb', 'Lesson')
@section('style')
  <link rel="stylesheet" href="{{asset('assets/css/sweetalert.css')}}" type="text/css">
@endsection

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1 mt-2">
                @include('layouts.message')
                <div class="card">
                    <!-- Card header -->
                    <form method="post" action="{{route('surveys.store.second.survey')}}"><!-- Insertion here---------------------->
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
                                    <button type="submit" class="btn btn-sm btn-primary">Go to the Quiz</button>
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
                            @foreach($questions as $key=>$question)
                            <div class="col-lg-12 row" id="videoDiv_{{$question->id}}" @if($question->id!==13) style="display:none"  @endif>
                                <div class="col-lg-12">
                                    <ul>
                                        <li>{{$question->description}}</li>
                                    </ul>
                                    <div class="mb-5 text-center mt-2">
                                        <iframe width="560" height="315" src="{{$question->link}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-lg-12 row">
                                    <div class="col-lg-2"></div>

                                    <div class="col-lg-4">
                                        @if($question->id!==0) 
                                            <a class="btn btn-sm btn-secondary" onclick="previousVideo({{$question->id}})">Previous</a>
                                        @endif
                                    </div>

                                    <div class="col-lg-4 text-right mb-5">
                                        <a class="btn btn-sm btn-primary text-white" onclick="nextVideo({{$question->id}})">Next</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-lg-12 row" id="videoDiv_{{$questions->count()}}" style="display:none">
                                <div class="col-lg-12">
                                    <div class="mb-5 text-center mt-2">
                                        <h4>Thank you for taking the training!</h4>
                                        <button type="submit" class="btn btn-sm btn-primary">Go to the Quiz</button>
                                    </div>
                                </div>
                                <div class="col-lg-12 row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4">
                                            <a class="btn btn-sm btn-secondary" onclick="previousVideo({{$questions->count()}})">Previous</a>
                                    </div>
                                </div>
                            </div>
                        <div class="col-lg-12">


                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-sm btn-primary">Go to the Quiz</button>
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
    <script src="{{asset('assets/js/sweetalert.js')}}"></script>
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

/*
$(document).ready(function() {
      $(window).on('beforeunload', function() {
        // This function will be executed when the user leaves the tab
        return 'Are you sure you want to leave? Your unsaved changes may be lost.';
      });
    });
*/

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
    console.log(id+1);
        Swal.fire({
          title: 'Are you sure?',
          text: "Have you finish this lesson? Do you really want to go to the next lesson?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            //console.log(id+1);
            updateBadge(id+1);
            var nextId= id+1;
            setTimeout(function() {$('#videoDiv_'+id).slideUp("slow")}, 500);
            setTimeout(function() {$('#videoDiv_'+nextId).slideDown("slow")}, 1000)
          }
        });  
    }
 
    function updateBadge(videoId){
            var data = {
                '_token': '{{csrf_token()}}',
                'next_video_id': videoId,
            };

            $.ajax({
                url: "{{ route('surveys.change.category') }}", // URL of the route you defined
                type: "POST",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log(response.message);
                    // Handle the success response here
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Handle the error response here
                }
            });
    }

</script>
@endsection
