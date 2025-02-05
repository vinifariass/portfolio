<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        return view('admin.hero.index');
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
            'image' => $imagePath,
        ]);

        dd('Hero Updated Successfully');

    }
}
