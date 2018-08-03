@extends('master')

@section('content')
<div>
<h3 class="title">Customer Profile {{$c->id}}</h3>
<p>Name: {{$c->first_name}}</p>
<p>Surname: {{$c->last_name}}</p>
<p><img src="{{genderImages($c->gender) }}" alt=""></p>
<hr>
@foreach($c->orders as $o)
    <p><strong>Order:{{$o->id}}</strong></p>
    <table class="table">
    @foreach ($o->orderItems as $o)
        
        
            <tr>
                <td>{{$o->product_id}}</td>
                <td>{{$o->price}}</td>
                <td>{{$o->qty}}</td>
            </tr>
       
        
    @endforeach
</table>
@endforeach
</div>
