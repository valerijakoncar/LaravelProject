<?php


namespace App\Models;


class Categories
{
    public function getCategories(){
        return \DB::table("categories")
            ->get();
    }

    public function insertCategory($catName){
        return \DB::table('categories')
            ->insertGetId([
                "id" => NULL,
                "name" => $catName
            ]);
    }

    public function deleteCategory($id){
        \DB::transaction(function() use($id) {
            $delete = \DB::table("products")
                ->where("cat_id", "=", $id)
                ->delete();
            $delete = \DB::table("categories")
                ->where("id", "=", $id)
                ->delete();
        });
    }

    public function renameCategory($id, $catName){
        return \DB::table("categories")
            ->where("id", "=", $id)
            ->update([
                "name" => $catName
            ]);
    }

    public function getCategoryName($categoryId){
        return \DB::table("categories")
            ->where("id", "=", $categoryId)
            ->select("name")
            ->first();
    }
}
