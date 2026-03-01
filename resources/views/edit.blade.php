@extends('layouts.master')
@section('bigbreadcrumb', 'Person')
@section('smallbreadcrumb', 'Edit Profile ')
@section('content')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                    <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="../assets/img/theme/user.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="h3">
                                {{auth()->user()->name}}
                            </h5>
                            <!--
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bucharest, Romania
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <form method="post" action="{{route('users.update', auth()->user()->id)}}">
                    @csrf

                <div class="card">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit profile </h3>
                            </div>
                            <div class="col-4 text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">Information personnelle </h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Prenom et Nom</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Prenom et Nom" value="{{auth()->user()->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <!-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Numero de Telephone</label>
                                            <input type="text" name="contact" id="input-username" class="form-control" placeholder="+243xxxxxxxxx" value="{{auth()->user()->contact}}">
                                        </div>
                                    </div>-->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email" name="email" id="input-email" class="form-control" placeholder="nom@example.com" value="{{auth()->user()->email}}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr class="my-4">
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Securite</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Mot de passe</label>
                                            <input id="password" name="password" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Confirmer Mot de passe</label>
                                            <input id="password_again" name="password_again" class="form-control" type="password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
        <!-- Footer -->
        @include('layouts.footer')
    </div>
@endsection
