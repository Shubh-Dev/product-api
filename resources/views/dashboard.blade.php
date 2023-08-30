@extends('layouts.app')
@section('content')

<h1>This is dashboard</h1>
<p>Hi, {{ Auth::user()->name }}</p>
<p>You are logged in!</p>
<p><a href="/logout">Logout</a></p>
@endsection