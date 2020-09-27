<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    private $productsModel;
    private $activityModel;

    public function __construct(){
        $this->productsModel = new Products();
        $this->activityModel = new Activity();
    }

    public function getProducts($offset, $categId){
        $products =  $this->productsModel->getProducts($offset, $categId);
        return response()->json(["products"=>$products], 200);
    }

    public function filterProd($priceSort, $price, $categoryId, $searched = 0){
        //return $priceSort . $price . $categoryId;
        $products = $this->productsModel->filterProd($priceSort, $price, $categoryId, $searched);
        return response()->json(["products"=>$products], 200);
    }

    public function getProductsCategory($categoryId, $offset){
        $products =  $this->productsModel->getProductsCategory($categoryId, $offset);
        return response()->json(["products"=>$products], 200);
    }

    public function addToWishlist(Request $request){
        $productId = $request->input("prodId");
        $userId = $request->session()->get('user')->id;
        $username = $request->session()->get('user')->username;
        $code =  $this->productsModel->addToWishlist($productId, $userId);
        intval($code);
        if(($code>=200) && ($code<=299)){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . $username. " added product with id: ".$productId. " to wishlist." . "\t";
            $this->activityModel->write($text, date("Y.m.d H:i:s"));
        }
        return response()->json('', $code);
    }

    public function getWishlist(Request $request){
        $userId = $request->session()->get('user')->id;
        $products = $this->productsModel->getWishlist($userId);
        return response()->json(['products' => $products], 200);
    }

    public function deleteWishlist(Request $request){
        $productId = $request->input("idProd");
        $code =  $this->productsModel->deleteWishlist($productId);
        $username = $request->session()->get('user')->username;
        intval($code);
        if(($code>=200) && ($code<=299)){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . $username. " deleted product with id: ".$productId. " from wishlist.";
            $this->activityModel->write($text,  date("Y.m.d H:i:s"));
        }
        return response()->json('', $code);
    }


    public function changeQuantity(Request $request){
        $quantity = $request->input("quantity");
        $prodId = $request->input("prodId");
        $userId = $request->session()->get('user')->id;
        $code =  $this->productsModel->changeQuantity($quantity, $prodId, $userId);
        $username = $request->session()->get('user')->username;
        intval($code);
        if(($code>=200) && ($code<=299)){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . $username. " changed quantity for product with id: ".$prodId. " in wishlist." . "\t";
            $this->activityModel->write($text, date("Y.m.d H:i:s"));
        }
        return response()->json('', $code);
    }

}
