<?php

namespace App\Http\Controllers;

use App\User;
use App\Organization;
use App\Vacancy;
use Illuminate\Http\Request;
use App\Http\Requests\VacancyRequest;

class VacancyController extends Controller
{   

    
    public function indexVacancies(Request $request)
    {

    //  $vacancies = Vacancy::whereIn('organization_id', [3, 7, 10])
    // ->where('title', 'like', '%city%')
    // ->orderBy('city', 'asc')
    // ->get();

    // $vacansies = \App\Http\Resources\VacancyCollection::make(Vacancy::whereIn('organization_id', [3, 7, 10])
    // ->where('title', 'like', '%country%')
    // ->orderBy('country', 'asc')
    // ->get());

        // $vacansies = \App\Http\Resources\VacancyCollection::make(Vacancy::whereIn('user_id', [3, 7, 10])
    // ->get());
        return response()->json($vacansies,200);
    }

    public function indexStats(Request $request)
    {
       // $this->authorize('view', Position::class);
        $vacansies = \App\Http\Resources\VacancyCollection::make(Vacancy::filter($filters)->count()->get());
        return response()->json($vacansies,200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $this->authorize('view', Position::class);
        $vacansies = \App\Http\Resources\VacancyCollection::make(Vacancy::all());
        return response()->json($vacansies,200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function only_active(Request $request, $id)
    {        
        // if($vacancies->users()->is_active == true){//??????????????????????????????????????????? active + s  ??????????
        //     foreach ($vacancies->users()->ids as $vacancy->users()->id) {
        //         $vacancy->users()->count_workers +=  $vacancy->users()->id;
            
        
        //         if($this->users()->count_workers < $this->workers_amount){
        //             $vacancies = \App\Http\Resources\VacancyCollection::make(Vacancy::all()->count());
        //         }
        //     }

        // }elseif($vacancies->users()->is_active == false){//??????????????????????????????????????????? active + s  ??????????
        //     foreach ($vacancies->users()->ids as $vacancy->users()->id) {
        //         $vacancy->users()->count_workers +=  $vacancy->users()->id;
            
        
        //         if($this->users()->count_workers < $this->workers_amount){
        //             $vacancies = \App\Http\Resources\VacancyCollection::make(Vacancy::all()->count());
        //         }
        //     }

        // }    
        return response()->json($vacancies,200);
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacancyRequest $request)
    {
        $vacancy = Vacancy::create($request->all());
        return response()->json($vacancy, 201);
    }
    
    public function show(Vacancy $vacancy)
    {
        return response()->json($vacancy->load('organization'), 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        $vacancy->update($request->all());
        return response()->json($vacancy, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return response()->json(null, 200);
    }
    public function setOrganization($id, $organization_id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $organization = Organization::findOrFail($organization_id);
        $organization->vacancies()->save($vacancy);
        return response()->json($vacancy->load('organization'), 200);
    }

    public function book($vacancy->users()->id)
    {
        $vacancy->users() = User::find($id);
        $vacancy->users()->makeBook();

        return response()->json($vacancies,200);
    }

    public function unBook($vacancy->users()->id)
    {
        $vacancy->users() = User::find($id);
        $vacancy->users()->makeUnBook();

        return response()->json($vacancies,200);
    }
}
