

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
              	<form method="post" action="{{route('categories.store')}}"><!-- Insertion here---------------------->
                        @csrf
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold"><i class="fa fa-bars"></i> Nouvelle Categorie</h5>
                  </div>
                  <div>
                  	<a href="{{route('categories.index')}}" class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Retour</a>
                    <button type="submit" class="btn btn-success btn-sm">Valider</button>
                  </div>
                </div>
                <div>
                  <div class="row">
                  	@include('layouts.message')
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-first-name">Nom de la categorie</label>
                                  <input type="text" name="name" class="form-control form-control-sm" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Icon</label>
                                    <select class="form-control form-control-sm" name="icon">
                                        <option value="coffee">Cafe</option>
                                        <option value="hamburger">Hamburger</option>
                                        <option value="utensils">Utensils</option>
                                        <option value="cocktail">Boissons</option>
                                    </select>
                                </div>
                            </div>
                  </div>
                </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('script')


@endsection