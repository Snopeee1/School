<?php

namespace App\Http\Controllers;

use App\Models\SurveysResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class SurveysResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $latest = DB::table('entries')
                        ->where('participant_id', Auth::user()->id)
                        ->orderBy('id', 'desc')
                        ->first();
      if($latest != null)
      {
        $lastest_entries = DB::table('surveys_results')
                          ->where('user_id', Auth::user()->id)
                          ->where('entry_id', $latest->id)
                          ->get();

        $results = [];

        foreach($lastest_entries as $lastest_entry)
          {
            $result = DB::table('courses')
                            ->where('code', $lastest_entry->results)
                            ->first();

            array_push($results, $result);
          }
      }
      else {
        $results = null;
      }

      return view('results', ['results' => $results]);
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
    public function show(SurveysResult $surveysResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurveysResult $surveysResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SurveysResult $surveysResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurveysResult $surveysResult)
    {
        //
    }
}
