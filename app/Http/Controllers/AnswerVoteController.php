<?php

namespace App\Http\Controllers;

use App\answer_user_vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function Upstore(Request $request ,$id)
    {
        $check = answer_user_vote::where([
            ['user_id',Auth::user()->id],
            ['answer_id',$id]
        ])->first();

        if ($check == null) {
            answer_user_vote::create([
                'user_id' => Auth::user()->id,
                'answer_id' => $id
            ]);
            return redirect('/question/explore/'. $request['question_id'])->with('success','Success Vote Answer');
        }else{
            return redirect('/question/explore/'. $request['question_id'])->with('success','You Have Been Vote Answer');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Downstore(Request $request ,$id)
    {
        $check = answer_user_vote::where([
            ['user_id',Auth::user()->id],
            ['answer_id',$id]
        ])->first();

        if ($check == null) {
            answer_user_vote::create([
                'user_id' => Auth::user()->id,
                'answer_id' => $id
            ]);
            return redirect('/question/explore/'. $request['question_id'])->with('success','Success Vote Answer');
        }else{
            return redirect('/question/explore/'. $request['question_id'])->with('success','You Have Been Vote Answer');
        }
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
    public function update(Request $request, $id)
    {
        //
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
}
