<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {

        $name = 'luke <span style="color: red;">boh</span>';
        // return view('pages/about')->with('name', $name);


        // return view('pages/about')->with([
        //     'first' => 'luke',
        //     'last' => 'boh',
        //     'name' => $name
        // ]);


        // $data = [];
        // $data['first'] = 'luke';
        // $data['last'] = 'boh';
        // $data['name'] = $name;
        // return view('pages/about')->with($data);


        // compact : Create array containing variables and their values
        $first = 'luke';
        $last = 'boh';
        $name = $name;
        $people = [
            'taylor swift',
            'nemo',
            'curry'
        ];

        return view('pages/about', compact('first', 'last', 'name', 'people'));


    }

    public function contact()
    {
        return view('pages/contact');
    }
}
