@extends('autre.layouts.app')
@section('style')

@endsection
 @section('breadcrumb')
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-3 pt-3 pb-2">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Paiement</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Information de Paiement</li>
                        </ol>
                    </nav>
                </div>
            </div>
 @endsection
@section('content')
    
    <div class="container-xxl py-5">
        <div class="container">
            <form method="post" action="{{route('checkout.stripe')}}">
                    @csrf
            <div class="row">
                
                    <div class="col-lg-7">
                        <div class="text-center wow fadeInUp mb-4" data-wow-delay="0.1s">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Information du Client</h5>
                        </div>
                                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                                            
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" required>
                                                            <label for="name">Nom</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="phone" class="form-control" id="email" name="telephone" placeholder="Telephone" required>
                                                            <label for="email">Telephone</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" placeholder="Adresse" name="msg" id="addresse" style="height: 80px" required></textarea>
                                                            <label for="message">Adresse</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="text-center wow fadeInUp mb-4" data-wow-delay="0.1s">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Dans votre Panier</h5>
                        </div>
                        @if(isset($carts))
                            @foreach($carts as $cart)
                                        <div class="d-flex align-items-center">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{$cart['product_info']->name}}</span>
                                                    <span class="text-primary">€ {{$cart['product_info']->price * $cart['qty'] }}</span>
                                                </h5>
                                            </div>
                                        </div>
                            @endforeach
                        @endif
                        <div class="text-end mt-3 mb-3">
                            <h5>Total de Votre Panier : {{session()->get('total')}} <i class="fa fa-1x fa-euro-sign"></i></h5>
                        </div>
                        <button class="btn btn-primary btn-sm w-100 py-3 @if(!isset($carts)) disabled @endif" 
                            type="submit">Finaliser le Paiement</button>
                    </div>
                
            </div>
            </form>
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