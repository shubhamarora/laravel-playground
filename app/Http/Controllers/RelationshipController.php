<?php

namespace App\Http\Controllers;

use App\Models\Relationship;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $sqlQuery = "SELECT ur.`current_user_id`, u.`fullname`, ur.`related_user_id`, u1.`fullname`
                     FROM `user_relationship` ur
                     JOIN `users` u ON u.`_id` = ur.`current_user_id`
                     JOIN `users` u1 ON u1.`_id` = ur.`related_user_id`
                     WHERE ur.`current_user_id` = '$id' OR ur.`related_user_id` = '$id'";

        $pdo = DB::connection()->getPdo();
        $stmt = $pdo->query($sqlQuery);

        $userUserMapping = array();
        $userNameMapping = array();

        while($row = $stmt->fetch()) {

            // discard reverse relation and give advantage to
            // current user to relative user relation
            if(isset($userUserMapping[$row[2]])) {
                if($userUserMapping[$row[2]] == $row[0]) {
                    continue;
                }
            }

            $userUserMapping[$row[0]] = $row[2];

            // isset is faster than array_key_exist for more check
            // here - http://php.net/manual/en/function.array-key-exists.php#107786
            if(!isset($userNameMapping[$row[0]])) {
                $userNameMapping[$row[0]] = $row[1];
            }
            if(!isset($userNameMapping[$row[2]])) {
                $userNameMapping[$row[2]] = $row[3];
            }
        }

        return View('user-relation',[]);
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
        //
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
