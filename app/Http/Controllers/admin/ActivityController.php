<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function sortActivity(Request $request){
        $am = new Activity();
        $act = $am->sortActivity($request);
        return response()->json(["activities" => $act], 200);
    }

    public function newActivities(){
        $am = new Activity();
        return response()->json(["activities" =>  $am->newActivities()], 200);
    }
}
