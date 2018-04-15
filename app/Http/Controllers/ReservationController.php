<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Message;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DateTime;
use DB;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $reservation = new Thread;

        $reservation->date_begin = DateTime::createFromFormat('d/m/Y', $request->reservation_begin)->format('Y-m-d');
        $reservation->date_end = DateTime::createFromFormat('d/m/Y', $request->reservation_end)->format('Y-m-d');
        $reservation->hour_type_id = $request->reservation_hourtype;
        $reservation->weekend = $request->reservation_weekend;
        $reservation->user_id = Auth::user()->id;
        $reservation->space_id = $request->reservation_space;
        $reservation->confirmed = false;
        $reservation->canceled = false;
        $reservation->discount_id = 0;
        $reservation->total_price = $request->reservation_price;
        $reservation->total_with_discount = $request->reservation_price;
        $reservation->discount_value = 0;
        $reservation->paid = false;

        $reservation->save();

        $message = new Message;

        $message->thread_id = $reservation->id;
        $message->sender_id = Auth::user()->id;
        $message->message = Input::get('reservation_text');
        $message->read = false;
        $message->save();


        return redirect()->back()
            ->with('success','Your reservation request was sent successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function writeMessage()
    {   
        $new_message = new Message;

        $new_message->thread_id = Input::get('last_thread_id');
        $new_message->sender_id = Auth::user()->id;
        $new_message->message = Input::get('message');
        $new_message->read = false;
        $new_message->save();


        $messages = DB::table('messages')
        -> join('users', 'messages.sender_id', '=', 'users.id')
        -> select('messages.id','messages.thread_id','messages.sender_id', 'users.avatar', 'messages.message','messages.created_at as time')
        -> where('messages.id', '=', $new_message->id)
        -> orderBy('messages.created_at', 'asc')
        -> get();


        return view('messages-new', ['messages'=>$messages]);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUserReservations()
    {
        $reservation = DB::table('threads')
        -> join('spaces', 'threads.space_id', '=', 'spaces.id')
        -> join('space_types', 'spaces.type_id', '=', 'space_types.id')
        -> join('hour_types', 'threads.hour_type_id', '=', 'hour_types.id')
        -> select('threads.id', 'threads.date_begin', 'threads.date_end', 'hour_types.type', 'threads.weekend', 'spaces.name', 'space_types.short_name', 'threads.total_with_discount')
        -> where('threads.user_id', '=', Auth::user()->id)
        -> OrderBy('threads.created_at', 'asc')
        ->paginate(10);

        return view('reservation-userList', ['reservation'=>$reservation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSpaceReservations()
    {
        $reservation = DB::table('threads')
        -> join('spaces', 'threads.space_id', '=', 'spaces.id')
        -> join('space_types', 'spaces.type_id', '=', 'space_types.id')
        -> join('hour_types', 'threads.hour_type_id', '=', 'hour_types.id')
        -> join('users', 'threads.user_id', '=', 'users.id')
        -> select('threads.id', 'threads.date_begin', 'threads.date_end', 'hour_types.type', 'threads.weekend', 'users.name', 'space_types.short_name', 'threads.total_with_discount')
        -> where('spaces.user_id', '=', Auth::user()->id)
        -> OrderBy('threads.created_at', 'asc')
        ->paginate(10);

        return view('reservation-spaceList', ['reservation'=>$reservation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reservationMessagesUserList()
    {   
        $user = null;

        $usersList = DB::table('threads')
        -> join('spaces', 'threads.space_id', '=', 'spaces.id')
        -> join('users', 'threads.user_id', '=', 'users.id')
        -> join('users as space_users', 'spaces.user_id', '=', 'space_users.id')
        -> join(DB::raw("(select max(id) as last_msg_id,
                  thread_id
          from messages
          group by thread_id) AS msg"), 'msg.thread_id', '=', 'threads.id')
        -> join('messages', 'msg.last_msg_id', '=', 'messages.id')
        -> select('threads.id', 'threads.user_id', 'users.name as user_name', 'users.avatar as user_avatar', 'threads.space_id', 'spaces.user_id as space_user_id', 'spaces.name as space_name', 'space_users.avatar as space_user_avatar', 'messages.message', 'messages.read', 'messages.created_at')
        -> where('threads.user_id', '=', Auth::user()->id)->orWhere('spaces.user_id','=',Auth::user()->id)
        -> groupBy('threads.user_id')
        -> OrderBy('threads.id', 'asc')
        -> get();

        return view('messages', ['user'=>$user, 'usersList'=>$usersList ]);
    }

    public function chatHistory()
    {
        $id = Input::get('id');

        $checkSpace = DB::table('users')
        ->select('users.id')
        ->where('users.id', '=', $id)
        ->where('users.haveSpaces', '=', 1)
        ->first();

        if($checkSpace === null) {
            $user = DB::table('users')
            ->select('users.id', 'users.name', 'users.avatar')
            ->where('users.id', '=', $id)
            ->get();
        } else {
            $user = DB::table('users')
            ->join('spaces', 'users.id', '=', 'spaces.user_id')
            ->select('users.id', 'spaces.name', 'users.avatar')
            ->where('users.id', '=', $id)
            ->get();
        }

        $threads = DB::table('threads')
        -> join('spaces', 'threads.space_id', '=', 'spaces.id')
        -> join('users', 'threads.user_id', '=', 'users.id')
        -> join('users as space_users', 'spaces.user_id', '=', 'space_users.id')
        -> select('threads.id', 'threads.user_id',  'threads.date_begin', 'threads.date_end','users.name as user_name', 'users.avatar as user_avatar', 'threads.space_id', 'spaces.user_id as space_user_id', 'spaces.name as space_name', 'space_users.avatar as space_user_avatar')
        ->where(function ($query) use ($id) {
            $query->where('threads.user_id', '=', $id)
                ->where('spaces.user_id','=',Auth::user()->id);
        })->orWhere(function($query) use ($id) {
            $query->where('threads.user_id', '=', Auth::user()->id)
                ->where('spaces.user_id','=',$id);   
        })
        -> groupBy('threads.id')
        -> OrderBy('threads.created_at', 'asc')
        -> get();

        $dt = $threads->pluck('id');

        $messages = DB::table('messages')
        -> join('users', 'messages.sender_id', '=', 'users.id')
        -> select('messages.id','messages.thread_id','messages.sender_id', 'users.avatar', 'messages.message','messages.created_at as time')
        -> whereIn('messages.thread_id', $dt)
        -> orderBy('messages.created_at', 'asc')
        -> get();


        $message_read = Message::where('thread_id', '=', $messages->pluck('thread_id') )
        ->update(['read' => 1]);


        return view('messages-chat', ['user'=>$user, 'threads'=>$threads, 'messages'=>$messages]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
