<?php

namespace App\Http\Controllers;

use App\User;
use App\Organization;
use Illuminate\Http\Request;
use App\Http\Requests\OrganizationRequest;

class OrganizationController extends Controller
{   
    public function indexStats(Request $request)
    {//$organizations = Organization::where('vacancy_id', 1)
    // ->whereIn('user_id', [1, 2, 50, 100])
    // ->get();
    // ->where('title', 'like', '%city%')
    // ->orderBy('city', 'asc')
    // ->get();

       // $this->authorize('view', Position::class);
        $organizations = \App\Http\Resources\OrganizationCollection::make(Organization::filter($filters)->count()->get());
        return response()->json($organizations,200);
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $this->authorize('view', Organization::class);
        return response()->json(['success' => Organization::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationRequest $request)
    {
        $this->authorize('create', Organization::class);
        $organization= Organization::create($request->all());
        return response()->json($organization, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        $this->authorize('view', Organization::class);
        return response()->json($organization->load('vacancies'), 200);
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        $this->authorize('update', Organization::class);
        $organization->update($request->all());
        return response()->json($organization);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Organization $organization)
    {
        $this->authorize('delete', Organization::class);
        return response()->json(['success' => $organization->delete()], 200);
    }


    public function setCreator($id, $creator_id)
    {
        $organization = Organization::findOrFail($id);
        $creator = Creator::findOrFail($creator_id);
        $creator->organizations()->save($organization);
        return response()->json($organization->load('organization'), 200);
    }
}
