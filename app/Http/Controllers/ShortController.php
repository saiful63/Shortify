<?php

namespace App\Http\Controllers;

use App\Models\UrlShrotner;
use Illuminate\Http\Request;

class ShortController extends Controller
{
     public function short($code){
        //$shorten = UrlShrotner::all();
        //return $code;
        $url = UrlShrotner::where('code',$code)->first();
        $url->update([
            'count'=>$url->count + 1
        ]);
        return redirect($url->url);
    }
}
