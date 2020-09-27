<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Activity;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $cm;
    private $activityModel;

    public function __construct(){
        $this->cm= new Categories();
        $this->activityModel = new Activity();
    }

    public function getCategories(){
        $cat = $this->cm->getCategories();
        return response()->json(["cat" => $cat], 200);
    }

    public function insertCategory(CategoryRequest $cr){
        $catName = $cr->input('catName');
        $id = $this->cm->insertCategory($catName);
        $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " inserted category with id: ".$id . "\t";
        $this->activityModel->write($text, date("Y.m.d H:i:s"));
        return response()->json(["id" => $id], 201);
    }

    public function deleteCategory($id){
        $this->cm->deleteCategory($id);
        $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " deleted category with id: ".$id . "\t";
        $this->activityModel->write($text, date("Y.m.d H:i:s"));
        return response()->json("", 204);
    }

    public function renameCategory(CategoryRequest $cr){
        $catName = $cr->input('catName');
        $id = $cr->input('id');
        $cat = $this->cm->renameCategory($id, $catName);
        $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " renamed category with id: ".$id . "\t";
        $this->activityModel->write($text, date("Y.m.d H:i:s"));
        return response()->json("", 204);
    }
}
