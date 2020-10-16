<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;
use App\Answer;
use Flash;
class QuestionController extends Controller
{
    //

    public function create(Questionnaire $questionnaire)
    {
       // error_reporting(0);
        return view('question.create', compact('questionnaire'));
    }


    /**
     * @param Questionnaire $questionnaire
     */
    public function store(Questionnaire $questionnaire)
    {

       // dd(request()->all());

        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',

        ]);
        //dd($data);
        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/questionnaires/'.$questionnaire->id);
        // return view('question.create', compact('questionnaire'));
    }

    protected function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();
        return redirect($questionnaire->path());

    }
    protected function destroyanswer($id, $slug)
    {
        $answer = answer::find($id);

        if (empty($answer)) {
            //Flash::error('answer not found');

            return redirect('/questionnaires/'.$slug);
        }
        $answer->delete();
        //$this->categoriesRepository->delete($id);

        //Flash::success('Answer deleted successfully.');
        return redirect('/questionnaires/'.$slug);

    }
}
