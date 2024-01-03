<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class SurveyLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

      $logs = DB::table('entries')
                  ->join('surveys','entries.survey_id','=','surveys.id')
                  ->leftJoin('users','entries.participant_id','=','users.id')
                  ->select('users.name as name', 'entries.created_at', 'users.id', 'participant_id')
                  ->get();

      foreach($logs as $log)
      {
        $log_results = DB::table('surveys_results')
                    ->where('user_id', $log->id)
                    ->where('entry_id', $log->participant_id)
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


        return view('/survey-log',compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
