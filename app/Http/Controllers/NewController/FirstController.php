<?php

namespace App\Http\Controllers\NewController;

use App\Http\Controllers\Controller;

class FirstController extends Controller
{

    public function showMessage(){
        return "hello again";
    }
    public function showAllUsers(){
        return "ahmed, mohamed, ali, mahmoud, ramadan";
    }

    public function homePage(){
        return view("welcome")->with(["name"=>"ahmed","age"=>20,"nationality"=>"egyptian"]);
    }

    public function showLanding(){
        return view("landing");
    }

}
