@extends('layouts.admin')
@section('content')
<div class="col-sm-3 chat_sidebar">
    <div id="custom-search-input">
        <div class="input-group col-md-12">
            <input type="text" class="  search-query form-control" placeholder="Conversation" />
            <button class="btn btn-danger" type="button">
            <span class=" glyphicon glyphicon-search"></span>
            </button>
        </div>
    </div>
    
    <div class="member_list">
        <ul class="list-unstyled" id="chat_user_list">
            @foreach ($usersList as $key => $users)
                @if ( Auth::user()->id == $users->user_id ) 
                    
                    <li class="left clearfix" id="{{ $users->space_user_id }}">
                        {{ Form::hidden('invisible', $users->id, array('id' => 'last_thread_id' )) }}
                        <span class="chat-img pull-left">
                            <img src="{{ $users->space_user_avatar }}" alt="Pic" class="img-circle">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header_sec">
                                <strong class="primary-font">{{ $users->space_name }}</strong> <span class="pull-right">{{ date('d-m-Y H:i', strtotime($users->created_at)) }}</span>
                            </div>
                            <div class="contact_sec">
                                <input type="text" disabled="disabled" name="last_message" id="last_message" value="{{ $users->message }}"> 
                                @if ( $users->read == 0 ) 
                                    <span id="badge{{ $users->space_user_id }}" class="badge pull-right">new</span>
                                @endif
                            </div>
                        </div>
                    </li>
                    </a>
                <!-- Se os users sao espaços -->
                @elseif ( Auth::user()->id == $users->space_user_id ) 
                    
                    <li class="left clearfix" id="{{ $users->user_id }}">
                        {{ Form::hidden('invisible', $users->id, array('id' => 'last_thread_id' )) }}
                        <span class="chat-img pull-left">
                            <img src="{{ $users->user_avatar }}" alt="Pic" class="img-circle">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header_sec">
                                <strong class="primary-font">{{ $users->user_name }}</strong> <span class="pull-right">{{ date('d-m-Y H:i', strtotime($users->created_at)) }}</span>
                            </div>
                            <div class="contact_sec">
                                <input type="text" disabled="disabled" name="last_message" id="last_message" value="{{ $users->message }}"> @if ( $users->read == 0 ) 
                                        <span id="badge{{ $users->user_id }}" class="badge pull-right">new</span>
                                    @endif
                                
                            </div>
                        </div>
                    </li>
                    </a>
                @endif
            @endforeach
        </ul>
    </div>
</div>


<!--chat_sidebar-->

<div class="col-sm-9 message_section">
    <span id="chat-global">
        @include('messages-chat')
    </span>
    <!--chat_area-->
    <input type="hidden" disabled="disabled" id="current_thread_id" value="">
    <div class="message_write">
        <div class="input-group">
            <textarea class="form-control custom-control" id="textMessage" rows="3" style="resize:none" placeholder="Type your message here"></textarea>     
            <span class="input-group-addon btn_chat btn-primary">Send</span>
        </div>
    </div>
            
</div> <!--message_section-->
            
@endsection