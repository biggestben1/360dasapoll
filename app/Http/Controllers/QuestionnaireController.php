<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Questionnaire;
use App\Question;
class QuestionnaireController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function create(){

        return view('questionnaire.create');
    }



    public function store(){

        $data= request()->validate([
            'title' =>'required',
            'purpose' =>'required',
        ]);
        $questionnaire = auth()->user()->questionnaires()->create($data);

        return redirect('/questionnaires/'.$questionnaire->id);

    }

    public function show(Questionnaire $questionnaire){
        $questionnaire->load('questions.answers.responses');
        //dd($questionnaire);
        return view('questionnaire.show', compact('questionnaire'));
    }

    protected function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
        //$questionnaire->question()->answers()->delete();
       // $question->delete();
        return redirect('/home');

    }
}
