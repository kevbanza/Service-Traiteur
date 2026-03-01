<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function __construct()
    {
        // Apply the 'custom' middleware to this controller
        $this->middleware('is_manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('management.products.index')->with('categories', $categories);
    }

    public function fetch(Request $request)
    {
        $data = Product::all();

        return Datatables::of($data)
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('management.products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename1 = null;
        $filename2 = null; 
        $filename3 = null;
        try{
            DB::beginTransaction();
            if ($request->image1) {
                $file = $request->file('image1'); 
                $filename1 = 'products/'.uniqid().'_'.$file->getClientOriginalName();

                Storage::disk('public')->put($filename1, file_get_contents($file));
            }

            if ($request->image2){
                $file = $request->file('image2'); 
                $filename2 = 'products/'.uniqid().'_'.$file->getClientOriginalName();

                Storage::disk('public')->put($filename2, file_get_contents($file));
            }

            if ($request->image3){
                $file = $request->file('image3'); 
                $filename3 = 'products/'.uniqid().'_'.$file->getClientOriginalName();

                Storage::disk('public')->put($filename3, file_get_contents($file));
            }


            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'image1' => $filename1,
                'image2' => $filename2,
                'image3' => $filename3,
                'is_available' => $request->is_available == 'yes' ? true : false,
            ]);
                    
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->route('products.index')->with('success', 'Produit created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        if (!$product){
            return redirect()->back()->with('error', 'Produit not found');
        }

        return view('management.products.edit')
                ->with('product', $product)->with('categories', $categories);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filename1 = null;
        $filename2 = null; 
        $filename3 = null;
        $product = Product::find($id);

        if (!$product){
            return redirect()->back()->with('error', 'Product not found');
        }

        try{
            DB::beginTransaction();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category_id;

            if ($request->image1) {
                $file = $request->file('image1'); 
                $filename1 = 'products/'.uniqid().'_'.$file->getClientOriginalName();

                Storage::disk('public')->put($filename1, file_get_contents($file));
                $product->image1 = $filename1;
            }

            if ($request->image2){
                $file = $request->file('image2'); 
                $filename2 = 'products/'.uniqid().'_'.$file->getClientOriginalName();

                Storage::disk('public')->put($filename2, file_get_contents($file));
                $product->image2 = $filename2;
            }

            if ($request->image3){
                $file = $request->file('image3'); 
                $filename3 = 'products/'.uniqid().'_'.$file->getClientOriginalName();

                Storage::disk('public')->put($filename3, file_get_contents($file));
                $product->image3 = $filename3;
            }

            $product->is_available = $request->is_available ? true : false;

            $product->save();
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }
        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product){
            return redirect()->back()->with('error', 'Product not found');
        }
        try{
            DB::beginTransaction();
            $product->delete();
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->back()->with('success', 'Product deleted');

    }
}
