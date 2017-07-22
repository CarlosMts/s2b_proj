<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
    <!-- AdminLTE Skin -->
    <link rel="stylesheet" href="{{ asset('css/skin-blue.css') }}">
    <!-- My  Styles -->
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        

        <div class="full-content">

        @include('main.header2')

          <aside class="main-sidebar-leftmenu skin-blue">
          <!-- sidebar-leftmenu: style can be found in sidebar-leftmenu.less -->
          <section class="sidebar-leftmenu skin-blue" style="height: auto;">
            <!-- sidebar-leftmenu menu: : style can be found in sidebar-leftmenu.less -->
            <ul class="sidebar-leftmenu-menu skin-blue">
              <li class="active treeview">
                <a href="{{ route('admin') }}">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              @if (Auth::user()->is_admin>=10)
              <li class="treeview">
                <a href="#">
                  <span>Add</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('spacetype.index') }}">Space Type</a></li>
                  <li><a href="{{ route('checklist.index') }}">Checklist</a></li>
                  <li><a href="#">Discount</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <span>Approve</span>
                  <span class="pull-right-container">
                    @if ( $countNewSpaces > 0 )
                    <small class="label pull-right bg-red">{{ $countNewSpaces }}</small>
                    @endif
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="{{ route('reviewspaces') }}">
                      <span>Spaces</span>
                      <span class="pull-right-container">
                        @if ( $countNewSpaces > 0 )
                        <small class="label pull-right bg-red">{{ $countNewSpaces }}</small>
                        @endif
                      </span>
                    </a>
                  </li>
                  <li><a href="#">Comments</a></li>
                </ul>
              </li>
              @endif
              <li><a href="{{ route('profile') }}"><i class="fa fa-book"></i> <span>My Profile</span></a></li>
              <li><a href="{{ route('myspaces') }}"><i class="fa fa-book"></i> <span>My Spaces</span></a></li>
              <li><a href="#"><i class="fa fa-book"></i> <span>My Reservations</span></a></li>
              <li>
                <a href="#">
                  <i class="fa fa-calendar"></i> <span>Calendar</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>Mailbox</span>
                  <!-- <span class="pull-right-container">
                    <small class="label pull-right bg-yellow">12</small>
                    <small class="label pull-right bg-green">16</small>
                    <small class="label pull-right bg-red">5</small>
                  </span> -->
                </a>
              </li>
              <li><a href="#"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            </ul>
          </section>
          <!-- /.sidebar-leftmenu -->
        </aside>


        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          
          <!--
          <section class="content-header">
            <h1>
              Dashboard
              <small>Version 2.0</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </section>
          -->

          <!-- Main content -->
          <div class="admin-content">
              @yield('content')
          </div>
          

          <!-- /.content -->
        </div>

  
        </div>

        


        
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/admin/app.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('js/admin/sidebar_menu.js') }}"></script>


<script type="text/javascript">
        $(document).ready(function() {

          document.getElementById('itemHaveValue').onchange = function() {
              document.getElementById('itemLabel').style.display = this.checked ? 'block' : 'none';
            };

        });

        // add a new checklist item
        $(document).on('click', '#openModal', function() {
            $('#addChecklistModal').modal('show');
        });
        $(document).on('click', '#addChecklistItem', function() {
            var isFilterChecked = $("input[name='itemIsFilter']").is(":checked") ? 1:0; 
            var haveValueChecked = $("input[name='itemHaveValue']").is(":checked") ? 1:0; 

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route("checklist.store") }}',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'description': $('#itemDescription').val(),
                    'isFilter': isFilterChecked,
                    'haveValue': haveValueChecked,
                    'label': $('#itemLabel').val(),
                },
                success: function (data) {
                    $('div.table-container').fadeOut();
                    $('div.table-container').load('{{ route("refreshChecklistTable") }}', function() {
                        $('div.table-container').fadeIn();
                    });
                }
            });
        });

        // delete a checklist item
        $(document).on('click', '.deleteModal', function() {
            $('#id_delete').val($(this).data('id'));
            $('#description_delete').val($(this).data('description'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $(document).on('click', '#deleteChecklistItem', function() {
            $.ajax({
                type: 'DELETE',
                url: 'checklist/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    $('div.table-container').fadeOut();
                    $('div.table-container').load('{{ route("refreshChecklistTable") }}', function() {
                        $('div.table-container').fadeIn();
                    });
                }
            });
        });

        // Edit a checklist item
        $(document).on('click', '.editModal', function() {
            var isFilter = $(this).data('isfilter');
            var haveValue = $(this).data('havevalue');

            //console.log("isFilter: " +  isFilter + " // haveValue: " + haveValue);

            $('.modal-title').text('Edit checklist item');
            $('#edit-itemID').val($(this).data('id'));
            $('#edit-itemDescription').val($(this).data('description'));

            if ( isFilter == 1 ) {
                $('#edit-itemIsFilter').prop('checked', true);
            } else {
                $('#edit-itemIsFilter').prop('checked', false);
            };

            if ( haveValue == 1 ) {
                $('#edit-itemHaveValue').prop('checked', true);
            } else {
                $('#edit-itemHaveValue').prop('checked', false);
            };

            $('#edit-itemLabel').val($(this).data('label'));
            id = $('#edit-itemID').val();
            $('#editChecklistModal').modal('show');
        });
        $(document).on('click', '#editChecklistItem', function() {

            var isFilterChecked = $("input[name='edit-itemIsFilter']").is(":checked") ? 1:0; 
            var haveValueChecked = $("input[name='edit-itemHaveValue']").is(":checked") ? 1:0; 

            $.ajax({
                type: 'POST',
                url: 'checklist/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'description': $('#edit-itemDescription').val(),
                    'isFilter': isFilterChecked,
                    'haveValue': haveValueChecked,
                    'label': $('#edit-itemLabel').val(),
                },
                success: function(data) {
                    $('div.table-container').fadeOut();
                    $('div.table-container').load('{{ route("refreshChecklistTable") }}', function() {
                        $('div.table-container').fadeIn();
                    });

                }
            });
        });


    $('input[name=type_id]').change(function(){

        var value = $( 'input[name=type_id]:checked' ).val();

        var url = '{{ route("refreshSpaceTypeChecklistTable", ":id") }}';
        url = url.replace(':id', value);

        //alert(value);
        $('div.table-container').fadeOut();
        $('div.table-container').load(url, function() {
                $('div.table-container').fadeIn();
            });
    });

    

    // delete space - show modal
        $(document).on('click', '.deleteSpaceModal', function() {
            span = document.getElementById("name_delete");
            txt = document.createTextNode($(this).data('name'));
            span.innerText = txt.textContent;

            space_id = $(this).data('id');

            $('#deleteSpaceModal').modal('show');
        });
        $(document).on('click', '#deleteSpace', function() {
            $.ajax({
                type: 'DELETE',
                url: 'space/' + space_id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    $(document).ajaxStop(function(){
                        window.location.reload();
                    });
                }
            });
        });

    



 </script>

 @include('modals.create_checklist')
 @include('modals.delete_checklist')
 @include('modals.edit_checklist')
 @include('modals.delete_space')
    
</body>
</html>
