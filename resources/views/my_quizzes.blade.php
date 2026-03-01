
@extends('layouts.master')
@section('bigbreadcrumb', 'My Quizzes')
@section('smallbreadcrumb', 'My Quizzes List')
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
                                <h3 class="mb-0">My Quizzes </h3>
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
                                    <th>Name</th>
                                    <th>Result (%)</th>
                                    <th>Time</th>
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
    <script src="{{asset('assets/datatable/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/datatable/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('assets/datatable/all_export.js')}}"></script>

    <script type="text/javascript">
        var table;
        $(function () {

             table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{{ route('my-quizzes.fetch') }}"
                },
                "order": [[2, "asc"]],
                columns: [
                    {data: 'person_name', name: 'person_name'},
                    {data: 'result_percent', name: 'result_percent'},
                    {data: 'action', name: 'action',
                        render: function( data, type, row){
                            return row.minute_seconds;
                        }
                    }
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                       "extend": 'excel',
                       "text": '<i class="fa fa-file-excel-o" style="color: green;">Excel</i>',
                       "titleAttr": 'Excel',                               
                       "action": newexportaction
                    },
                ]
            });

        });
    </script>

@endsection
