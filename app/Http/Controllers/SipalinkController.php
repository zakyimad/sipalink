<?php

namespace App\Http\Controllers;

use App\Models\Sipalink;
use App\Models\Tag;
use App\Http\Requests\StoreSipalinkRequest;
use App\Http\Requests\UpdateSipalinkRequest;

class SipalinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slinks = Sipalink::latest();

        if(request('search')) {
            $slinks ->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'like', '%' . request('search') . '%');
        }

        return view('home.sipalink.index', [
            'slinks' => $slinks->get(),
            'links' => Sipalink::orderBy('title')->get(),
            'toplinks' => Sipalink::orderBy('hit_counter', 'DESC')->take(4),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $request;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSipalinkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Sipalink::where('id', $id)->increment('hit_counter',1);

        return view('home.sipalink.show', [
            'links' => Sipalink::findOrFail($id)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sipalink $sipalink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSipalinkRequest $request, Sipalink $sipalink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sipalink $sipalink)
    {
        //
    }
}
