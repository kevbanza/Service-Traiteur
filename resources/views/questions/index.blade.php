@extends('layouts.master')
@section('bigbreadcrumb', 'Questions')
@section('smallbreadcrumb', 'Questions List')
@section('style')
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        .dataTable{
            width:100%!important;
        }
    </style>
@endsection
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1 mt-2">

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h3 class="mb-0">Questions List </h3>
                            </div>
                            <div class="col-lg-4 text-right">
                                <a href="{{route('questions.create')}}" class="btn btn-sm btn-primary">New Question</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @include('layouts.message')
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
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th>Description</th>
                                    <th>Survey</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                </tbody>
                            </table>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        var table;
        $(function () {

             table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{{ route('questions.fetch') }}"
                },
                "order": [[2, "asc"]],
                columns: [
                    {data: 'description', name: 'description'},
                    {data: 'survey_name', name: 'survey_name'},
                    {data: 'action', name: 'action',
                        render: function( data, type, row){
                            var button =``;
                            button +=`<a class="btn btn-sm btn-primary" href="{{url('questions/edit')}}/`+row.id+`"><i class="fa fa-edit text-white"></i></a>`
                            return button;
                        }
                    }
                ]
            });

        });
    </script>

@endsection
