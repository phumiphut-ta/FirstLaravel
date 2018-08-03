@extends('master')

@section('content')
<div class="title">
    <h3>PRODUCT</h3>   
</div>
<p>
    <a href="/customer/create">New Prouct</a>
</p>
@if(session()->has('status'))
<p class="help is-success">{{ session()->get('status')}}</p>
@endif
<table class="table">
    @foreach($x as $c)
    <tr>
    
    <td>{{$c->id}}</td>
    <td>{{$c->category_id}}</td>
    <td>{{$c->product_name_en}}</td>
    <td>{{$c->product_name_th}}</td>
    <td>{{$c->unit_en}}</td>
    <td>{{$c->unit_th}}</td>
    <td>{{$c->price}}</td>
    
    </tr>
    
@endforeach
</table>

@endsection