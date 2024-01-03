<?php

namespace App\Http\Controllers;


use App\Models\Courses;
use App\Models\Answers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Survey;
use MattDaneshvar\Survey\Models\Entry;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

class SurveyController extends Controller
{


  protected $redirector;

  public function __construct(Redirector $redirector)
  {
    $this->redirector = $redirector;
  }
    protected function survey()
    {

      return Survey::where('name', 'Course Recommendation Survey')->first();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      if(Auth::user()->active == 0)
      {
        $errorMessage = 'Account already deleted';
        return redirect()->route('logout')->withErrors([$errorMessage]);
      }
      else{
        return view('survey', ['survey' => $this->survey()]);
      }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $survey = $this->survey();

      $answers = $this->validate($request, $survey->rules);

      (new Entry)->for($survey)->fromArray($answers)->push();


      $user_entry = DB::table('entries')
                        ->where('participant_id', Auth::user()->id)
                        ->orderBy('id', 'desc')
                        ->first();

      $user_answer = DB::table('answers')
                        ->where('entry_id', $user_entry->id)
                        ->get();

      $array = [
     'STEM' => 0,
     'HUMSS' => 0,
     'CA' => 0,
     'PN' => 0,
     'OM' => 0,
     'GAS' => 0,
     'ABM' => 0,
     'CE' => 0,
     'IT' => 0,
     'HRM' => 0,
     'EIM' => 0,
      ];


      foreach($user_answer as $user)
      {
        $id = 0;
        $id = (integer)$user->question_id;

        if($id == 1 || $id == 2 || $id == 3)
        {
          $array['STEM'] = $array['STEM'] + (int)$user->value;
        }
        elseif ($id == 4 || $id == 5 || $id == 6)
        {
          $array['HUMSS'] = $array['HUMSS'] + (int)$user->value;
        }
        elseif ($id == 7 || $id == 8 || $id == 9)
        {
          $array['CA'] = $array['CA'] +(int)$user->value;
        }
        elseif ($id == 10 || $id == 11 || $id == 12)
        {
          $array['OM'] = $array['OM'] +(int)$user->value;
        }
        elseif ($id == 13 || $id == 14 || $id == 15)
        {
          $array['GAS'] = $array['GAS'] +(int)$user->value;
        }
        elseif ($id == 16 || $id == 17 || $id == 18)
        {
          $array['ABM'] = $array['ABM'] +(int)$user->value;
        }
        elseif ($id == 19 || $id == 20 || $id == 21)
        {
          $array['CE'] = $array['CE'] +(int)$user->value;
        }
        elseif ($id == 22 || $id == 23 || $id == 24)
        {
          $array['IT'] = $array['IT'] +(int)$user->value;
        }
        elseif ($id == 25 || $id == 26 || $id == 27)
        {
          $array['HRM'] = $array['HRM'] +(int)$user->value;
        }
        elseif ($id == 28 || $id == 29 || $id == 30)
        {
          $array['EIM'] = $array['EIM'] +(int)$user->value;
        }
        else
        {
          $array['PN'] = $array['PN'] +(int)$user->value;
        }
      }

      arsort($array);


      $chosenArray = array_slice($array, 0, 3);
      $courses = array_keys($chosenArray);

      foreach($courses as $course)
      {
          DB::table('surveys_results')->insert([
          'user_id' => $user_entry->participant_id,
          'entry_id' => $user_entry->id,
          'results' => $course,
          'created_at' => Carbon::now('Asia/Manila')->toDateTimeString(),
          ]);
      }
      return $this->redirector->action('App\Http\Controllers\SurveysResultController@index');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
