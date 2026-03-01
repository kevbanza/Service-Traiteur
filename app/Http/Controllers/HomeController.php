<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\User;
use App\Models\UserSurvey;
use App\Models\UserResult;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        return view('management.index');

        $now = Carbon::now();

        if(auth()->user()->is_manager){
           $persons = User::whereNot('id', auth()->user()->id)->get()->count();
           $surveyTaken = UserSurvey::whereNot('user_id', auth()->user()->id)->get()->count();
           $questions = Question::all()->count();

            $usersByCategory = User::groupBy('category')
                ->select('category', \DB::raw('count(*) as total'))
                ->whereNotNull('category')
                ->get();

            $roles = array();
            array_push($roles, "no_category");
            $count = [User::whereNull('category')->count()];
            
            foreach ($usersByCategory as $group) {            
                array_push($roles, $group->category);
                array_push($count, $group->total);
            }

            $data = [
                'labels' => $roles,
                'values' => $count
            ];

            
            return view('index')
                    ->with('persons', $persons)
                    ->with('surveyTaken', $surveyTaken)
                    ->with('questions', $questions)
                    ->with('data', $data)
                    ->with('total', 1);
        }

        $userResult = UserResult::where('user_id', auth()->user()->id);
        $highestScoreExist = $userResult->orderBy('test_result', 'desc')->first();
        $highestScore = $highestScoreExist ? $highestScoreExist->result_percent: 0;
        $quizes = $userResult->count();

        return view('client-home')
                    ->with('quiz_number', $quizes)
                    ->with('highest_score', $highestScore)
                    ->with('total', 1);
        
    }


    private function createTypeData($counterName, $arrayConsumption)
    {
        return ['label' => $counterName, 'data' => array_values($arrayConsumption), 'fill' => false, 'borderColor' => sprintf('#%06X', mt_rand(0, 0xFFFFFF))];
    }

    public function test(){
        return view('autre.index');
    }
}
