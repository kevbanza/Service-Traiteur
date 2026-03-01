<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\SurveyManagementRequest;


class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-surveys.index');
    }

    public function fetch(Request $request)
    {
        $data = Survey::all();

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
        return view('admin-surveys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurveyManagementRequest $request)
    {
        try{
            DB::beginTransaction();

            Survey::create([
                'title' => $request->title,
                'description' => $request->description,
                'step' => $request->step,
            ]);

            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->route('admin.surveys.index')->with('info', 'Survey created');

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
        $survey = Survey::find($id);

        if (!$survey){
            return redirect()->back()->with('error', 'Survey not found');
        }

        return view('admin-surveys.edit')
                ->with('survey', $survey);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SurveyManagementRequest $request, $id)
    {
        $survey = Survey::find($id);

        if (!$survey){
            return redirect()->back()->with('error', 'Survey not found');
        }

        try{
            DB::beginTransaction();
            $survey->title = $request->title;
            $survey->description = $request->description;
            $survey->step = $request->step;

            $survey->save();
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }
        return redirect()->route('admin.surveys.index')->with('info', 'Survey Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = Survey::find($id);

        if (!$survey){
            return redirect()->back()->with('error', 'Survey not found');
        }
        try{
            DB::beginTransaction();
            $survey->delete();
            DB::commit();
        }catch(Exception $exception){
            dd($exception->getMessage());
        }

        return redirect()->back()->with('info', 'Survey deleted');

    }
}
