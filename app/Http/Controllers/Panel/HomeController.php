<?php

namespace App\Http\Controllers\Panel;

use App\Catagory;
use App\Course;
use App\Lecture;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {

//        $data['users'] = User::all()->count();

        return view('panel.index' );
    }
}
