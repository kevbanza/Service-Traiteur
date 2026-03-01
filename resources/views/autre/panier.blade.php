
@extends('autre.layouts.app')
@section('bigbreadcrumb', 'Leader Board')
@section('smallbreadcrumb', 'Leader Board List')
@section('style')

@endsection
 @section('breadcrumb')
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-3 pt-3 pb-2">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Panier</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Panier</li>
                        </ol>
                    </nav>
                </div>
            </div>
 @endsection
@section('content')
    
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Votre Panier</h5>
                <h1 class="mb-5">Produit dans votre panier</h1>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row g-4">
                        @if(isset($carts))
                        @foreach($carts as $cart)
                            <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{asset('storage/'.$cart['product_info']->image1)}}" alt="" style="width: 80px; height: 80px">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>{{$cart['product_info']->name}}</span>
                                                <span class="text-primary">${{$cart['product_info']->price * $cart['qty'] }}</span>
                                            </h5>
                                            <div class="row">
                                                <div class="col-7 col-lg-10">
                                                    <small class="fst-italic">{{$cart['product_info']->description}}</small>
                                                </div>
                                                <div class="col-5 col-lg-2 text-center">
                                                    <input type="number" class="form-control" value="{{$cart['qty']}}" style="width:70px; padding: 0.175rem 0.55rem;" min="0"
                                                    id="qtychange_{{$cart['product_id']}}" onfocusout="updateCart({{$cart['product_id']}})">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                        @else
                        <div class="col-lg-12">
                                <div class="testimonial-item bg-transparent border rounded p-4">
                                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                                    <p class="text-center">Votre Panier est vide. Selectioner des produits s'il vous plait!</p>
                                    <p class="text-end"><i class="fa fa-quote-right fa-2x text-primary mb-3"></i></p>
                                </div>
                        </div>
                        @endif
                                
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item rounded pt-3 mb-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-euro-sign text-primary mb-4"></i> <span id="total" class="text-primary" style="font-size: 2.5rem">{{session()->get('total')}}</span>
                            <h5>Total de Votre Panier</h5>
                        </div>
                    </div>
                    <a class="btn btn-primary btn-sm w-100 py-3 @if(!isset($carts)) disabled @endif" 
                        href="{{route('checkout')}}">Payer</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
    function updateCart(productId){
        var quantity = $('#qtychange_'+productId).val();
            $.ajax({
               type:'GET',
               url:"{{ url('update/basket') }}/"+productId+"/"+quantity,
               success:function(data){
                    console.log(data);
                    Swal.fire({
                      title: "Succès!",
                      text: "Le panier mis à jour dans le panier!",
                      icon: "success"
                    });
                    window.location.href = "{{route('panier')}}";
               },
               error : function(data){
                    Swal.fire({
                      title: "Erreur!",
                      text: "Le produit n'a pas été ajouté au panier!",
                      icon: "error"
                    });
               }
            });
        }
</script>
@endsection