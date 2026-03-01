@if(session('info'))
    <div id="infoDiv" class="alert alert-success">
       {{session('info')}}
    </div>
@endif
@if(session('error'))
    <div id="infoDiv" class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
