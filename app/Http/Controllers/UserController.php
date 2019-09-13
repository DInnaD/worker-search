<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Filters\UserFilters;

class UserController extends Controller
{   
    public function indexStats(UserFilters $filters)
    {
       // $this->authorize('view', Position::class);
    
        $users = \App\Http\Resources\UserCollection::make(User::filter($filters)->get());
        return response()->json($users,200);
    }
     // public function indexSearch()
    // {//$request->search(
    //     //[
    //     //'search' => 'term'
    //     //]);
    //     //$term = ['first_name, 'last_name', 'country', 'city'];
    //     $users = User::where('role', '==', 'worker');
    //     if($request->has('search')){
    //         $positions->where('country', '==', $request->search);
    //         $positions->where('city', '==', $request->search);
    //         $users->where('last_name', '==', $request->search);
    //         $users->where('first_name', '==', $request->search);

    //         return $users->get();
    //     }

    // }

       // $users = User::where('is_book', 'true');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        
    //  $users = User::where('title', 'like', '%first_name%')
    // ->orderBy('first_name', 'asc')
    // ->get();
    // $users = User::where('title', 'like', '%lastst_name%')
    // ->orderBy('last_name', 'asc')
    // ->get();

 //  $vacancies = Vacancy
        //  $users = User::whereIn('organization_id', [3, 7, 10])
    // ->where('title', 'like', '%city%')
    // ->orderBy('city', 'asc')
    // ->get();

    // $vacansies = \App\Http\Resources\VacancyCollection::make(Vacancy
        //  $users = User::whereIn('organization_id', [3, 7, 10])
    // ->where('title', 'like', '%country%')
    // ->orderBy('country', 'asc')
    // ->get();
     
        return response()->json(['success' => User::all()]);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user);

    }
    public function destroy(Request $request, User $user)
    {
        return response()->json(['success' => $user->delete()], 200);
    }
}
