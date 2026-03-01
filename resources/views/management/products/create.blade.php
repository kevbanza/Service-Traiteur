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
              	<form method="post" action="{{route('products.store')}}"
              	enctype="multipart/form-data"><!-- Insertion here---------------------->
                        @csrf
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold"><i class="fa fa-hamburger"></i> Nouveau Produit</h5>
                  </div>
                  <div>
                  	<a href="{{route('products.index')}}" class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Retour</a>
                    <button type="submit" class="btn btn-success btn-sm">Valider</button>
                  </div>
                </div>
                <div>
                	@include('layouts.message')
                  <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                              	<label class="form-control-label" for="input-first-name">Nom du Produit</label>
                                <input type="text" name="name" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              	<label class="form-control-label" for="input-first-name">Description</label>
                                <input type="text" name="description" class="form-control form-control-sm" >
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Categories</label>
                                <select class="form-control form-control-sm" name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                              	<label class="form-control-label" for="input-first-name">Prix</label>
                                <input type="number" name="price" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Disponible</label>
                                <select class="form-control form-control-sm" name="is_available">
                                    <option value="yes">Oui</option>
                                    <option value="non">Nom</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Image 1</label>
                                <input type="file" name="image1" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Image 2</label>
                                <input type="file" name="image2" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Image 3</label>
                                <input type="file" name="image3" class="form-control form-control-sm" >
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