<?php

namespace App\Http\Controllers;

use App\Space;
use App\Company;
use App\SpaceTypes;
use App\SpaceSchedule;
use App\SpacePrice;
use App\SpaceChecklistItem;
use App\SpaceImage;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use File;
use DB;
use Image;
use Illuminate\Support\Facades\Redirect;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('user_id', '=', Auth::user()->id)->first();

        $spacetypes = SpaceTypes::all(['id', 'name']);
        // return view('space-register')
        //     ->with('spacetypes', $spacetypes);

        $spacetype_checklist = null;

        return view('space-register', ['spacetypes'=>$spacetypes, 'company'=>$company, 'spacetype_checklist'=>$spacetype_checklist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$uploadcount = 0;

        foreach ($request->images as $img) {
            $uploadcount++;
            print_r($uploadcount);
        }*/

        $space = new Space;

        //$existsCompany = Company::find(Auth::user()->id);

        $existsCompany = Company::where('user_id', '=', Auth::user()->id)->first();

        if($existsCompany === null) {
            $company = new Company;

            /* INSERT COMPANY INFO */
            $company->name = $request->company_name;
            $company->user_id = Auth::user()->id;
            $company->address = $request->company_address;
            $company->country = $request->company_country;
            $company->city = $request->company_city;
            $company->zipcode = $request->company_zipcode;
            $company->nif = $request->company_nif;
            $company->person = $request->company_person;
            $company->phone_number = $request->company_phone_number;
            $company->save();
        } else {
            // UPDATE INFO
            $existsCompany->name = $request->company_name;
            $existsCompany->user_id = Auth::user()->id;
            $existsCompany->address = $request->company_address;
            $existsCompany->country = $request->company_country;
            $existsCompany->city = $request->company_city;
            $existsCompany->zipcode = $request->company_zipcode;
            $existsCompany->nif = $request->company_nif;
            $existsCompany->person = $request->company_person;
            $existsCompany->phone_number = $request->company_phone_number;
            $existsCompany->save();    
        }

        //$company = new Company;
        

        /* INSERT COMPANY INFO */
        // $company->name = $request->company_name;
        // $company->user_id = Auth::user()->id;
        // $company->address = $request->company_address;
        // $company->country = $request->company_country;
        // $company->city = $request->company_city;
        // $company->zipcode = $request->company_zipcode;
        // $company->nif = $request->company_nif;
        // $company->person = $request->company_person;
        // $company->phone_number = $request->company_phone_number;
        // $company->save();

        /* INSERT SPACE INFO */
        $space->user_id = Auth::user()->id;

        if($existsCompany === null) {
            $space->company_id = $company->id;
        } else {
            $space->company_id = $existsCompany->id;
        }
        
        $space->name = $request->space_name;
        $space->type_id = $request->space_type;
        $space->address = $request->space_address;
        $space->lat = $request->space_lat;
        $space->lng = $request->space_lng;
        $space->zipcode = $request->space_zipcode;
        $space->city = $request->space_city;
        $space->country = $request->space_country;
        $space->description = $request->space_description;
        $space->admin_reviewed = 0;
        $space->save();

        /* INSERT SPACE SCHEDULE INFO */
        for ($x = 1; $x <= 7; $x++) {

            $schedule = new SpaceSchedule;

            $data_is_all_day = Input::get('is_all_day');
            $is_closed_day = Input::get('is_closed_day');


            $schedule->space_id = $space->id;
            $schedule->user_id = Auth::user()->id;
            $schedule->week_day = $x;
            $schedule->open_hour = $request->open[$x];
            $schedule->close_hour = $request->close[$x];
            $schedule->all_day = $data_is_all_day[$x];
            $schedule->closed = $is_closed_day[$x];
            $schedule->save();
        } 

        /* INSERT SPACE HOURLY PRICE INFO */
        for ($x = 1; $x <= 3; $x++) {

            $price = new SpacePrice;

            $price->space_id = $space->id;
            $price->user_id = Auth::user()->id;
            $price->type = $x;
            $price->hour = $request->hour_price[$x];
            $price->hour4 = $request->hour4_price[$x];
            $price->hour8 = $request->hour8_price[$x];
            $price->month = $request->month_price[$x];
            $price->save();
        } 

        /* INSERT CHECKLIST INFO */ 

        

        $space_spaceType = $request->space_type;

        $checklist_count = DB::table('stype_checklist_items')
                ->where('type_id', $space_spaceType)
                ->where('check', '=', 1)
                ->count();
        
        $cl_data = Input::get('cl_item_id');
        // retorna um array com os items que estão checkados ou não (0 e 1)

        for ($x = 1; $x <= $checklist_count; $x++) {
            $space_checklist = new SpaceChecklistItem;

            $getCLITEM = $request->getCLID[$x-1];
            //dd($getCLITEM);
            $cl_check = $cl_data[ $getCLITEM ];

            $space_checklist->space_id = $space->id;
            $space_checklist->stype_checklist_item_id = $getCLITEM;
            $space_checklist->value = $request->cl_checklist_Value[$getCLITEM];
            $space_checklist->status = $cl_check;
            $space_checklist->user_id = Auth::user()->id;
            $space_checklist->save();
        } 


        /* INSERT IMAGES */

        $files = $request->file('images');

        $file_count = count($files);
        $uploadcount = 0;
        //$destinationPath = 'images/spaces/'.$space->id;

        $destinationPath = public_path('/images/spaces/' . $space->id);

        File::makeDirectory($destinationPath, 0775, true, true);

        foreach ($files as $file) {
            $rules = array('images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048');
            $validator = Validator::make(array('images'=>$file), $rules);

            if($validator->passes()) {
                
                //$filename = date("Y-m-d",time()) . '-' . $files[$uploadcount]->getClientOriginalName();
                //$upload_success = $file->move($destinationPath, $filename);

                // START HERE NEW CODE
                ini_set('memory_limit','256M');

                $extension = $file->getClientOriginalName();
                $thumb = Image::make($file->getRealPath())->encode('jpg', 75)->fit(370, 180, function ($constraint) {
                    $constraint->aspectRatio(); //maintain image ratio
                });
                //$destinationPath = public_path('/images/spaces/' . $space->id);
                $file->move($destinationPath, $extension);
                $thumb->save($destinationPath.'/thumb_'.$extension);
                //$product['imagePath'] = '/uploads/products/'. $username . '/' . $extension;
                //$product['thumbnail'] = '/uploads/products/'. $username . '/thumb_' . $extension;

                // END HERE NEW CODE


                $uploadcount ++;

                //$extension = $file->getClientOriginalExtension();

                $image = new SpaceImage;

                $image->space_id = $space->id;
                $image->user_id = Auth::user()->id;
                $image->img_name = '/images/spaces/'. $space->id . '/' . $extension;
                $image->img_thumb = '/images/spaces/'. $space->id . '/thumb_' . $extension;
                $image->img_type = $file->getClientMimeType();
                $image->img_size = $file->getClientSize();
                $image->save();

            }
        }

        //Set haveSpaces to 1
        $user = User::find(Auth::user()->id);

        if($user) {
            $user->haveSpaces = 1;
            $user->is_admin = 1;
            $user->save();
        }

        return redirect()->back()
            ->with('success','Your Space was created successfully!');

    }

    public function findSpaces($city, $type)
    {
        $currentspacetype = DB::table('space_types')
            -> select('id', 'name')
            -> where('space_types.id', '=', $type )
            -> get();

        $spacetypes = DB::table('space_types')
            -> select('id', 'name')
            -> where('space_types.id', '!=', $type )
            -> get();

        $spaces = DB::table('spaces')
            ->join('space_types', function($join) use ($type)
                    {
                        $join->on('space_types.id', '=', 'spaces.type_id')
                             ->on('space_types.id', '=', DB::raw($type));

                    })
            -> select('spaces.id','space_types.short_name','spaces.name','spaces.city','spaces.lat','spaces.lng')
            -> where('spaces.city', 'LIKE', '%'.$city.'%')
            -> OrderBy('spaces.id')->Paginate(20);

        $spaceprices = DB::table('spaces')
            -> join('space_prices', 'spaces.id', '=', 'space_prices.space_id')
            ->join('space_types', function($join) use ($type)
                {
                    $join->on('space_types.id', '=', 'spaces.type_id')
                         ->on('space_types.id', '=', DB::raw($type));

                })
            -> select('spaces.id', 'space_prices.hour', 'space_prices.hour4', 'space_prices.hour8', 'space_prices.month', DB::raw('min(space_prices.type) as lowesttype') )
            -> where('spaces.city', 'LIKE', '%'.$city.'%')
            -> where('space_prices.hour', '>', 0)
            -> orWhere('space_prices.hour4', '>', 0)
            -> orWhere('space_prices.hour8', '>', 0)
            -> orWhere('space_prices.month', '>', 0)
            ->groupBy('spaces.id')
             ->orderBy('spaces.id')
             ->get();

        $spaceimages = DB::table('spaces')
            -> join('space_images', 'spaces.id', '=', 'space_images.space_id')
            ->join('space_types', function($join) use ($type)
                {
                    $join->on('space_types.id', '=', 'spaces.type_id')
                         ->on('space_types.id', '=', DB::raw($type));

                })
            -> select('spaces.id','space_images.img_thumb')
            -> where('spaces.city', 'LIKE', '%'.$city.'%')
            ->get();

        $count_spaces = count($spaces);
        
        if($count_spaces >= 1)
            return view('search', ['currentspacetype'=>$currentspacetype, 'spacetypes'=>$spacetypes, 'list'=>$spaces, 'listimages'=>$spaceimages, 'search_city'=>$city, 'count_spaces'=>$count_spaces, 'spaceprices'=>$spaceprices ] )->withDetails($spaces);
        else return view('search', ['currentspacetype'=>$currentspacetype, 'spacetypes'=>$spacetypes, 'list'=>$spaces, 'listimages'=>$spaceimages, 'search_city'=>$city, 'count_spaces'=>$count_spaces, 'spaceprices'=>$spaceprices ] )->withMessage('No details found for "'. $city .'". Try to search again!');

    }

    public function refreshSearchMap()
    {
        $space_name = Input::get('name');
        $NElat = Input::get('NElat');
        $NElng = Input::get('NElat');
        $SWlat = Input::get('SWlat');
        $SWlng = Input::get('SWlng');

        //return json_encode($NElat);

        //$NElat = $request->input('NElat');

        //dd($request);

        $spaces = DB::table('spaces')
             -> join('space_types', 'spaces.type_id', '=', 'space_types.id')
             -> select('spaces.id','space_types.short_name','spaces.name','spaces.city','spaces.lat','spaces.lng')
             -> where('spaces.name', 'LIKE', '%'.$space_name.'%')
             -> whereBetween('spaces.lat', [$SWlat, $NElat])
             -> OrderBy('spaces.id')->Paginate(20);

             $data = $spaces->get();
        // $spaceimages = DB::table('spaces')
        //     -> join('space_images', 'spaces.id', '=', 'space_images.space_id')
        //     -> select('spaces.id','space_images.img_thumb')
        //     -> where('spaces.name', 'LIKE', '%'.$space_name.'%')
        //     //-> whereBetween('spaces.lat', [$SWlat, $NElat])
        //     -> OrderBy('spaces.id')
        //     ->get();


        // return view('search-list', ['list'=>$spaces, 'listimages'=>$spaceimages] );

        return view('search-list-teste')->with('space_name', $data);
    }


    public function adminSearch()
    {
        $q = Input::get ( 'q' );

        $space = DB::table('spaces')
            -> join('companies', 'spaces.company_id', '=', 'companies.id')
            -> join('space_types', 'spaces.type_id', '=', 'space_types.id')
            -> select('spaces.name as space_name','space_types.short_name as type_name','spaces.city as city','companies.name as company_name','companies.person as person','companies.phone_number as phone_number')
            -> where('spaces.name', 'LIKE','%'.$q.'%')->orWhere('companies.name','LIKE','%'.$q.'%')
            -> OrderBy('spaces.name')->Paginate(15);


        //$space = Company::where('name','LIKE','%'.$q.'%')->orWhere('person','LIKE','%'.$q.'%')->get();
        if(count($space) > 0)
            return view('search-results')->withDetails($space)->withQuery($q);
        else return view('search-results')->withMessage('No details found for "'. $q .'". Try to search again!');
    }

    public function listOwnedSpaces() 
    {
        $spaces = DB::table('spaces')
            -> join('space_types', 'spaces.type_id', '=', 'space_types.id')
            -> select('spaces.id','space_types.short_name','spaces.name','spaces.city','spaces.admin_reviewed')
            -> where('user_id', '=', Auth::user()->id)
            -> OrderBy('id')->Paginate(15);

        return view('myspaces',compact('spaces'));
    }

    public function listSpacesForReview() 
    {
        $spaces = DB::table('spaces')
            -> join('space_types', 'spaces.type_id', '=', 'space_types.id')
            -> join('companies', 'spaces.company_id', '=', 'companies.id')
            -> select('spaces.id', 'spaces.name', 'spaces.city', 'space_types.short_name', 'companies.name as company', 'companies.person', 'companies.phone_number')
            -> where('admin_reviewed', '=', 0)
            -> OrderBy('id')->Paginate(15);

        return view('Admin/space_for_review',compact('spaces'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$spaceinfo = Space::find($id);

        $spaceinfo = DB::table('spaces')
            -> join('space_types', 'spaces.type_id', '=', 'space_types.id')
            -> select('spaces.id','space_types.name as type_name','spaces.name','spaces.address','spaces.zipcode','spaces.city', 'spaces.lat as space_lat', 'spaces.lng as space_lng', 'spaces.description', 'spaces.admin_reviewed')
            -> where('spaces.id', '=', $id)
            ->get();

        $spaceimages = DB::table('space_images')
            -> select('space_images.space_id','space_images.img_name','space_images.img_thumb')
            -> where('space_images.space_id', '=', $id)
            ->get();

        $spaceschedule = DB::table('space_schedules')
            -> select('space_schedules.week_day','space_schedules.open_hour','space_schedules.close_hour', 'space_schedules.all_day', 'space_schedules.closed')
            -> where('space_schedules.space_id', '=', $id)
            -> orderBy('space_schedules.id')
            ->get();

        $spaceprices = DB::table('space_prices')
            -> selectRaw('space_prices.type, ifnull(space_prices.hour,"n/a") as hour, ifnull(space_prices.hour4,"n/a") as hour4, ifnull(space_prices.hour8,"n/a") as hour8, ifnull(space_prices.month,"n/a") as month, ifnull(space_prices.hour,0) + ifnull(space_prices.hour4,0) + ifnull(space_prices.hour8,0) + ifnull(space_prices.month,0) AS have_price_check')
            -> where('space_prices.space_id', '=', $id)
            -> orderBy('space_prices.type')
            ->get();

        $spacechecklist = DB::table('space_checklist_items')
            -> join('checklist_items', 'space_checklist_items.stype_checklist_item_id', '=', 'checklist_items.id')
            -> select('checklist_items.description','checklist_items.label','space_checklist_items.value', 'space_checklist_items.value as haveValue', 'space_checklist_items.status')
            -> where('space_checklist_items.space_id', '=', $id)
            ->get();

           // dd($spaceprices);

         $spacecomments = null;
            
        return view('space', ['spaceinfo'=>$spaceinfo, 'spaceimages'=>$spaceimages, 'spaceschedule'=>$spaceschedule, 'spaceprices'=>$spaceprices, 'spacechecklist'=>$spacechecklist, 'spacecomments'=>$spacecomments ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spacecompany = DB::table('spaces')
            -> join('companies', 'spaces.company_id', '=', 'companies.id')
            -> select('companies.name as company_name','companies.address as company_address','companies.zipcode as company_zipcode','companies.city as company_city','companies.country as company_country','companies.nif as company_nif','companies.person as company_person','companies.phone_number as company_phone_number')
            -> where('spaces.id', '=', $id)
            ->get();

        $currentspacetype = DB::table('spaces')
            ->join('space_types','spaces.type_id', '=', 'space_types.id')
            ->select('space_types.id')
            ->where('spaces.id', '=', $id)
            ->get();

        $spacetypes = DB::table('space_types')
            -> select('id', 'name')
            -> where('space_types.id', '!=', $currentspacetype[0]->id )
            -> get();

        $spaceinfo = DB::table('spaces')
            -> join('space_types', 'spaces.type_id', '=', 'space_types.id')
            -> select('spaces.id','space_types.id as space_type_id', 'space_types.name as space_type', 'spaces.name as space_name','spaces.address as space_address','spaces.zipcode as space_zipcode','spaces.city as space_city', 'spaces.country as space_country', 'spaces.lat as space_lat', 'spaces.lng as space_lng', 'spaces.description as space_description')
            -> where('spaces.id', '=', $id)
            ->get();

        $spaceimages = DB::table('space_images')
            -> select('space_images.space_id','space_images.img_name','space_images.img_thumb')
            -> where('space_images.space_id', '=', $id)
            ->get();

        $spaceschedule = DB::table('space_schedules')
            -> select('space_schedules.week_day','space_schedules.open_hour','space_schedules.close_hour', 'space_schedules.all_day', 'space_schedules.closed')
            -> where('space_schedules.space_id', '=', $id)
            -> orderBy('space_schedules.id')
            ->get();

        $spaceprices = DB::table('space_prices')
            -> select('space_prices.type', 'space_prices.hour', 'space_prices.hour4', 'space_prices.hour8', 'space_prices.month')
            -> where('space_prices.space_id', '=', $id)
            -> orderBy('space_prices.type')
            ->get();

        $spacechecklist = DB::table('space_checklist_items')
            -> join('checklist_items', 'space_checklist_items.stype_checklist_item_id', '=', 'checklist_items.id')
            -> select('checklist_items.description','space_checklist_items.stype_checklist_item_id as item_id','checklist_items.label','space_checklist_items.value', 'space_checklist_items.value as haveValue', 'space_checklist_items.status')
            -> where('space_checklist_items.space_id', '=', $id)
            ->get();

        return view('space-edit', ['spacecompany'=>$spacecompany, 'spaceinfo'=>$spaceinfo, 'spacetypes'=>$spacetypes, 'spaceimages'=>$spaceimages, 'spaceschedule'=>$spaceschedule, 'spaceprices'=>$spaceprices ,'spacechecklist'=>$spacechecklist ]);
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
        $space = Space::findOrFail($id);

        //$company = Company::findOrFail($id);
        $company = Company::where('id', '=', $space->company_id)->first();
        $company->name = $request->company_name;
        $company->address = $request->company_address;
        $company->zipcode = $request->company_zipcode;
        $company->city = $request->company_city;
        $company->nif = $request->company_nif;
        $company->person = $request->company_person;
        $company->phone_number = $request->company_phone_number;
        $company->save();

        $space_spaceType = $request->space_type;

        $space->type_id = $space_spaceType;
        $space->name = $request->space_name;
        $space->address = $request->space_address;
        $space->zipcode = $request->space_zipcode;
        $space->city = $request->space_city;
        $space->country = $request->space_country;
        $space->lat = $request->space_lat;
        $space->lng = $request->space_lng;
        $space->description = $request->space_description;
        $space->save();

        /* UPDATE CHECKLIST INFO */ 
        $checklists = SpaceChecklistItem::where('space_id', '=', $id);
        $checklists->delete();

        $checklist_count = DB::table('stype_checklist_items')
                ->where('type_id', $space_spaceType)
                ->where('check', '=', 1)
                ->count();
        
        $cl_data = Input::get('cl_item_id');
        // retorna um array com os items que estão checkados ou não (0 e 1)

        for ($x = 1; $x <= $checklist_count; $x++) {
            $space_checklist = new SpaceChecklistItem;

            $getCLITEM = $request->getCLID[$x-1];
            //dd($getCLITEM);
            $cl_check = $cl_data[ $getCLITEM ];
            //dd($cl_check);
            $space_checklist->space_id = $id;
            $space_checklist->stype_checklist_item_id = $getCLITEM;
            $space_checklist->value = $request->cl_checklist_Value[$getCLITEM];
            $space_checklist->status = $cl_check;
            $space_checklist->user_id = Auth::user()->id;
            $space_checklist->save();
        } 

        /* UPDATE SPACE SCHEDULE INFO */

        $data_is_all_day = Input::get('is_all_day');
        $is_closed_day = Input::get('is_closed_day');

        for ($x = 1; $x <= 7; $x++) {

            $schedule = SpaceSchedule::where('space_id', '=', $id)
                ->where('week_day', '=', $x)
                ->first();

            $schedule->user_id = Auth::user()->id;
            $schedule->space_id = $id;
            $schedule->week_day = $x;
            $schedule->open_hour = $request->open[$x];
            $schedule->close_hour = $request->close[$x];
            $schedule->all_day = $data_is_all_day[$x];
            $schedule->closed = $is_closed_day[$x];
            $schedule->save();
        } 

        /* INSERT SPACE HOURLY PRICE INFO */
        for ($x = 1; $x <= 3; $x++) {

            $price = SpacePrice::where('space_id', '=', $id)
                    ->where('space_prices.type','=', $x)
                    ->orderBy('space_prices.type')
                    ->first();

            $price->space_id = $space->id;
            $price->user_id = Auth::user()->id;
            $price->type = $x;
            $price->hour = $request->hour_price[$x];
            $price->hour4 = $request->hour4_price[$x];
            $price->hour8 = $request->hour8_price[$x];
            $price->month = $request->month_price[$x];
            $price->save();
        } 


        return redirect()->route('myspaces')
                        ->with('success','Your space ' . $request->space_name . ' was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $space = Space::findOrFail($id);
        $space->deleted = 1;
        $space->save();

        return redirect()->back();
    }

    public function uploadFiles(Request $request) {
        
        $files = $request->file('files');

        if(!empty($files)):
            $filename = time() . '-' . $files->getClientOriginalName();
        
            $upload_success = $files->move('/images/spaces', $filename);

            if ($upload_success) {
                return Response::json('success', 200);
            } else {
                return Response::json('error', 400);

            }
        endif;      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCheckList($itemID)
    {   
            //dd("Im HERE! - ID: " . $itemID);
            $spacetype_checklist = DB::table('checklist_items')
            ->leftJoin('stype_checklist_items', function($join) use ($itemID)
                    {
                        $join->on('checklist_items.id', '=', 'stype_checklist_items.checklist_item_id')
                             ->on('stype_checklist_items.type_id', '=', DB::raw($itemID));

                    })
            ->select('checklist_items.description','checklist_items.haveValue', 'checklist_items.label', 'stype_checklist_items.checklist_item_id')
            -> where('stype_checklist_items.check', '=', 1)
            ->get();
        //dd($spacetype_checklist);
        return view('Admin/Checklist/space_register_checklist')->with('spacetype_checklist', $spacetype_checklist);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSpaceCheckList($spaceID, $typeID)
    {   
        $currentspacetype = DB::table('spaces')
        ->join('space_types','spaces.type_id', '=', 'space_types.id')
        ->select('space_types.id')
        ->where('spaces.id', '=', $spaceID)
        ->get();

        if( $currentspacetype[0]->id == $typeID ) {
        // CHECKLIST DO ESPAÇO JÁ REGISTADO
        $spacechecklist = DB::table('space_checklist_items')
            -> join('checklist_items', 'space_checklist_items.stype_checklist_item_id', '=', 'checklist_items.id')
            -> select('checklist_items.description','space_checklist_items.stype_checklist_item_id as item_id','checklist_items.label','space_checklist_items.value', 'space_checklist_items.value as haveValue', 'space_checklist_items.status')
            -> where('space_checklist_items.space_id', '=', $spaceID)
            ->get();

        } else {

        //SE ALTERAR O TIPO DE ESPAÇO, TEM DE REGISTAR NOVA INFORMAÇÃO! LOAD DA CHECKLIST DE CADA TIPO DE ESPAÇO
        $spacechecklist = DB::table('checklist_items')
            ->leftJoin('stype_checklist_items', function($join) use ($typeID)
                    {
                        $join->on('checklist_items.id', '=', 'stype_checklist_items.checklist_item_id')
                             ->on('stype_checklist_items.type_id', '=', DB::raw($typeID));

                    })
            ->select('checklist_items.description','checklist_items.haveValue as haveValue', DB::raw('"" as value'), 'checklist_items.label', 'stype_checklist_items.checklist_item_id as item_id', DB::raw('0 as status'))
            -> where('stype_checklist_items.check', '=', 1)
            ->get();
        }
        //dd($spacetype_checklist);
        return view('Admin/Checklist/space_edit_checklist')->with('spacechecklist', $spacechecklist);
    }

    /**
     * Accept space.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function acceptSpace($id)
    {
        $space = Space::findOrFail($id);
        $space->admin_reviewed = 1;
        $space->save();

        return redirect()->route('reviewspaces')->with('message', $space->name . ' accepted successfully!');
        //return back()->with('success','Item created successfully!');
        //return Redirect::route('reviewspaces')->with('message', 'Login Failed');

        // \Session::flash('flash_message', $space->name . ' accepted successfully!');

        // return redirect()->route("reviewspaces");


    }

}
