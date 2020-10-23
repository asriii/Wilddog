@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->all())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach 
            </ul>
        @endif
        {!! Form::open(['action' => 'ContactController@store','method'=>'POST']) !!}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('First Name') !!}
                    {!! Form::text('firstname',null, ["class"=>"form-control"])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Last Name') !!}
                    {!! Form::text('lastname',null, ["class"=>"form-control"])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Phone Number') !!}
                    {!! Form::text('phoneno',null, ["class"=>"form-control"])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Email;') !!}
                    {!! Form::text('email',null, ["class"=>"form-control"])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Address') !!}
                    {!! Form::text('address',null, ["class"=>"form-control"])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Profile') !!}
                    {!! Form::file('profile',null, ["class"=>"form-control"])!!}
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        {!! Form::close() !!}
    </div>
@endsection 
