<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SpaceTypes;

class SpaceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $spacetypes = SpaceTypes::orderBy('id','ASC')->paginate(10);
        return view('Admin/SpaceTypes/spacetype2',compact('spacetypes'))
            /*->with('i', ($request->input('page', 1) - 1) * 5)*/;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/SpaceTypes/spacetype_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'short_name' => 'required',
        ]);

        SpaceTypes::create($request->all());
        return redirect()->route('spacetype.index')
                        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spacetype = SpaceTypes::find($id);
        return view('Admin/SpaceTypes/spacetype_show',compact('spacetype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spacetype = SpaceTypes::find($id);
        return view('Admin/SpaceTypes/spacetype_edit',compact('spacetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'short_name' => 'required',
        ]);

        SpaceTypes::find($id)->update($request->all());
        return redirect()->route('spacetype.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // SpaceTypes::find($id)->delete();
        // return redirect()->route('spacetype.index')
        //                 ->with('success','Item deleted successfully');
        $spacetype = SpaceTypes::findOrFail($id);
        $spacetype->deleted = 1;
        $spacetype->save();

        return redirect()->back();
    }
}
