<?php


namespace App\Models;


class User
{
    public function getUserByUsernamePassword($username, $password){
        return \DB::table("users")
            ->select("username", "role_id", "id", "email")
            ->where([
                ["pass", "=", md5($password)],
                ["username", "=", $username]
            ])
            ->first();
    }

    public function registerUser($username, $password, $tel, $email, $selectedGender, $sendViaMail){
        try{
            $insertedId = \DB::table('users')
                ->insertGetId(
                    ['id' => NULL, 'username' => $username, 'pass' => md5($password), 'phone' => $tel, 'email' => $email, 'gender' => $selectedGender,
                        'send_via_mail' => intval($sendViaMail), 'role_id' => 2]
                );
            if($insertedId){
                $code = 201;
            }else{
                $code = 409;
            }
        }catch(\PDOException $ex) {
            $code = 409;
        }
        return $code;
    }

    public function getUsers(){
        return \DB::table("users")
            ->get();
    }

    public function  findUser($id){
        return \DB::table("users")
            ->where("id", "=", $id)
            ->first();
    }

    public function updateUser($updateUserReq){
        $id = $updateUserReq->input("idU");
        $username = $updateUserReq->input("username");
        $pass = $updateUserReq->input("pass");
        $mail = $updateUserReq->input("mail");
        $sendNews = $updateUserReq->input("sendNews");
        $role = $updateUserReq->input("role");
        $query = \DB::table("users")
                ->where("id", "=", $id);
        if($pass != ""){
            return $query->update([
                "username" => $username,
                "pass" => md5($pass),
                "email" => $mail,
                "send_via_mail" => $sendNews,
                "role_id" => $role
            ]);
        }else{
            return $query->update([
                "username" => $username,
                "email" => $mail,
                "send_via_mail" => $sendNews,
                "role_id" => $role
            ]);
        }
    }

    public function deleteUser($id){
        return \DB::table("users")
            ->where("id", "=", $id)
            ->delete();
    }

    public function sendMessage($message, $email){
        return \DB::table("messages")
            ->insertGetId([
                "id" => NULL,
                "message" => $message,
                "email" => $email,
                "readMessage" => 0
            ]);
    }

    public function messageRead($id){
        return \DB::table("messages")
            ->where("id", "=", $id)
            ->update([
                "readMessage" => 1
            ]);
    }

}
