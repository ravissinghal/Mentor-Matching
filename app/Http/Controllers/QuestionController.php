<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\question;
use App\MOdels\Option;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quest = new question();
        $quest->question = $request->question;
        $quest->skill = $request->skill;
        $quest->save();
        return redirect('question');
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
    public function edit($question)
    {
        $quest = question::find(intval($question));
        return view('question.edit',compact('quest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $question)
    {
        $quest = question::find($question);
        $quest->question = $request->question;
        $quest->skill = $request->skill;
        $quest->save();
        return redirect('question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question)
    {
        question::destroy($question);
        return redirect('question');
    }

    public function OptionIndex($question)
    {
        $quest = question::find(intval($question));
        $options = Option::where('question_id',$question)->get();
        return view('question.optionIndex',compact('quest','options'));
    }

    public function OptionCreate($question)
    {
        $quest = question::find(intval($question));
        return view('question.optionCreate',compact('quest'));
    }

    public function OptionStore(Request $request)
    {
        $opt = new Option();
        $opt->question_id = $request->question;
        $opt->option = $request->option;
        $opt->save();
        return redirect()->route('question.OptionIndex', ['question' => $request->question]);
    }

    public function OptionEdit($option)
    {
        $options = Option::find(intval($option));
        return view('question.optionEdit',compact('options'));
    }

    public function OptionUpdate(Request $request, $option)
    {
        $opt = Option::find(intval($option));
        $opt->option = $request->option;
        $opt->save();
        return redirect()->route('question.OptionIndex', ['question' => $opt->question_id]);
    }

    public function OptionDestroy($option)
    {
        $opt = Option::find(intval($option));
        Option::destroy($option);
        return redirect()->route('question.OptionIndex', ['question' => $opt->question_id]);
    }
}
