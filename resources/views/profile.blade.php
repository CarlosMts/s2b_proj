@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <!-- left column -->
      <div class="col-md-3" style="margin-top:20px">
        <div class="text-center">
          <img src="{{ $user->avatar }}" style="width:150px; height:150px; border-radius:50%;">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control" name="avatar">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">

        <h2>{{ $user->name }}'s Profile</h2>
        
        <form class="form-horizontal" enctype="multipart/form-data" action="profile" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <div class="col-lg-8">
              <input class="form-control" type="text" placeholder="Name">
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-8">
              <input class="form-control" type="email" placeholder="Email">
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Contact">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Birthday">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="City">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="Country">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-3">
              <input class="form-control" type="text" placeholder="NIF">
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-8">
              <input type="button" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection