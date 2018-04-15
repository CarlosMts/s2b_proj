@if ($user != null ) 
<div class="new_message_head">
        <div class="pull-left">{{ $user[0]->name }}</div>
</div>

<!--new_message_head-->
<div class="chat_area">
    @foreach ($threads as $key => $th)
        <div class="modal-reservation-header">
              <div class="reservation-parts">
                  <p>Data Início:</p>
                  <input type="text" disabled="disabled" name="reservation_begin" value="{{ $th->date_begin }}">
              </div>
              <div class="reservation-parts">
                  <p>Data Fim:</p>
                  <input type="text" disabled="disabled" name="reservation_end" id="modal-body-dateEnd" value="{{ $th->date_end }}">
              </div>
              <div class="reservation-parts-details">
                  <p>Detalhes:</p>
                  <input type="text" disabled="disabled" name="reservation_details" id="modal-body-details">
              </div>
              <div class="reservation-parts">
                  <p>Total</p>
                  <input type="text" disabled="disabled" name="reservation_price" id="modal-body-price">
              </div>
          </div>

        @foreach ($messages as $key => $m)
            @if ( $m->thread_id == $th->id )
                @if ( $m->sender_id == Auth::user()->id )
                <div class="message-box right-img">
                    <div class="picture">
                        <img src="{{ $m->avatar }}" title="user"/>
                    </div>
                    <div class="message-right">
                        <p>{{ $m->message }}</p>
                    </div>
                    <div class="time-right">{{ date('d-m-Y H:i', strtotime($m->time)) }}</div>
                      
                </div>
                @else
                <div class="message-box left-img">
                    <div class="picture">
                        <img src="{{ $m->avatar }}" title="user"/>
                    </div>
                    <div class="message-left">
                        <p>{{ $m->message }}</p>
                    </div>
                    <div class="time-left">{{ date('d-m-Y H:i', strtotime($m->time)) }}</div>
                      
                </div>

                @endif
            @endif 
        @endforeach
    @endforeach

</div>

@else 

<div class="new_message_head">
        <div class="pull-left"></div>
</div>

<!--new_message_head-->
<div class="chat_area">

</div>
@endif