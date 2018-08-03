@extends('master')

@section('content')
 <form action="/login" method="POST">
    {{csrf_field()}}
     <div class="field">
         <input type="email" class="input">
     </div>
     <div class="field">
            <input type="password" class="input">
        </div>
        <hr>
        <input type="submit" class="button is-primary" value="Login">
        <input type="reset" class="button is-danger" value="Cancel">
 </form>
@endsection