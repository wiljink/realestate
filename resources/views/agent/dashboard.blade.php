@extends('layouts.app')
@section('content')
    <h1>Welcome Agent</h1>
    <a href="{{ route('custom.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('custom.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection
