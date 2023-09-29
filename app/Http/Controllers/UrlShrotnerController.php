<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortUrlRequest;
use App\Models\UrlShrotner;
use Illuminate\Http\Request;
use Str;
use Auth;

class UrlShrotnerController extends Controller
{
    public function home(UrlShrotner $urlShrotner){
        $urls = $urlShrotner->latest()->get();
        return view('UrlShrotner',compact('urls'));
    }

    public function store(ShortUrlRequest $request,UrlShrotner $urlShrotner){
        do{
          $code = Str::random(6);

        }while($urlShrotner->where('code',$code)->exists());

       $urlShrotner->create([
        'user_id'=>Auth::user()->id,
        'url'=>$request->url,
        'code'=>$code
       ]);
       return redirect()->route('home')->with('success','Url have shrotend');
    }




    // public function getShrotenOne($code,UrlShrotner $urlShrotner){
    //     $url = $urlShrotner->where('code',$code)->first();
    //     $url->update([
    //         'count'=>$url->count + 1
    //     ]);
    //     return redirect($url->url);
    // }

    public function edit(UrlShrotner $urlShrotner){
     $url_det = $urlShrotner;
      return view('editUrl',compact('url_det'));
    }

    public function update(UrlShrotner $urlShrotner,ShortUrlRequest $request){

      $urlShrotner->update([
        'url'=>$request->url,
        'count'=>0
      ]);

      return redirect()->route('home')->with('success','Url have updated');
    }

    public function destroy(UrlShrotner $urlShrotner){
      $urlShrotner->delete();
      return redirect()->route('home')->with('success','Url deleted');
    }

}
