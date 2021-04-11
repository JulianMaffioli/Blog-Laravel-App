<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    //handle the index route
    public function index()
    {
        $title = "Index Page";
        return view('pages.index')->with('title', $title);
    }

    //handle the about route
    public function about()
    {
        $title = "About Us";
        return view('pages.about')->with('title', $title);
    }

    //handle the services route
    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Web Desing', 'Programming', 'SEO']
        );

        return view('pages.services')->with($data);
    }
}
