<a href="/" class="navbar-item" >Home</a>
<a href="/customer" class="navbar-item">Customer</a>
<a href="/product" class="navbar-item">Product</a>
<a href="/about" class="navbar-item">About</a>
<a href="/contact" class="navbar-item">Contact</a>

@if(auth()->check())
<a href="/logout" class="navbar-item">Logout ({{ auth()->user()->email}})</a>
@else
<a href="/login" class="navbar-item">Login</a>
@endif