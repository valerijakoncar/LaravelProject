<?php


namespace App\Models;


class Socials
{

    public function getSocials(){
        return \DB::table("socials")
            ->get();
    }

    public function updateSoc($id, $href, $faClass){
        if(!empty($href)){
            $data = [
                "href" => $href
            ];
        }
        if(!empty($faClass)){
            $data = [
                "fa" => $faClass
            ];
        }
        if( (empty($faClass)) && (empty($href)) ){
            return;
        }
        if( (!empty($faClass)) && (!empty($href)) ){
            $data = [
                "href" => $href,
                "fa" => $faClass
            ];
        }
        return \DB::table("socials")
            ->where("id", "=", $id)
            ->update($data);
    }

    public function deleteSoc($id){
        return \DB::table("socials")
            ->where("id", "=", $id)
            ->delete();
    }

    public function insertSoc($href, $faClass){
        if( (!empty($faClass)) && (!empty($href)) ){
            return \DB::table("socials")
                ->insertGetId([
                    "id"  => NULL,
                    "fa" => $faClass,
                    "href" => $href
                ]);
        }

    }
}
