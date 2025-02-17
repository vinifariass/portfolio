<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterUsefulLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterUsefulLink;
use Illuminate\Http\Request;

class FooterUsefulLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterUsefulLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-useful-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-useful-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $footerUsefulLink = new FooterUsefulLink();
        $footerUsefulLink->name = $request->name;
        $footerUsefulLink->url = $request->url;
        $footerUsefulLink->save();
        toastr('Footer Useful Link created successfully', 'success');
        return redirect()->route('admin.footer-useful-links.index');
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
        $footerUsefulLink = FooterUsefulLink::findOrFail($id);
        return view('admin.footer-useful-link.edit', compact('footerUsefulLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'url' => 'required|url',
        ]);

        $footerUsefulLink = FooterUsefulLink::findOrFail($id);
        $footerUsefulLink->name = $request->name;
        $footerUsefulLink->url = $request->url;
        $footerUsefulLink->save();
        toastr('Footer Useful Link updated successfully', 'success');
        return redirect()->route('admin.footer-useful-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $footerUsefulLink = FooterUsefulLink::findOrFail($id);
        $footerUsefulLink->delete();
    }
}
