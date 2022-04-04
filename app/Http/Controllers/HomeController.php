<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenteeMentor;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->type == 1)
        {
            $data = DB::table('mentee_mentors')
            ->select('users.*')
            ->leftJoin('users','users.id','=','mentee_mentors.mentor')
            ->where('mentee_mentors.mentee',Auth::user()->id)
            ->get();
        }
        else
        {
            $data = DB::table('mentee_mentors')
            ->select('users.*')
            ->leftJoin('users','users.id','=','mentee_mentors.mentee')
            ->where('mentee_mentors.mentor',Auth::user()->id)
            ->get();
        }

        return view('home',compact('data'));
    }
}
