<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function index(){

        return view("home");
    }
    public function login(){

        return view("login");
    }

    public function register(){

        return view("register");
    }
}
