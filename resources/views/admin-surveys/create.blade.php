@extends('layouts.master')
@section('bigbreadcrumb', 'Surveys')
@section('smallbreadcrumb', 'New Survey')
@section('content')

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">

                <div class="card">
                    <form method="post" action="{{route('admin.surveys.store')}}"><!-- Insertion here---------------------->
                        @csrf
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Create Survey </h3>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pl-lg-4">
                                @include('layouts.message')
                                <div class="row mb-10">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Title</label>
                                            <input type="text" name="title" class="form-control form-control-sm" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Step</label>
                                            <input type="number" min="1" name="step" class="form-control form-control-sm" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Description</label>
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                </div>
                                <div class="col-4 text-right">
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
