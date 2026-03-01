
@extends('autre.layouts.app')
@section('bigbreadcrumb', 'Leader Board')
@section('smallbreadcrumb', 'Leader Board List')
@section('style')

@endsection
 @section('breadcrumb')
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-3 pt-3 pb-2">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Paiement</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Paiement Réussi</li>
                        </ol>
                    </nav>
                </div>
            </div>
 @endsection
@section('content')
    
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <!--<h5 class="section-title ff-secondary text-center text-primary fw-normal">Votre Panier</h5>
                <h1 class="mb-5">Produit dans votre panier</h1>-->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="text-center">Votre Paiement a bien été effectué!</p>
                        <p class="text-end"><i class="fa fa-quote-right fa-2x text-primary mb-3"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>

</script>
@endsection