<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsertProductReq;
use App\Http\Requests\ProductRequest;
use App\Models\Activity;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productsModel;
    private $activityModel;

    public function __construct(){
        $this->productsModel = new Products();
        $this->activityModel = new Activity();
    }

    public function getProductsAdmin($offset = 0){
        $products = $this->productsModel->getProductsAdmin($offset);
        return response()->json(["products" => $products]);
    }

    public function getProductsSearch(Request $request){
        $searched = $request->input("value");
        $products = $this->productsModel->getProductsSearch($searched);
        return response()->json(["products" => $products]);
    }

    public function getPagination(){
        $pagination = $this->productsModel->getPaginationCountAdmin();
        return response()->json(["pagination" => $pagination]);
    }

    public function getProd(Request $request){
        $id = $request->input("id");
        $product = $this->productsModel->getProd($id);
        return response()->json(["product" => $product]);
    }

    public function updateProd(ProductRequest $productRequest){
        //$this->productsModel->updateProd($productRequest);
        $imgName = "imgProd";
        $picId = 0;
        if (!empty($_FILES['imgProd']['name'])) {
            //dd($imgProd);
            $picId = self::proccessImg($imgName);
            //dd($picId);
        }
        $productId = $this->productsModel->updateProd($productRequest, $picId);

        $id = $productRequest->input("idProd");
        $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " updated product with id: ".$id . "\t";
        $this->activityModel->write($text, date("Y.m.d H:i:s"));
        return redirect()->route('admin')->send();
    }

    public function insertProd(InsertProductReq $request){
//        $productId = $this->productsModel->insertProd($request);
//        dd($productId);
        $imgName = "imgProdI";
        if (!empty($_FILES['imgProdI']['name'])) {
            //dd($imgProd);
            $picId = self::proccessImg($imgName);
            //dd($picId);
            if($picId){
                $productId = $this->productsModel->insertProd($request, $picId);
            }
        }
        if($productId){
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . session('user')->username . " inserted product with id: ". $productId ."\t";
            $this->activityModel->write($text, date("Y.m.d H:i:s"));
        }
      return redirect()->route('admin')->send();
    }

    public function proccessImg($imgName){
        $fileName = $_FILES[$imgName]['name'];
        $finalFileName = time() . "_" . $fileName;
        $size = $_FILES[$imgName]['size'];
        $tmpName = $_FILES[$imgName]['tmp_name'];
        $folder = 'images/edited/';
        $type = $_FILES[$imgName]['type'];
        $error = $_FILES[$imgName]['error'];

        $new_image = self::createImgInColor($tmpName, $type);

        $smallerFileName = 'small_' . $finalFileName;
        $path = $folder . $finalFileName;
        $smallerFilePath = $folder . $smallerFileName;

        switch ($type) {
            case 'image/jpeg':
                imagejpeg($new_image, $smallerFilePath, 75);
                break;
            case 'image/png':
                imagepng($new_image, $smallerFilePath);
                break;
            case 'image/jpg':
                imagejpg($new_image, $smallerFilePath);
                break;
        }

        if (move_uploaded_file($tmpName, $path)) {
            //echo "Slika je upload-ovana na server!";
            try{
                $picId = $this->productsModel->insertImage($smallerFileName, $type, $size, $folder);
                return $picId;
            }catch (\PDOException $ex){
                $code = 409;
            }
        }
    }

    public function createImgInColor($tmpName, $type){

        list($width, $height) = getimagesize($tmpName);

        if ($type == "image/jpeg") {
            $img = imagecreatefromjpeg($tmpName);
        } else if ($type == "image/jpg") {
            $img = imagecreatefromjpg($tmpName);
        } else if ($type == "image/png") {
            $img = imagecreatefrompng($tmpName);
        }
        //Kreiranje nove slike u koloru
        $newWidth = 120;
        $procentage = $newWidth / $width;
        $newHeight = $height * $procentage;
        $empty_image = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($empty_image, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $new_image = $empty_image;
        return $new_image;
    }

    public function deleteProd(Request $request){
        $id = $request->input('id');
        $this->productsModel->deleteProd($id);
        $text = $_SERVER['REMOTE_ADDR'] . "\t". session('user')->username. " deleted product with id: ".$id . "\t";
        $this->activityModel->write($text, date("Y.m.d H:i:s"));
        return response()->json("", 204);
    }
}
