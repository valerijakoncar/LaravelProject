<?php


namespace App\Models;


use App\Http\Requests\ProductRequest;

class Products
{

    private $limit = 12;
    private $limitAdmin = 5;

    public function getProducts($offset = 0, $categId){
        $offset = $offset * $this->limit;
        $query =  \DB::table("products AS p")
            ->join("price AS pr","p.price_id","=","pr.id")
            ->join("images AS i","p.img_id", "=","i.id")
            ->select("p.id", "p.name", "p.hot", "p.cat_id", "i.alt", "i.path", "i.name AS picName","pr.price", "pr.oldPrice");
        if($categId != 0){
            $query = $query->where("p.cat_id", "=", $categId);
        }
        return $query->offset($offset)
            ->limit($this->limit)
            ->get();

    }

    public function getPaginationCount($categoryId = 0){
        $prodNum = \DB::table("products");
        if($categoryId !== 0){
            $prodNum = $prodNum->where("cat_id", "=", $categoryId);
        }
            $prodNum = $prodNum->count();
        return ceil($prodNum / $this->limit);
    }

    public function filterProd($priceSort, $price, $categoryId, $searched){
        $price = intval($price);
        $stringToSearch = "%$searched%";
        $query =  \DB::table("products AS p")
            ->join("price AS pr","p.price_id","=","pr.id")
            ->join("images AS i","p.img_id", "=","i.id")
            ->select("p.id", "p.name", "p.hot", "p.cat_id", "i.alt", "i.path", "i.name AS picName","pr.price", "pr.oldPrice");

        if($categoryId != "0"){
            $categoryId = intval($categoryId);
            if($searched === 0){
                $query = $query->where([
                    ["pr.price", "<=", $price],
                    ["p.cat_id", "=", $categoryId]
                ]);
            }else{
               // echo "dedfff";
                $query = $query->where([
                    ["pr.price", "<=", $price],
                    ["p.cat_id", "=", $categoryId],
                    ["p.name", "LIKE", $stringToSearch]
                ]);
            }
        }else{
            if($searched === 0){
                //echo "ffff";
               // var_dump($searched);
                $query = $query->where([
                    ["pr.price", "<=", $price]
                ]);
            }else{

                $query = $query->where([
                    ["pr.price", "<=", $price],
                    ["p.name", "LIKE", $stringToSearch]
                ]);

            }
        }
        if($priceSort != "0"){
            $query = $query->orderBy("pr.price", $priceSort);
        }
        $query = $query->get();
        return $query;
    }

    public function getProductsCategory($categoryId, $offset = 0){
        $offset = $offset * $this->limit;
       return \DB::table("products AS p")
            ->join("price AS pr","p.price_id","=","pr.id")
            ->join("images AS i","p.img_id", "=","i.id")
            ->select("p.id", "p.name", "p.hot", "p.cat_id", "i.alt", "i.path", "i.name AS picName","pr.price", "pr.oldPrice")
            ->where("p.cat_id","=", $categoryId)
           ->offset($offset)
           ->limit($this->limit)
            ->get();
    }

    public function addToWishlist($productId, $userId){
       $exists = \DB::table("wishlist")
           ->where([
               ["user_id", "=", $userId],
               ["product_id", "=", $productId]
           ])
           ->count();
       if($exists == 0){
           try{
               $id = \DB::table("wishlist")
                   ->insertGetId([
                       "id" => NULL,
                       "product_id" => $productId,
                       "quantity" => 1,
                       "user_id" => $userId
                   ]);
               if($id){
                   $code = 201;
               }else{
                   $code = 409;
               }
           }catch(\PDOException $ex){
               $code = 409;
           }

       }else{
           $code = 403;
       }
        return $code;
    }

    public function getWishlist($userId){
        return  \DB::table("products AS p")
            ->join("price AS pr","p.price_id","=","pr.id")
            ->join("images AS i","p.img_id", "=","i.id")
            ->join("wishlist AS w", "p.id", "=", "w.product_id")
            ->select("p.id", "p.name", "p.hot", "p.cat_id", "i.alt", "i.path", "i.name AS picName","pr.price", "pr.oldPrice", "w.quantity")
            ->where("w.user_id", "=", $userId)
            ->get();
    }

    public function deleteWishlist($productId){
        try{
            $delete = \DB::table("wishlist")
                ->where("product_id", "=", $productId)
                ->delete();
            if($delete){
                $code = 204;
            }else{
                $code = 409;
            }
        }catch(\PDOException $ex){
            $code = 409;
        }
        return $code;
    }

    public function changeQuantity($quantity, $prodId, $userId){
        try{
            $update = \DB::table("wishlist")
                ->where([
                    ["product_id", "=", $prodId],
                    ["user_id", "=", $userId]
                ])
                ->update(["quantity" => $quantity]);
            if($update){
                $code = 204;
            }else{
                $code = 409;
            }
        }catch(\PDOException $ex){
            $code = 409;
        }
        return $code;
    }

    //   ***** ADMIN *****

    public function getProductsAdmin($offset = 0){
        $offset = $offset * $this->limitAdmin;
        return \DB::table("products AS p")
            ->join("price AS pr","p.price_id","=","pr.id")
            ->join("images AS i","p.img_id", "=","i.id")
            ->select("p.id", "p.name", "p.hot", "p.cat_id", "i.alt", "i.path", "i.name AS picName","pr.price", "pr.oldPrice")
            ->offset($offset)
            ->limit($this->limitAdmin)
            ->get();
    }

    public function getPaginationCountAdmin(){
        $prodNum = \DB::table("products");
        $prodNum = $prodNum->count();
        return ceil($prodNum / $this->limitAdmin);
    }

    public function getProductsSearch($searched){
        $stringToSearch = "%$searched%";
        return  \DB::table("products AS p")
            ->join("price AS pr","p.price_id","=","pr.id")
            ->join("images AS i","p.img_id", "=","i.id")
            ->select("p.id", "p.name", "p.hot", "p.cat_id", "i.alt", "i.path", "i.name AS picName","pr.price", "pr.oldPrice")
            ->where("p.name", "LIKE", $stringToSearch )
            ->get();
    }

    public function getProd($id){
        return  \DB::table("products AS p")
            ->join("price AS pr","p.price_id","=","pr.id")
            ->join("images AS i","p.img_id", "=","i.id")
            ->select("p.id", "p.name", "p.hot", "p.cat_id", "i.alt", "i.path", "i.name AS picName","pr.price", "pr.oldPrice")
            ->where("p.id", "=", $id )
            ->first();
    }

    public function updateProd(ProductRequest $productRequest, $picId){
        $id = $productRequest->input("idProd");
        $prodName = $productRequest->input("prodName");
        $prodCat = $productRequest->input("prodCat");
        $prodPrice = $productRequest->input("prodPrice");
        $oldPrice = $productRequest->input("oldPrice");
        $hotProd = $productRequest->input("hotProd");
           if($picId){
               $update =\DB::table("products")
                       ->where("id", "=", $id)
                       ->update([
                           "img_id" => $picId
                       ]);
           }
        try{
            $priceUpd = \DB::table("price")
                ->where("id", "=", $id)
                ->update([
                    "oldPrice" => $oldPrice,
                    "price" => $prodPrice
                ]);
            //dd($priceUpd);
                $success = \DB::table("products")
                    ->where("id", "=", $id)
                    ->update([
                        "name" => $prodName,
                        "cat_id" => $prodCat,
                        "hot" => $hotProd
                    ]);


        }catch(\PDOException $ex){
            $code = 409;
        }

    }


    public function insertImage($smallerFileName, $type, $size, $folder){
        return \DB::table("images")
                ->insertGetId([
                    "name" => $smallerFileName,
                    "alt" => "product",
                    "type" => $type,
                    "size" => $size,
                    "path" => $folder
                ]);
    }

    public function insertProd($request, $picId){
        $insert = 0;
        //\DB::transaction(function() use ($insert, $request){
         $prodName = $request->input("prodNameI");
        $prodCat = $request->input("prodCatI");
        $prodPrice = $request->input("prodPriceI");
        $oldPrice = $request->input("oldPriceI");
        $hotProd = $request->input("hotProdI");
        $insert = 0;
        if($picId){
            try{
                $priceId = \DB::table("price")
                    ->insertGetId([
                        "oldPrice" => $oldPrice,
                        "price" => $prodPrice
                    ]);
            }catch (\PDOException $ex){
                $ex->getMessage();
            }

            try{
                $insert =\DB::table("products")
                    ->insertGetId([
                        "name" => $prodName,
                        "cat_id" => $prodCat,
                        "hot" => $hotProd,
                        "img_id" => $picId,
                        "price_id" => $priceId
                    ]);
                //dd($insert);
            }catch (\PDOException $ex){
                $ex->getMessage();
            }

        }
       // });
        return $insert;


    }

    public function deleteProd($id){
        \DB::transaction(function() use($id) {
            /*$delete = \DB::table("wishlist")
                ->where("product_id", "=", $id)
                ->delete();*/
            $imgIdObj = \DB::table("products")
                ->select("img_id")
                ->where("id", "=", $id)
                ->first();
            $imgId = $imgIdObj->img_id;
            //dd($imgIdObj);
            $priceIdObj = \DB::table("products")
                ->select("price_id")
                ->where("id", "=", $id)
                ->first();
            $priceId = $priceIdObj->price_id;
            //dd($imgId->img_id);
            $delete = \DB::table("wishlist")
                ->where("product_id", "=", $id)
                ->delete();
            $delete = \DB::table("products")
                ->where("id", "=", $id)
                ->delete();
            $delete = \DB::table("images")
                ->where("id", "=", $imgId)
                ->delete();
            $delete = \DB::table("price")
                ->where("id", "=", $priceId)
                ->delete();

        });
    }
}
