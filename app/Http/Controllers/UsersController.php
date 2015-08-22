<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return View('users-list',['users'=>$users]);
    }

    /**
     * search tag from database on the basis of query string
     *
     * @return search result from database in json format
     */
    public function searchUser($q) {
        $q = '%'.$q.'%';
        $users = User::where('fullname','like',$q)->get();
        return json_encode($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $user = new User;
        $user->fullname = $request->get('fullname');
        $saveStatus = $user->save();

        if(!$saveStatus) {
            abort(500,'Some error occurred while saving user data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fullname = $request->get('fullname');
        $updateStatus = $user->save();

        if(!$updateStatus) {
            abort(500,'Some error occurred while saving user data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
