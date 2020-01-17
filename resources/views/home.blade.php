@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- DATA TABLE FOR LOGS -->
            <div class="row">
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="index-table" width="100%">
                            <thead>
                                <tr>
                                    <th colspan="6" class="text-center">BORROWER LOGS</th>
                                </tr>
                                <tr>
                                    <th>History *</th>
                                    <th>Owner Name</th>
                                    <th>Owner Email</th>
                                    <th>Item Borrowed</th>
                                    <th>Borrower Email</th>
                                    <th>Date Borrowed</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <a href="{{ route('user.export') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
                </div>
            </div>
            <!-- /.DATA TABLE FOR LOGS -->
            <div class="card mt-5">

                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <!-- ADD FORM -->
                    <div class="row">
                        <div class="container">
                            <div class="card-header">Add Inventory <a class="btn btn-primary ml-3" id="view-add">Show
                                    Form</a></div>
                            <div id="toggle-form">
                                <div class="card-body">
                                    {!! Form::open(['action' => 'HomeController@store', 'method' => 'POST']) !!}
                                    <div class="form-group">
                                        {{Form::label('ownerName','Owner Name')}}
                                        {{Form::text('ownerName','', ['class' => 'form-control', 'placeholder' => ''])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('email','Owner Email')}}
                                        {{Form::email('email','', ['class' => 'form-control', 'placeholder' => ''])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('item_type','Owned Item Type:')}}
                                        {{Form::text('item_type','', ['class' => 'form-control', 'placeholder' => ''])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('item_serial','Owned Item Serial Number:')}}
                                        {{Form::text('item_serial','', ['class' => 'form-control', 'placeholder' => ''])}}
                                    </div>
                                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                                    {!! Form::close() !!}
                                </div>
                                <!-- /.cardbody for add -->
                            </div>
                        </div>
                    </div>
                    <!-- /. END FOR ADD -->

                    <!-- INVENTORY TABLE -->
                    <div class="row">
                        <div class="container">
                            <div class="card-header">Inventory Table <a class="btn btn-primary ml-3"
                                    id="view-table">Show
                                    Table</a></div>
                            <div id="toggle-table">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="inventory-table"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th colspan="6" class="text-center">INVENTORY</th>
                                                </tr>
                                                <tr>
                                                    <th>Item *</th>
                                                    <th>Owner Name</th>
                                                    <th>Owner Email</th>
                                                    <th>Item Type</th>
                                                    <th>Item S/N</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.cardbody for add -->
                            </div>
                        </div>
                    </div>
                    <!-- /. END FOR ADD -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content-extra')
<script>
    $(document).ready(function(){
        $('#toggle-form').hide();
        $("#toggle-table").hide();
    });
    $(document).ready(function(){
        $("#view-add").click(function() {
            $("#toggle-form").slideToggle(500);
        });

        $("#view-table").click(function() {
            $("#toggle-table").slideToggle(500);
        });
    });
    $(document).ready( function () {
            $('#index-table').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('user.log') }}",
             columns: [
                      { data: 'history_id', name: 'history_id' },
                      { data: 'owner_name', name: 'owner_name' },
                      { data: 'owner_email', name: 'owner_email' },
                      { data: 'item_type', name: 'item_type' },
                      { data: 'borrower_email', name: 'borrower_email' },
                      { data: 'borrowed_date', name: 'borrowed_date' }
                   ]
          });
      });

      $(document).ready( function () {
        $('#inventory-table').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('user.inventory') }}",
         columns: [
                  { data: 'item_id', name: 'item_id' },
                  { data: 'owner_name', name: 'owner_name' },
                  { data: 'email', name: 'email' },
                  { data: 'item_type', name: 'item_type' },
                  { data: 'item_serial', name: 'item_serial' },
                  { data: 'action', name: 'action' }
               ]
      });
  });
</script>
@endsection
