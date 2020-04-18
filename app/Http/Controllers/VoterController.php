<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoterRequest;
use App\Http\Resources\Voter\VoterCollection;
use App\Http\Resources\Voter\VoterResource;
use App\Voter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VoterCollection::collection(Voter::paginate(20));
        // return Voter::all();
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
    public function store(VoterRequest $request, Voter $voter)
    {
        $voter = $voter->create($request->all());

        return response([
            'data'=> new VoterResource($voter)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show(Voter $voter)
    {
        return new VoterResource($voter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Voter $voter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(VoterRequest $request, Voter $voter)
    {
        // $this->voterUserCheck($voter);

        $voter->update($request->all());

        return response([
            'data'=> new VoterResource($voter)
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voter $voter)
    {
        // $this->voterUserCheck($voter);

        $voter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


    // public function voterUserCheck($voter)
    // {
    //     if (auth()->id() !== $voter->user_id) {
    //         throw new VoterNotBelongsToUser;
    //     }
    // }
}
