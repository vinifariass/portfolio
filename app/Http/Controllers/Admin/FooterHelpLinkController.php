<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterHelpLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterHelpLink;
use Illuminate\Http\Request;

class FooterHelpLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterHelpLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-help-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-help-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|url',
        ]);

        $link = new FooterHelpLink();
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        toastr('Footer Help Link Created Successfully', 'success');
        return redirect()->route('admin.footer-help-links.index');
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
        $link = FooterHelpLink::findOrFail($id);
        return view('admin.footer-help-link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|url',
        ]);

        $link = FooterHelpLink::findOrFail($id);
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        toastr('Footer Help Link Updated Successfully', 'success');
        return redirect()->route('admin.footer-help-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $link = FooterHelpLink::findOrFail($id);
        $link->delete();

    }
}
