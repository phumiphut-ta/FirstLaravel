@extends('master')

@section('content')
<div class="title">
    <h3>CUSTOMER</h3>   
</div>
<p>
    <a href="/customer/create">New Customer</a>
</p>
@if(session()->has('status'))
<p class="help is-success">{{ session()->get('status')}}</p>
@endif

<hr>
{{$x->links('paginators.bulma')}}
{{-- {{$x->links()}} --}}
</hr>

<table class="table">
    <tr>
        <th>ID</th>
        <th><a href="/customer?sort=first_name">NAME</a></th>
        <th><a href="/customer?sort=last_name">SURNAME</a></th>
        <th><a href="/customer?sort=gender">GENDER</a></th>
        <th><a href="/customer?sort=birth_date">AGE</a></th>
        <th>IMAGE</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
    @foreach($x as $c)
    <tr>
    {{-- <td><a href="/customer/{{$c->id}}">{{$c->id}}</a></td> --}}
    <td><a href="{{action('CustomerController@show',['id' => $c->id])}}">{{$c->id}}</a></td>
    <td>{{$c->first_name}}</td>
    <td>{{$c->last_name}}</td>
    <td>{{genderText($c->gender)}}</td>
    <td>{{age($c->birth_date)}}</td>
    <td><img src="{{genderImages($c->gender)}}" alt=""></td>
    <td><a href="/customer/{{$c->id}}/edit" class="button is-warning">Edit</a></td>
    <td>
        @if(auth()->user()->can('customer-delete'))
            <form onsubmit="return confirm('Are you sure ???')" action="/customer/{{$c->id}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input type="submit" name="Delete" value="Deleted" class="button is-danger" id="">
            </form>
        @else
            &nbsp;
        @endif
    </td>
    </tr>
    
    @endforeach
</table>

@endsection