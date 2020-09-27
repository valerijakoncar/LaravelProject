<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserReq;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userModel;
    private $activityModel;

    public function __construct(){
        $this->userModel = new User();
        $this->activityModel = new Activity();
    }
    public function findUser($id){
        $user = $this->userModel-> findUser($id);
        return response()->json(["user"=>$user], 200);
    }

    public function updateUser(UpdateUserReq $updateUserReq){
        $user = $this->userModel->updateUser($updateUserReq);
        $id = $updateUserReq->input("idU");
        $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " updated user with id: ".$id . "\t";
        $this->activityModel->write($text, date("Y.m.d H:i:s"));
        return response()->json("", 204);
    }

    public function getUsers(){
        $users = $this->userModel->getUsers();
        return response()->json(["users"=>$users], 200);
    }

    public function deleteUser($id){
        $user = $this->userModel->deleteUser($id);
        $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " deleted user with id: ".$id . "\t";
        $this->activityModel->write($text, date("Y.m.d H:i:s"));
        return response()->json("", 204);
    }

    public function messageRead($id){
        $res = $this->userModel->messageRead($id);
        if($res){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " read message with id: ".$id . "\t";
            $this->activityModel->write($text, date("Y.m.d H:i:s"));
            return response()->json("", 204);
        }else{
            return response()->json("", 500);
        }

    }

}

