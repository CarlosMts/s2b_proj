<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\SpaceTypes;
use App\ChecklistItem;
use Auth;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $spacetypes = SpaceTypes::all();

        $spacetype_checklist = DB::table('checklist_items')
            ->leftJoin('stype_checklist_items', function($join) 
                    {
                        $join->on('checklist_items.id', '=', 'stype_checklist_items.checklist_item_id');
                        $join->on(function($query) 
                                {
                                 $query->on('stype_checklist_items.type_id', '=', DB::raw(1));
                                });

                    })
            ->select('checklist_items.*', 'stype_checklist_items.check')
            ->get();


        return view('Admin/Checklist/checklist', ['spacetypes' => $spacetypes, 'spacetype_checklist' => $spacetype_checklist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checklist = new ChecklistItem();
        $checklist->description = $request->description;
        $checklist->isFilter = $request->isFilter;
        $checklist->haveValue = $request->haveValue;
        $checklist->label = $request->label;
        $checklist->user_id = Auth::user()->id;
        $checklist->save();

        return redirect()->route('checklist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $checklist = ChecklistItem::findOrFail($id);
        $checklist->description = $request->description;
        $checklist->isFilter = $request->isFilter;
        $checklist->haveValue = $request->haveValue;
        $checklist->label = $request->label;
        $checklist->user_id = Auth::user()->id;
        $checklist->save();

        return redirect()->route('checklist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checklists = ChecklistItem::findOrFail($id);
        $checklists->delete();

        $checklists_refresh = ChecklistItem::all();

        return view('Admin/Checklist/table_checklist', ['checklists' => $checklists_refresh]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function refreshChecklistTable()
    {
        $checklists = ChecklistItem::all();

        return view('Admin/Checklist/table_checklist', ['checklists' => $checklists]);
    }

    
}
