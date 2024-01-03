<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        return redirect('survey');
    }

    public function dashboard()
    {
      $userCount = DB::table('users')
                        ->where('active', 1)
                        ->where('role','user')
                        ->count();

      $surveyCount = DB::table('entries')
                      ->count();

      $survey_results = DB::table('surveys_results')
                            ->select('results', DB::raw('COUNT(id) as count'))
                            ->groupBy('results')
                            ->get();

        return view('dashboard', compact('userCount','surveyCount','survey_results'));
    }

}
