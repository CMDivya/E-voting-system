<?php

namespace App\Http\Controllers;

use App\District;
use App\Candidate;
use App\User;
use App\Party;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Photo;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district=Auth::user()->district;
        $district=District::find($district);
        $candidates=$district->candidates;
        //$candidates=Candidate::all();
        return view('vote.index')->withDistrict($district)->withCandidates($candidates);
    }
    public function result()
    {
        $districts=District::all();
        $candidates=$district->candidates;
        //$candidates=Candidate::all();
        return view('result.index')->withDistrict($districts);
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
    public function store(Request $request, $id)
    {
        if(Auth::user()->hasVoted!=false)
        {
            redirect('voter.vote.index')->with('danger','You have already Voted !!');
            Auth::logout();
            return redirect()->route('welcome');
        }
        $vote=new Vote;
        $vote->user_id=$request->user_id;
        $vote->candidate_id=$id;
        $vote->save();

        Auth::user()->hasvoted==true;

        redirect('voters.vote.index')->with('success','Voted Successfully');
        Auth::logout();
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
    
}
