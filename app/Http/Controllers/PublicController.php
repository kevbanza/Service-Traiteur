<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Newletter;
use App\Models\TraiteurDemande;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Response;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::limit(3)->get();
        return view('autre.index')->with('categories', $categories);
        
    }

    public function about()
    {
        return view('autre.about');
    }

    public function booking()
    {
        return view('autre.booking');
    }

    public function contact()
    {
        return view('autre.contact');
    }

    public function addMessageContact(Request $request)
    {
        try{
            DB::beginTransaction();
            
            Message::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->msg
            ]);
                    
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->route('contact')->with('success', 'Message envoye');
    }

    public function service()
    {
        return view('autre.service');
    }

    public function serviceAdd(Request $request)
    {
        try{
            DB::beginTransaction();
            
            TraiteurDemande::create([
                'name' => $request->name,
                'email' => $request->email,
                'temps' => $request->datetime,
                'nbre_personne' => $request->nbre_personne,
                'detail' => $request->detail,
                'status' => 0
            ]);
                    
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->route('service')->with('success', 'Demande effectuée');
    }

    public function newletter(Request $request)
    {
        try{
            DB::beginTransaction();
            
            Newletter::create([
                'email' => $request->email,
            ]);
                    
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->back()->with('success', 'Ajouté a la newsletter.');
    }

    public function team()
    {
        return view('autre.team');
    }

    public function menu()
    {
        $categories = Category::limit(3)->get();
        return view('autre.menu')->with('categories', $categories);
    }

    public function panier()
    {
        $carts = session()->get('cart');

        return view('autre.panier')->with('carts', $carts);
    }

    public function checkout()
    {
        $carts = session()->get('cart');

        return view('autre.checkout')->with('carts', $carts);
    }

    public function addToBasket($id){
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            $cart[$id]['qty']++;
        } else{
            $cart[$id] = [
                'product_id' => $id,
                'qty'=> 1,
                'product_info' => Product::find($id)
            ];
        }    

        session()->put('cart', $cart);

        $total=0; $nbre_element=0;
        if(session()->get('cart')){
           foreach(session()->get('cart') as $cartelement) {
                $total = $total + ($cartelement['qty'] * $cartelement['product_info']->price) ;
                $nbre_element++;
            }    
        }
        $nbre_element = sizeof(session()->get('cart'));
        session()->put('total', $total);

        return [
            'response' => 'success',
            'message' => 'Le produit a été ajouté au panier!',
            'panier_element' => $nbre_element
        ];
    }

    public function updateBasket($id, $qty){

        $cart = session()->get('cart');

        if(isset($cart[$id])){
            if($qty == 0){
                unset($cart[$id]);
            }else{
                $cart[$id]['qty'] = (int)$qty;
            }           
        } else{
            $cart[$id] = [
                'product_id' => $id,
                'qty'=> (int)$qty,
                'product_info' => Product::find($id)
            ];
        } 

        session()->put('cart', $cart);

        $total=0;
        if(session()->get('cart')){
           foreach(session()->get('cart') as $cartelement) {
                $total = $total + ($cartelement['qty'] * $cartelement['product_info']->price) ;
            }    
        }

        session()->put('total', $total);  

        return redirect()->route('panier');
    }
}
