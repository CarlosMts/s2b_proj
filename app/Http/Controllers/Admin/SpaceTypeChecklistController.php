<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\StypeChecklistItem;
use App\SpaceTypes;
use App\ChecklistItem;
use Input;

class SpaceTypeChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
        //Apagar os registos anteriores
        $clear = DB::table('stype_checklist_items')
                ->where('type_id', $request->type_id);
        $clear->delete();

        //Inserir Checklist por Tipo de Espaço
        $count_items = ChecklistItem::count();
        $data = Input::get('item_id');

        for ($x = 1; $x <= $count_items; $x++) {

            $getITEM = $request->getID[$x - 1];
            $check = $data[ $getITEM ];

            //if ($check == 1) {

                $st_checklist = new StypeChecklistItem();
                $st_checklist->type_id = $request->type_id;
                $st_checklist->checklist_item_id = $getITEM;
                $st_checklist->check = $check;
                $st_checklist->save();
            //}
        } 

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function refreshSpaceTypeChecklistTable($itemID)
    {   
            //dd("Im HERE! - ID: " . $itemID);
            $spacetype_checklist = DB::table('checklist_items')
            ->leftJoin('stype_checklist_items', function($join) use ($itemID)
                    {
                        $join->on('checklist_items.id', '=', 'stype_checklist_items.checklist_item_id')
                             ->on('stype_checklist_items.type_id', '=', DB::raw($itemID));

                    })
            ->select('checklist_items.*', 'stype_checklist_items.check')
            ->get();
        //dd($spacetype_checklist);
        return view('Admin/Checklist/table_spacetype_checklist', ['spacetype_checklist' => $spacetype_checklist]);
    }

    
}
