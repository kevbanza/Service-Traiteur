@extends('management.layouts.app')
@section('bigbreadcrumb', 'Service Traiteur')
@section('smallbreadcrumb', 'Liste des Commandes')
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
                    <h5 class="card-title fw-semibold"><i class="fa fa-calendar"></i> Commandes Traiteur</h5>
                  </div>
                  <div>
                    <!--<a href="{{route('products.create')}}" class="btn btn-primary btn-sm">+ Nouvelle Categorie</a>-->
                  </div>
                </div>
                <div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th>Infos de la Personne</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Nbre de Personne</th>
                                    <th>Detail</th>
                                    <th>Status</th>
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
                    url:"{{ route('orders.traiteur.fetch') }}"
                },
              //  "order": [[2, "asc"]],
                columns: [
                    {data: 'name', name: 'action',
                        render: function( data, type, row){
                            return row.name;
                        }
                    },
                    {data: 'email', name: 'email'},
                    {data: 'formatted_date', name: 'temps'},
                    {data: 'nbre_personne', name: 'nbre_personne'},
                    {data: 'detail', name: 'detail'},
                    {data: 'status', name: 'status',
                        render: function( data, type, row){
                        	if(row.status == 0){
                        		return `<span class="badge bg-warning rounded-3 fw-semibold">Non Lu</span>`
                        	}
                        	if(row.status == 1){
                        		return `<span class="badge bg-primary rounded-3 fw-semibold">Accepter</span>`
                        	}
                        	if(row.status == 2){
                        		return `<span class="badge bg-danger rounded-3 fw-semibold">Refuser</span>`
                        	}
                            return row.status;
                        }
                    },
                    {data: 'action', name: 'action',
                        render: function( data, type, row){
                            var button =``;
                            button +=`<a class="btn btn-sm btn-primary" href="{{url('categories/edit')}}/`+row.id+`"><i class="fa fa-edit text-white"></i></a>`;
                            button +=`<a class="btn btn-sm btn-danger" href="{{url('categories/edit')}}/`+row.id+`"><i class="fa fa-trash text-white"></i></a>`;
                            return button;
                        }
                    }
                ]
            });

        });
    </script>
@endsection