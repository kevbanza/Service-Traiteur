<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
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
        return view('management.category.index');
    }

    public function fetch(Request $request)
    {
        $data = Category::all();

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
        return view('management.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            Category::create([
                'name' => $request->name,
                'icon' => $request->icon,
            ]);

            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->route('categories.index')->with('success', 'Categorie created');

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
        $category = Category::find($id);

        if (!$category){
            return redirect()->back()->with('error', 'Category not found');
        }

        return view('management.category.edit')
                ->with('category', $category);

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
        $category = Category::find($id);

        if (!$category){
            return redirect()->back()->with('error', 'Category not found');
        }

        try{
            DB::beginTransaction();
            $category->name = $request->name;
            $category->icon = $request->icon;
            $category->save();
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }
        return redirect()->route('categories.index')->with('success', 'Category created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category){
            return redirect()->back()->with('error', 'Category not found');
        }
        try{
            DB::beginTransaction();
            $category->delete();
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->back()->with('success', 'Category deleted');

    }
}
