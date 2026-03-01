<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\DB;


class StripeController extends Controller
{
    public function checkout(Request $request){
        
        $code = uniqid();
        $price =0;
        try{
            DB::beginTransaction();
            $order = Order::create([
                'name' => $request->name,
                'phone' => $request->telephone,
                'code' => $code,
                'price' => $price,
                'address' => $request->msg,
                'person_id' => 1
            ]);

            if(session()->get('cart')){
                foreach(session()->get('cart') as $cartelement) {
                    $total = $cartelement['qty'] * $cartelement['product_info']->price;
                    ProductOrder::create([
                        'product_id' => $cartelement['product_info']->id,
                        'order_id' => $order->id,
                        'price' => $cartelement['product_info']->price,
                        'quantity' => $cartelement['qty'],
                        'total' => $total
                    ]);
                    $price = $price + $total ;
                }    
            }


            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' =>[
                            'currency' => 'eur',
                            'product_data' => [
                                'name' => 'Achat Nourriture !!! code :'.$code, 
                            ],
                            'unit_amount' => $price*100,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('success'),
                'cancel_url' => route('panier'),
            ]);
            DB::commit();
            return redirect()->away($session->url);
            
        }catch (Exception $e){
           DB::rollback();

        }
        
    }

    public function success(){
        return view('autre.retour_success');
    }
}
