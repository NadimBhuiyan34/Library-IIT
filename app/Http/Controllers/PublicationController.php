<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Models\Publication;
class PublicationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $publications = auth()->user()->Publication()->get();
        return view('frontend.Publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.Publication.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResearchSupervisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicationRequest $request)
    {
        Publication::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'author' => $request->author,
            'journal_name' => $request->journal_name,
            'journal_link' => $request->journal_link,
            
        ]);
        return redirect()->route('user.profile.index')->withMessage('Publication created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $Publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $Publication)
    {
        return view('frontend.Publication.edit', compact('Publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResearchSupervisionRequest  $request
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublicationRequest $request, Publication $Publication)
    {
        $Publication->update([
            'title' => $request->title,
            'author' => $request->author,
            'journal_name' => $request->journal_name,
            'journal_link' => $request->journal_link,
           
        ]);
        return redirect()->route('user.profile.index')->withMessage('Publication updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $Publication)
    {
        $Publication->delete();
        return redirect()->back()->withMessage('Publication deleted successfully');
    }
}
