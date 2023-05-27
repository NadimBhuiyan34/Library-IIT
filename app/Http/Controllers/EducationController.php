<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $educations = auth()->user()->education()->get();
        return view('frontend.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResearchSupervisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationRequest $request)
    {
        Education::create([
            'user_id' => auth()->user()->id,
            'degree' => $request->degree,
            'group' => $request->group, 
            'institute' => $request->institute,
            'country' => $request->country,
            'passing_year' => $request->passing_year,
            
        ]);
        return redirect()->back()->withMessage('Education created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('frontend.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResearchSupervisionRequest  $request
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {
        $education->update([
            'degree' => $request->degree,
            'group' => $request->group, 
            'institute' => $request->institute,
            'country' => $request->country,
            'passing_year' => $request->passing_year,
            
        ]);
        return redirect()->route('user.profile.index')->withMessage('Education updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->back()->withMessage('Education deleted successfully');
    }
}
