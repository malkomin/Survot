<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function getSurveys()
    {
        $surveys = Survey::all();
        return view('dashboard_surveys', ['surveys' => $surveys]);
    }

    public function takeSurvey(Request $request)
    {
        $user = Auth::user();
        foreach ($request['question'] as $qId => $value)
        {
            $answer = new SurveyAnswer();
            $answer->survey_id = $request['survey_id'];
            $answer->question_id = $qId;
            $answer->user_id = $user->id;
            $answer->option = $value;
            $answer->save();
        }
        return redirect()->route('survey.all');
    }

    public function createSurvey(Request $request)
    {
        $user = Auth::user();
        $survey = new Survey();
        $survey->user_id = $user->id;
        $survey->save();
        foreach ($request['questions'] as $question)
        {
            if($question != null)
            {
                $survey_question = new SurveyQuestion();
                $survey_question->body = $question['body'];
                if($question['option'][0] != null)
                {
                    $survey_question->option_1 = $question['option'][0];
                }
                if($question['option'][1] != null)
                {
                    $survey_question->option_2 = $question['option'][1];
                }
                if($question['option'][2] != null)
                {
                    $survey_question->option_3 = $question['option'][2];
                }
                if($question['option'][3] != null)
                {
                    $survey_question->option_3 = $question['option'][2];
                }
                if($question['option'][4] != null)
                {
                    $survey_question->option_5 = $question['option'][3];
                }

                $survey_question->survey_id = $survey->id;
                $survey_question->save();
            }
        }
        return redirect()->route('survey.all');

    }

    public function editSurvey(Request $request)
    {

    }

    public function deleteSurvey(Request $request)
    {

    }
}
