<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\StoreMembershipRequest;
use App\Http\Requests\UpdateMembershipRequest;
use App\Models\Membership;
class MembershipController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $memberships = auth()->user()->Membership()->get();
        return view('frontend.Membership.index', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.Membership.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResearchSupervisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMembershipRequest $request)
    {
        Membership::create([
            'user_id' => auth()->user()->id,
            'type' => $request->type,
            'name' => $request->name,
            'membership_year' => $request->membership_year,
            'expire_year' => $request->expire_year,
            
            
            
        ]);
        return redirect()->back()->withMessage('Membership created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $Membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $Membership)
    {
        return view('frontend.Membership.edit', compact('Membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResearchSupervisionRequest  $request
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMembershipRequest $request, Membership $Membership)
    {
        $Membership->update([
            'type' => $request->type,
            'name' => $request->name,
            'membership_year' => $request->membership_year,
            'expire_year' => $request->expire_year,
           
        ]);
        return redirect()->back()->withMessage('Membership updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $Membership)
    {
        $Membership->delete();
        return redirect()->back()->withMessage('Membership deleted successfully');
    }
}

