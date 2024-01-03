<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UserLogController extends Controller
{
  public function index()
  {

    $logs = DB::table('entries')
                ->join('surveys','entries.survey_id','=','surveys.id')
                ->leftJoin('users','entries.participant_id','=','users.id')
                ->where('participant_id', Auth::user()->id)
                ->select('users.name as name', 'entries.created_at', 'users.id','entries.id as entry_id')
                ->get();

    foreach($logs as $log)
    {
      $log_results = DB::table('surveys_results')
                  ->where('user_id', $log->id)
                  ->where('entry_id', $log->entry_id)
                  ->select('results')
                  ->get();


      $object = json_decode($log_results);

      $final_results = [];

      foreach ($object as $item) {
        $final_results[] = $item->results;
      }

      $results = implode(', ', $final_results);

      $newProperty = 'results';
      $log->$newProperty = $results;

      //Separate time and date
      $carbonDateTime = Carbon::parse($log->created_at);
      $formattedDate = $carbonDateTime->format('F j, Y');
      $formattedTime = $carbonDateTime->format('h:i A');

      $newPropertyDate = 'date';
      $newPropertyTime = 'time';
      $log->$newPropertyDate = $formattedDate;
      $log->$newPropertyTime = $formattedTime;
    }


      return view('/user-survey-log',compact('logs'));
  }
}
