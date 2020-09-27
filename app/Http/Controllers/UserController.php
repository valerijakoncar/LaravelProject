<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessageRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;

class UserController extends Controller
{
    public function login(LoginRequest $request){
        $username = $request->input("logUsername");
        $password = $request->input("logPass");

        $userModel = new User();
        $user = $userModel->getUserByUsernamePassword($username, $password);

        if($user){
            $request->session()->put("user", $user);
            $am = new Activity();
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . $username. " sucessfully logged in." . "\t";
            $am->write($text, date("Y.m.d H:i:s"));
            return \redirect("/home");
        }else{
            return redirect("/home")->with("message", "You are not registered.");
        }
    }

    public function logout(Request $request){
        $username = session("user")->username;
        $am = new Activity();
        $text = $_SERVER['REMOTE_ADDR'] . "\t" . $username. " logged out." . "\t";
        $am->write($text, date("Y.m.d H:i:s"));
        $request->session()->forget("user");
        return redirect("/home");
    }

    public function registration(RegistrationRequest $request){
       /* $validator = Validator::make($request->all(), [
            "username" => [
                "required" => "Enter your username.",
                 "regex: /^[A-Za-z][a-z]{5,15}[\d]{1,5}$/"=> "Username must contain at least 6 characters and at least 1 number."
            ],
            "pass" =>  [
                "required" => "Enter your password.",
                "regex:/^[\d\w]{5,13}$/" => "Invalid password."
            ],
            "pass1" =>  [
                "required" => "Repeat your password.",
                "same:pass" => "Invalid repeated password."
            ],
            "email" => [
                "required" => "Email is required.",
                "email" => "Email is not in valid format"
            ],
            "tel" => [
                "required" => "Phone is required.",
                "regex:/^06[\d]\-[\d]{3}\-[\d]{3,4}$/" => "Phone is not in valid format."
            ],
            "town" =>[
                "nullable",
                "regex:/^[A-Z][a-z]{3,}(\s[A-Z][a-z]{2,})*$/" => "Town is not in valid format."
            ],
            "selectedGender" => [
                "required" => "Select your gender."
            ],
            "sendViaMail" => "nullable"
        ]);
        if ($validator->passes()) {
            return response()->json(['proslo'=>"proslo jeeee"], 200);
        }*/
        $username = $request->input("username");
        $password = $request->input("pass");
        $tel = $request->input("tel");
        $email = $request->input("email");
        $selectedGender = $request->input("selectedGender");
        $sendViaMail = $request->input("sendViaMail");
       // dd($request);
        $userModel = new User();
        $code = $userModel->registerUser($username, $password, $tel, $email, $selectedGender, $sendViaMail);
        if(($code>=200) && ($code<=299)){
            $am = new Activity();
            $text = $_SERVER['REMOTE_ADDR'] . "\t" . $username. " sucessfully registrated.";
            $am->write($text, date("Y.m.d H:i:s"));
        }

        return response()->json('', $code);
    }

    public function sendMessage(SendMessageRequest $request){
        $message = $request->input("message");
        $email = $request->input("email");
        if($message != ""){
            $userModel = new User();
            $successId = $userModel->sendMessage($message, $email);
            if($successId){
                $am = new Activity();
                $text = $_SERVER['REMOTE_ADDR'] . "\t" . $email. " sent a message." . "\t";
                $am->write($text, date("Y.m.d H:i:s"));
                return response()->json(["message" => "Your message was successfully sent."], 201);
            }else{
                return response()->json(["message" => "There was an error."], 500);
            }
        }
    }

}
