<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\MenteeAnswer;
use App\Models\MentorSkill;
use App\Models\User;
use App\Models\question;
use App\Models\Option;
use App\Models\MenteeMentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = Auth::user();
        $options = Option::all();
        $mentees = DB::table('questions')
                    ->select('questions.*','mentee_answers.value as value','questions.question as question','questions.id as id')
                    ->leftJoin('mentee_answers',function ($join) {
                        $join->on('mentee_answers.question_id', '=' , 'questions.id') ;
                        $join->where('mentee_answers.user_id','=',Auth::user()->id) ;
                    })
                    ->get();
        return view('profile.index',compact('user_data','options','mentees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profile)
    {
        $user = User::find(intval($profile));
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->location = $request->location;
        $user->save();
        return redirect('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeMenteeAnswers(Request $request)
    {
        $quests = question::all();

        foreach ($quests as $q)
        {
            //check
            $check = MenteeAnswer::where('user_id',Auth::user()->id)
                                    ->where('question_id',$q->id)
                                    ->pluck('id');

            $k =  $q->id;
            if($check->isEmpty())
            {
                //add
                $ma = new MenteeAnswer();
                $ma->user_id = Auth::user()->id;
                $ma->question_id = $q->id;
                $ma->value = $request->$k;
                $ma->type = Auth::user()->type;
                $ma->save();
            }
            else
            {
                //update
                $ma = MenteeAnswer::find(intval($check[0]));
                $ma->value = $request->$k;
                $ma->save();
            }
        }

        if(Auth::user()->type == 1)  //mentee to search
        {
            $mentees = MenteeAnswer::where('user_id',Auth::user()->id)->pluck('value','question_id');
            $ms = array();
            foreach ($mentees as $key => $value) {
                $m = array();
                $m['question_id'] = $key;
                $m['option_id'] = $value;
                array_push($ms,$m);
            }

            $mentors = MenteeAnswer::where('type',2)->get();

            $mr = array();
            foreach ($mentors as $me)
            {
                $m = array();
                $m['user_id'] = $me->user_id;
                $m['question_id'] = $me->question_id;
                $m['option_id'] = $me->value;
                array_push($mr,$m);
            }

            $ms = json_encode($ms);
            $mr = json_encode($mr);
            $json_string = json_encode(
                array_merge(
                    json_decode($ms, true),
                    json_decode($mr, true)
                )
            );

            // $data = array();
            // array_push($data,$mr);
            // array_push($data,$ms);
            //$json_string = json_encode($ms);

            
            $ch = curl_init('http://127.0.0.1:5000/api');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json_string))
            );

            // execute!
            $response = curl_exec($ch);
            // close the connection, release resources used
            curl_close($ch);

            $ms_mr = new MenteeMentor();
            $ms_mr->mentee =Auth::user()->id;
            $ms_mr->mentor = $response;
            $ms_mr->save();
        }

        return redirect('/home');
    }
}

