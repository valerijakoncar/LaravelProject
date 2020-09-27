<?php


namespace App\Models;


class Activity
{
    public function write($write, $date){
        $path = realpath('../storage/logs/activity.txt');
        $file = fopen($path, "a");
        fwrite($file, $write . $date . "\n");
        fclose($file);
        self::insert($write, $date);
    }

    public function print(){
//        $file = fopen("../storage/logs/activity.txt","r");
//        $data = file("../storage/logs/activity.txt");
        \DB::table("activities")
            ->update([ "readAdm" => 1]);

        return \DB::table("activities")
               ->orderBy("date", "DESC")
               ->get();

    }

    public function insert($text, $date){
        return \DB::table("activities")
            ->insertGetId([
                "id" => NULL,
                "text" => $text,
                "date" => $date
            ]);
    }

    public function sortActivity($request){
        $sort = $request->input("sort");
       return \DB::table("activities")
            ->orderBy("date", $sort)
            ->get();
    }

    public function newActivities(){
        return \DB::table("activities")
            ->where("readAdm", 0)
            ->count();
    }

}
