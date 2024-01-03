<?php

namespace App\Http\Controllers;

use App\Models\SurveyQuestion;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MattDaneshvar\Survey\Models\Survey;


class SurveyQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $surveyQuestions = Questions::orderBy('id', 'asc')->paginate(5);

      $allSurveyQuestions = DB::table('survey_questions')->get();

      $survey = Survey::first();


     /**
      foreach($allSurveyQuestions as $question)
      {
        $survey->questions()->create([
          'content' => $question->content,
          'course' => $question->course,
          'type' => 'radio',
          'options' => ['1', '2', '3', '4', '5']
        ]);
      }
      **/


      return view('survey-questions.index',compact('surveyQuestions'))
                  ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $courses = DB::table('courses')->get();
      return view('/admin-create-question', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
          'content' => 'required',
      ]);

      //$requestData = $request->except(['_token']);

    //  Questions::create($request->except(['_token']));

      $survey = Survey::first();

      $survey->questions()->create([
        'content' => $request->content,
        'type' => 'radio',
        'options' => ['1', '2', '3', '4', '5']
      ]);


      return redirect()->route('survey-questions.index')
                      ->with('success','Survey Question created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SurveyQuestion $surveyQuestion)
    {
        return view('survey-questions.show',compact('surveyQuestion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurveyQuestion $surveyQuestion)
    {
      $courses = DB::table('courses')->get();

        return view('survey-questions.edit',compact('surveyQuestion','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SurveyQuestion $surveyQuestions)
    {

      $request->validate([
          'content' => 'required',
          'course' => 'required',
      ]);

      $surveyQuestions->update($request->all());

      return redirect()->route('survey-questions.index')
                      ->with('success','Survey Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questions $surveyQuestion)
    {
      $surveyQuestion->delete();

        return redirect()->route('survey-questions.index')
              ->with('success','Survey Question deleted successfully');
    }
}
