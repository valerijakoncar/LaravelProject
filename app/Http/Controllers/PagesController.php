<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PageSection;

class PagesController extends FrontController
{
    public function contact(){
        $this->data['active'] =  $this->psModel->getMenuId("Contact")->id;
        if(session('user')){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username. " visited Contact." . "\t" . date("Y.m.d H:i:s"). "\n";
            $this->am->write($text,  date("Y.m.d H:i:s"));
        }else{
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . " User visited Contact." . "\t";
            $this->am->write($text, date("Y.m.d H:i:s"));
        }
        return view("pages.contact", $this->data);
    }

    public function author(){
        $this->data['author'] =  $this->psModel->getPageSection("author");
        $this->data['active'] =  $this->psModel->getMenuId("Author")->id;
        if(session('user')){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username. " visited Author." . "\t";
            $this->am->write($text,date("Y.m.d H:i:s"));
        }else{
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . " User visited Author." . "\t";
            $this->am->write($text, date("Y.m.d H:i:s"));
        }
        return view("pages.author", $this->data);
    }

    public function admin(){
        $productsModel = new Products();
        $this->data['products'] = $productsModel->getProductsAdmin();
        $this->data['paginationCount'] = $productsModel->getPaginationCountAdmin();
        $userModel = new User();
        $this->data['users'] = $userModel->getUsers();
        $this->data['author'] = $this->psModel->getPageSection("author");
        $this->data['adminMenu'] = $this->psModel->getPageSection("admin_menu");
        $this->data['messages'] = $this->psModel->getPageSection("messages");
        //$this->data['activities'] = $this->am->print();
        $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username. " visited Admin." . "\t";
        $this->am->write($text, date("Y.m.d H:i:s"));
        return view("admin.pages.admin", $this->data);
    }

    public function activity(){
        $productsModel = new Products();
        $this->data['adminMenu'] = $this->psModel->getPageSection("admin_menu");
        $this->data['activities'] = $this->am->print();
        $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username. " visited Activity." . "\t";
        $this->am->write($text, date("Y.m.d H:i:s"));
        return view("admin.pages.activity", $this->data);
    }
}
