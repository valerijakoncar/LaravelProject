<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\PageSection;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class PageSectionController extends Controller
{
    private $psMod;

    public function __construct(){
        $this->psMod = new PageSection();
    }
    public function modAuthorText(Request $request){
        $authText = $request->input("TypeHere");
        $res = $this->psMod->modAuthorText($authText);
        $activityModel = new Activity();
        $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " modified text about author." . "\t";
        $activityModel->write($text, date("Y.m.d H:i:s"));
        return redirect("/admin")->send();
    }

    public function getAuthorText(){
        $authText = $this->psMod->getPageSection("author");
        return response()->json(["text" => $authText], 200);
    }

}
