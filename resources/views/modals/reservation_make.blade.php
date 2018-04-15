<!-- Modal -->
  <div class="modal fade" id="makeReservation" role="dialog">
    <div class="modal-dialog" style="width:800px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ask to Space</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('reservation.store') }}" enctype="multipart/form-data">
        
          {{ csrf_field() }}
          <div class="modal-reservation-header">
              <input type="hidden" name="reservation_space" id="modal-body-space">
              <div class="reservation-parts">
                  <p>Data Início:</p>
                  <input type="hidden" name="reservation_begin" id="modal-body-dateBegin">
                  <input type="text" disabled="disabled" name="reservation_begin" id="modal-body-dateBegin">
              </div>
              <div class="reservation-parts">
                  <p>Data Fim:</p>
                  <input type="hidden" name="reservation_end" id="modal-body-dateEnd">
                  <input type="text" disabled="disabled" name="reservation_end" id="modal-body-dateEnd">
              </div>
              <div class="reservation-parts-details">
                  <p>Detalhes:</p>
                  <input type="hidden" name="reservation_weekend" id="modal-body-weekend">
                  <input type="text" disabled="disabled" name="reservation_details" id="modal-body-details">
              </div>
              <div class="reservation-parts">
                  <p>Total</p>
                  <input type="hidden" name="reservation_hourtype" id="modal-body-hourtype">
                  <input type="hidden" name="reservation_price" id="modal-body-price">
                  <input type="text" disabled="disabled" name="reservation_price" id="modal-body-price">
              </div>
          </div>

          <div class="modal-reservation-body">
              <p>Insira algum comentário adicional que gostaria de transmitir ao espaço. </br>Por exemplo, qual o horário pretendido da sua reserva, ou se necessita de um equipamento adicional.</p>

              <textarea rows="5" cols="50" id="reservation_text" name="reservation_text"></textarea>
          </div>
          
          
        </div>

        <div class="form-group">
                <div class="col-sm-10 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

        </form>
      </div>
      
    </div>
  </div>
