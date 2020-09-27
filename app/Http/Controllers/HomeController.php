<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\PageSection;

class HomeController extends FrontController
{
    public function index(){
        $productsModel = new Products();
        $this->data['products'] = $productsModel->getProducts(0,0);
        $this->data['paginationCount'] = $productsModel->getPaginationCount();
        $this->data['active'] =  $this->psModel->getMenuId("Home")->id;
        if(session('user')){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username. " visited Home." . "\t";
            $this->am->write($text, date("Y.m.d H:i:s"));
        }else{
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . " User visited Home." . "\t";
            $this->am->write($text, date("Y.m.d H:i:s"));
        }
        return view("pages.home", $this->data);
    }

    public function category($categoryId){
        $productsModel = new Products();
        $this->data['products'] =  $productsModel->getProductsCategory($categoryId);
        $this->data['paginationCount'] = $productsModel->getPaginationCount($categoryId);
        $this->data['activeCategory'] = $categoryId;
        $catName =  $this->cm->getCategoryName($categoryId);
        if(session('user')){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username. " visited ". $catName->name . "\t";
            $this->am->write($text, date("Y.m.d H:i:s"));
        }else{
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . " User visited ". $catName->name . "\t";
            $this->am->write($text, date("Y.m.d H:i:s"));
        }
        return view("pages.home", $this->data);
    }
}
