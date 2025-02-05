<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use File;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index',compact("hero"));
    }

    public function create()
    {
        /* return view('admin.heroes.create');*/
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:500'],
            'image' => ['max:3000', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $hero = Hero::first();

            //Check if has the value and after check if the file exists or not in the path
            if($hero && File::exists(public_path($hero->image))){
                File::delete(public_path($hero->image));
            }
            $image = $request->file('image');
            $imageName = rand() . $image->getClientOriginalName();
            $image->move(public_path('/uploads'), $imageName);
            $imagePath = "/uploads/" . $imageName;
        }

        Hero::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'btn_text' => $request->btn_text,
            'btn_url' => $request->btn_url,
            'image' => $imagePath ?? null,
        ]);

        toastr()->success('Hero updated successfully',['Success']);
        return redirect()->route('admin.hero.index');

    }
}
