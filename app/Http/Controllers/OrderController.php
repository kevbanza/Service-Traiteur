<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\TraiteurDemande;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
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
      
        return view('management.orders.index');
    }

    public function fetch(Request $request)
    {
        $data = Order::all();

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
        try{
            DB::beginTransaction();

            Question::create([
                'description' => $request->description,
                'link' => $request->link,
                'type' => $request->type,
                'survey_id' => $request->survey_id,
            ]);

            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->route('questions.index')->with('success', 'Question created');

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
        $question = Question::find($id);
        $surveys = Survey::all();

        if (!$question){
            return redirect()->back()->with('error', 'Question not found');
        }

        return view('questions.edit')
                ->with('question', $question)->with('surveys', $surveys);

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
        $question = Question::find($id);

        if (!$question){
            return redirect()->back()->with('error', 'Question not found');
        }

        try{
            DB::beginTransaction();
            $question->description = $request->description;
            $question->link = $request->link;
            $question->type = 1;
            $question->survey_id = $request->survey_id;

            $question->save();
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }
        return redirect()->route('questions.index')->with('success', 'Question created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        if (!$question){
            return redirect()->back()->with('error', 'Question not found');
        }
        try{
            DB::beginTransaction();
            $question->delete();
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->back()->with('success', 'Question deleted');

    }


    public function traiteur()
    {
        return view('management.orders.traiteur');
    }

    public function fetchTraiteur(Request $request)
    {
        $data = TraiteurDemande::all();

        return Datatables::of($data)
            ->make(true);
    }
}
