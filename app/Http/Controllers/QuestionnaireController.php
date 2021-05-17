<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckQuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class QuestionnaireController extends Controller
{
    public function question_view()
    {
        return view('app.questionnaire');
    }

    public function make_question(CheckQuestionRequest $req)
    {
        $req->validated();

        $data = Question::create([
            'question'=>$req->question,
            'answer_type'=>$req->answer_type,
        ]);

        if($data)
        {
            return back()->with('success','Question has been created');
        }

    }

    public function save_answer($id,Request $req)
    {
        $currentInput = null;
        
        if($req->input('number'))
        {
            $currentInput = 'number';
            $req->validate(['number'=>'required|min:0',]);

        }elseif($req->input('yesno_m'))
        {
            $currentInput = 'yesno_m';
            $req->validate(['yesno_m'=>'required|in:yes,no,maybe',]);

        }elseif($req->input('percentage'))
        {
            $currentInput = 'percentage';
            $req->validate(['percentage'=>'required|min:0',]);

        }else{
            return back()->withErrors('Incorrect value');
        }

        Answer::create([
            'answer'=>$req->input($currentInput),
            'user_id'=>Auth::user()->id,
            'question_id'=>$id,
        ]);

        return back()->with('success','Done');
    }


    public function answer_view()
    {
        $answers = Answer::all();
        return view('app.answer')->with('answers',$answers);
    }

    public function chart_view()
    {
        $questions = Question::all();
        return view('app.chart')->with('questions',$questions);
    }

    public function filter_chart(Request $req)
    {   
        $answer = Answer::where('question_id',$req->question)
        ->whereRaw("(created_at >= ? AND created_at <= ?)", 
                    [$req->date_from." 00:00:00", $req->date_to." 23:59:59"]        
        )->get();

        $result = [];

        foreach ($answer as $key) {
                
            $count = Answer::where('answer',$key->answer)->count();
            $result[$key->answer] = $count;
        }

        return view('app.chart_result')->with('result',$result);
    }
}
