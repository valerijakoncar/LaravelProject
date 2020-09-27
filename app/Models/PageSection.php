<?php


namespace App\Models;


use Illuminate\Http\Request;

class PageSection
{

     public function getPageSection($table){
         return \DB::table($table)
                ->get();
     }

     public function getMenuId($name){
        return \DB::table("menu")
            ->where("text", "LIKE", $name)
            ->select("id")
            ->first();
     }

    public function modAuthorText($text){
        return \DB::table("author")
            ->update([
                "text" => $text
            ]);
    }

}
