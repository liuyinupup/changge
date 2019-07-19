<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        if(\Auth::check()){
            // $navs=\Auth::user()->navs->get()->sortBy('created_at', 'desc');
            $navs=DB::table('navs')->where('user_id',\Auth::user()->id)->orderBy('created_at', 'desc')->get();
            //  $navs=\Auth::user()->navs;
            
            return view('pages.root',compact('navs'));
        }
        return view('pages.root');
    }
}