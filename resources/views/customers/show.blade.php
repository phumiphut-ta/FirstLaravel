@extends('master')

@section('content')
<div>
<h3 class="title">Customer Profile {{$c->id}}</h3>
<p>Name: {{$c->first_name}}</p>
<p>Surname: {{$c->last_name}}</p>
<p><img src="{{genderImages($c->gender) }}" alt=""></p>
<hr>
    <table class="table">
    @foreach($c->orders as $o)
        <tr>
        <td>{{$o->order_date}}</td>
        <td>{{$o->order_amount}}</td>
        </tr>
    @endforeach
    </table>
</div>
@endsection