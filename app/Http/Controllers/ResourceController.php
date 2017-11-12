<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class ResourceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (!Helper::auth()) {
            return redirect('/');
        }

        $res = Resource::all();
        return view('resources.index', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('resources.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $data = $request->all();
        DB::transaction(function() use ($data) {
            Resource::create($data);
        });


        return redirect()->route('resource.index')->with('message', 'storing ok!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource) {
        $resource = Resource::find($resource->id);
        return view('resources.edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource) {
        $data = $request->all();

        DB::transaction(function() use ($resource, $data) {
            Resource::find($resource->id)->update($data);
        });

        return redirect()->route('resource.index')->with('message', 'updating ok!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource) {
        try {
            DB::transaction(function() use ($resource) {
                Resource::find($resource->id)->delete();
            });
        } catch (Exception $e) {
            return redirect()->route('resource.index')->with('message', 'Error occrrued!'); 
        }
        
        return redirect()->route('resource.index')->with('message', 'Successfully deleted!'); 
    }

}
