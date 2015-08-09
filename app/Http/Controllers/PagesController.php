<?php
/**
 * Created by PhpStorm.
 * User: Shubham
 * Date: 08-08-2015
 * Time: 11:10 PM
 */

namespace App\Http\Controllers;

class PagesController extends Controller {

    public function Home() {
        $pageTitle = "Getting stared with Laravel";
        return view('welcome')->with('title',$pageTitle);
    }

    public function About() {
        $pageTitle = "About Page!";
        return view('welcome')->with('title',$pageTitle);
    }
}