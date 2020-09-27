<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Categories;
use App\Models\Socials;
use Illuminate\Http\Request;
use App\Models\PageSection;

class FrontController extends Controller
{
    protected $data = [];
    protected $psModel;
    protected $cm;
    protected $sm;
    protected $am;

    public function __construct(){
        $this->psModel = new PageSection();
        $this->cm = new Categories();
        $this->sm = new Socials();
        $this->am = new Activity();

        $this->data['menu'] = $this->psModel->getPageSection("menu");
        $this->data['categories'] = $this->cm->getCategories();
        $this->data['footer'] = $this->psModel->getPageSection("general_info");
        $this->data['socials'] = $this->sm->getSocials();
    }
}
