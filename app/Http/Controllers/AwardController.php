<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\StoreAwardRequest;
use App\Http\Requests\UpdateAwardRequest;
use App\Models\Award;
class AwardController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $awards = auth()->user()->Award()->get();
        return view('frontend.Award.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.Award.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResearchSupervisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAwardRequest $request)
    {
        Award::create([
            'user_id' => auth()->user()->id,
            'award_type' => $request->award_type,
            'title' => $request->title,
            'year' => $request->year,
            'country' => $request->country,
            'description' => $request->description,
            
            
        ]);
        return redirect()->route('user.profile.index')->withMessage('Award created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function show(Award $Award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $Award)
    {
        return view('frontend.Award.edit', compact('Award'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResearchSupervisionRequest  $request
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAwardRequest $request, Award $Award)
    {
        $Award->update([
            'award_type' => $request->award_type,
            'title' => $request->title,
            'year' => $request->year,
            'country' => $request->country,
            'description' => $request->description,
           
        ]);
        return redirect()->route('user.profile.index')->withMessage('Award updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Award $Award)
    {
        $Award->delete();
        return redirect()->route('user.profile.index')->withMessage('Award deleted successfully');
    }
}

