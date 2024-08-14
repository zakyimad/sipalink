<?php

namespace App\Http\Controllers;

use App\Models\Sipalink;
use App\Models\Tag;
use App\Models\User;
use App\Http\Requests\StoreSipalinkRequest;
use App\Http\Requests\UpdateSipalinkRequest;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.dashboard', [
            'links' => Sipalink::orderBy('created_at','DESC')->get(),
            'tags' => Tag::all(),
            'top_contributors' => Sipalink::select('created_by', DB::raw('COUNT(*) as count'))
                                ->groupBy('created_by')
                                ->orderBy('count','DESC')
                                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSipalinkRequest $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Sipalink $sipalink)
    {
        //
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
