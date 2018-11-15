<?php

namespace App\Http\Controllers;

use App\Proffesion;

use Illuminate\Http\Request;
use App\Slider;
use App\Service;
use App\Member;
use App\Category;
use App\Project;
use Mail;
//use App\Mail\SendMail;

class FrontController extends Controller
{
    public function index()
    {
        $slider_images = Slider::orderBy('id', 'ASC')->get();
        $service = Service::orderBy('id','ASC')->limit(4)->get();
        $member = Member::orderBy('id','ASC')->limit(4)->get();
        $categories = Category::orderBy('id','ASC')->get();
        $project = Project::orderBy('id','ASC')->get();

        return view('welcome',compact('slider_images','service', 'member', 'categories', 'project'));


    }
}
