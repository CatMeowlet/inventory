@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="container">
                            <div class="card-header">Add Inventory</div>
                            <div class="card-body">
                                {!! Form::open(['action' => 'HomeController@store', 'method' => 'POST']) !!}
                                <div class="form-group">
                                    {{Form::label('item_id','Item ID')}}
                                    {{Form::text('item_id','', ['class' => 'form-control', 'placeholder' => ''])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('user_id','User ID')}}
                                    {{Form::text('user_id','', ['class' => 'form-control', 'placeholder' => ''])}}
                                </div>
                                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                                {!! Form::close() !!}
                            </div>
                            <!-- /.cardbody for add -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
