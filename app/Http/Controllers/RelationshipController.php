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
        $currentUserId = $request->get('current-user-id');
        $tagName = $request->get('tag-name');
        $relativeUserId = $request->get('user-id');

        $stmt = "INSERT INTO `user_relationship` (`current_user_id`, tag, `related_user_id`)
        SELECT * FROM (SELECT '$currentUserId', '$tagName', '$relativeUserId') AS tmp
        WHERE NOT EXISTS (
                SELECT `current_user_id` FROM `user_relationship` WHERE current_user_id = '$currentUserId' AND `related_user_id` = '$relativeUserId'
        ) LIMIT 1";

        $pdo = DB::connection()->getPdo();
        $result = $pdo->query($stmt);

        if($stmt) {
            return "Success";
        }
        else {
            abort(500,'Some error has been occurred');
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

        $stmt = "SELECT ur.`current_user_id` as `userid`, u.`fullname` as `username`,
                     ur.`tag` as `relationshipTag`, ur.`related_user_id` as `relativeUserId`,
                     u1.`fullname` as `relativeUserName`
                     FROM `user_relationship` ur
                     JOIN `users` u ON u.`_id` = ur.`current_user_id`
                     JOIN `users` u1 ON u1.`_id` = ur.`related_user_id`
                     WHERE ur.`current_user_id` = '$id' OR ur.`related_user_id` = '$id'";

        $pdo = DB::connection()->getPdo();
        $result = $pdo->query($stmt);

        $userUserMapping = array();

        while($row = $result->fetch($pdo::FETCH_ASSOC)) {

            // discard reverse relation and give advantage to
            // current user to relative user relation
            if(isset($userUserMapping[$row['relativeUserId']])) {
                if($userUserMapping[$row['relativeUserId']]['relativeUserId']==$row['userid']) {
                    continue;
                }
            }

            $userUserMapping[$row['userid']] = $row;
        }
        return View('user-relation',['currentUserId'=>$id,'userUserMapping'=>$userUserMapping]);
//        var_dump($userUserMapping);
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
