<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Outfit;
use Illuminate\Http\Request;

class OutfitController extends Controller
{

    public function index()
    {
        $outfits = Outfit::all();
        return view ('admin.submitted-outfits', compact('outfits' ));
    }


    public function create()
    {
        //
    }


    public function store(Request $request){

        $user = User::where('id', auth()->user()->id)->first();

        $request->validate([
            'top' => 'required',
            'bottom' => 'required'
        ]);

        $top = $request->top;
        $bottom = $request->bottom;
        $outfit = new Outfit;
        $outfit->bottom_id = $bottom;
        $outfit->top_id = $top;
        $outfit->user_id = $user->id;
        $outfit->save();

        return redirect()->route('home')->with('flash_message', 'Matching outfit submitted, thank you!');

    }

    public function show($id)
    {
        $outfit = Outfit::find($id);
        return view('admin.show-outfit', compact('outfit'));
    }


    public function edit($id)
    {
        $outfit = Outfit::find($id);
        $top = Item::where('type', 'top')->get();
        $bottom = Item::where('type', 'bottom')->get();
        return view('home-page.edit-outfit', compact('top', 'bottom', 'outfit'));
    }


    public function update(Request $request, $id)
    {
        $outfit = Outfit::find($id);
        
        $original_top = $outfit->getRawOriginal('top_id');
        $original_bottom = $outfit->getRawOriginal('bottom_id');

        if($request->top != null && $request->bottom == null){
            $top = $request->top;
            $outfit->top_id = $top;
            $outfit->bottom_id = $original_bottom;
        }
        elseif($request->top == null && $request->bottom != null){
            $bottom = $request->bottom;
            $outfit->bottom_id = $bottom;
            $outfit->top_id = $original_top;
        }
        elseif($request->top == null && $request->bottom == null ){
            $outfit->top_id = $original_top;
            $outfit->bottom_id = $original_bottom;
        } else {
            $top = $request->top;
            $bottom = $request->bottom;
            $outfit->bottom_id = $bottom;
            $outfit->top_id = $top;
        }

        $outfit->update();

        return redirect()->back()->with('flash_message', 'Outfit Updated!');

    }

    public function destroy($id)
    {
        $outfit = Outfit::find($id);
        $outfit->delete();
        return redirect()->back()->with('flash_message','Outfit Deleted!!');
    }
}
