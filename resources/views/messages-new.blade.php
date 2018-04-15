
<!--new_message-->

@foreach ($messages as $key => $m)
        
    <div class="message-box right-img">
        <div class="picture">
            <img src="{{ $m->avatar }}" title="user"/>
        </div>
        <div class="message-right">
            <p>{{ $m->message }}</p>
        </div>
        <div class="time-right">{{ date('d-m-Y H:i', strtotime($m->time)) }}</div>
          
    </div>
    
@endforeach
