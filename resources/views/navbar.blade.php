<a href="/"  >Home</a>
<a href="/customer" >Customer</a>
<a href="/product" >Product</a>
<a href="/about" >About</a>
<a href="/contact" >Contact</a>

@if(auth()->check())
<a href="/logout" >Logout ({{ auth()->user()->email}})</a>
@else
<a href="/login" >Login</a>
@endif