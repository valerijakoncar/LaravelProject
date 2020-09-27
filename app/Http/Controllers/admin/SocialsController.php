<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\Models\Activity;
use Illuminate\Http\Request;

class SocialsController extends FrontController
{
    public function updateSoc(Request $request){
        $id = $request->input("id");
        $href = $request->input("href");
        $faClass = $request->input("faClass");
        $res = $this->sm->updateSoc($id, $href, $faClass);
        $activityModel = new Activity();
        if($res){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " updated social with id: ".$id . "\t";
            $activityModel->write($text, date("Y.m.d H:i:s"));
            return response()->json("", 204);
        }else{
            return response()->json(["message" => "There was an error."], 500);
        }
    }

    public function deleteSoc($id){
        $res = $this->sm->deleteSoc($id);
        $activityModel = new Activity();
        if($res){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " deleted social with id: ".$id . "\t";
            $activityModel->write($text, date("Y.m.d H:i:s"));
            return response()->json("", 204);
        }else{
            return response()->json(["message" => "There was an error."], 500);
        }
    }

    public function getSocials(){
        $res = $this->sm->getSocials();
        return response()->json(["socials" => $res], 200);
    }

    public function insertSoc(Request $request){
        $href = $request->input("href");
        $faClass = $request->input("faClass");
        $id = $this->sm->insertSoc($href, $faClass);
        $activityModel = new Activity();
        if($id){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " inserted social with id: ".$id . "\t";
            $activityModel->write($text, date("Y.m.d H:i:s"));
            return response()->json("", 201);
        }else{
            return response()->json(["message" => "There was an error."], 500);
        }
    }
}
