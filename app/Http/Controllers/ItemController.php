<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function PHPUnit\Framework\fileExists;

class ItemController extends Controller
{

    public function index()
    {
        $item = Item::all();
        return view ('admin.add-items', compact('item'));
    }


    public function create()
    {
        return view('admin.add-new-items');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required',
            'type'=>'required',
            'img'=>'required',
            'img'=> ['mimes:jpg,jpeg,png']
        ]);
        $input = new Item;
        // $input = $request->validated();
        if($request->hasFile('img')){
            $path = 'storage/img/' . $input->img;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('storage/img/', $filename);
            $input->img = $filename;
        }
        $input->name = $request->input('name');
        $input->type = $request->input('type');
        $input->save();
        return redirect()->route('items.index')->with('flash_message', 'Item Added!');
    }


    public function show($id)
    {
        $item = Item::find($id);
        return view ('admin.view-added-items',compact('item'));

    }


    public function edit($id)
    {
        $item = Item::find($id);
        return view('admin.edit-added-items', compact('item'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'img'=> ['mimes:jpg,jpeg,png']
        ]);
        $item = Item::find($id);
        // $input = $request->validated();
        if($request->hasFile('img')){
            $path = 'storage/img/' . $item->img;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('storage/img/', $filename);
            $item->img = $filename;
        }
        $item->name = $request->input('name');
        $item->type = $request->input('type');
        $item->update();
        return redirect()->route('items.index')->with('flash_message', 'Item Updated!');
    }


    public function destroy($id)
    {
        $item = Item::find($id);
        $path = 'storage/img/' . $item->img;
        if(File::exists($path)){
            File::delete($path);
        }
        $item->delete();
        return redirect()->back()->with('flash_message', 'Item Deleted!!!!!');
    }
}



