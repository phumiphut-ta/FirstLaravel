@extends('master')

@section('content')
<div>
<h3 class="title">Customer Profile {{$c->id}}</h3>
<p>Name: {{$c->first_name}}</p>
<p>Surname: {{$c->last_name}}</p>
<p><img src="{{genderImages($c->gender) }}" alt=""></p>
</div>
@endsection