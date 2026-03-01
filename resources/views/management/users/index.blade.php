@extends('management.layouts.app')
@section('bigbreadcrumb', 'Leader Board')
@section('smallbreadcrumb', 'Leader Board List')
@section('style')
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        .dataTable{
            width:100%!important;
        }
    </style>
@endsection
@section('content')
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Produits</h5>
                  </div>
                  <div>
                    <a href="{{route('products.create')}}" class="btn btn-primary btn-sm">+ Nouveau Produit</a>
                  </div>
                </div>
                <div>
                	<div class="table-responsive">
                            <table class="table align-items-center table-flush" id="datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th>Nom du Produit</th>
                                    <th>Description</th>
                                    <th>Categorie</th>
                                    <th>Prix</th>
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
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://kevbanza.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">Kevbanza</a> </p>
        </div>
      </div>
@endsection
@section('script')
    <script src="{{asset('assets/datatable/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        var table;
        $(function () {

             table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url:"{{ route('products.fetch') }}"
                },
              //  "order": [[2, "asc"]],
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'category_id', name: 'category_id'},
                    {data: 'price', name: 'price'}
                ]
            });

        });
    </script>
@endsection