<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Outfit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home(){
        $top = Item::where('type', 'top')->get();
        $bottom = Item::where('type', 'bottom')->get();
        if (Auth::id()) {
            $user = User::where('id', auth()->user()->id)->first();
            return view('home-page.home-page',compact('top', 'bottom', 'user'));
        }
        return view('home-page.home-page',compact('top', 'bottom'));
    }

    public function profile(){
        $outfits = Outfit::where('user_id', auth()->user()->id)->get();
        $user = User::where('id', auth()->user()->id)->first();
        //dd($outfits);
        return view('home-page.profile', compact('outfits', 'user'));
    }

    public function show($id){
        $outfit = Outfit::find($id);
        return view('home-page.user-show', compact('outfit'));
    }

}
