<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.about.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'description' => ['required', 'max:1000'],
            'title' => ['required', 'max:200'],
            'image' => ['image'],
            'resume' => ['mimes:pdf,csv,txt','max:10000'],
        ]);

        $about = About::first();
        $imagePath =  handleUpload('image', $about);
        $resumePath =  handleUpload('resume', $about);

        About::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'description' => $request->description,
            'image' => (!empty($imagePath)) ? $imagePath : $about->image,
            'resume' => $resumePath ?? $about->resume,
        ]);
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
