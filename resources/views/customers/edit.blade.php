@extends('master')

@section('content')
    <div>
        <h3 class="title">Edit Customer</h3>

    <form action="{{ action('CustomerController@update',['id'=> $c->id ]) }}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="field">
                <p class="help is-danger">{{$errors->first('first_name') }}</p>
            <input type="text" class="input" name="first_name" placeholder="Name" value="{{$c->first_name}}">
            </div>
            
            <div class="field">
                    <p class="help is-danger">{{$errors->first('last_name') }}</p>
            <input type="text" class="input" name="last_name" placeholder="Surname" value="{{$c->last_name}}">
            </div>
            
            <input type="submit" value="Save" class="button">

        </form>
 
    </div>
@endsection
