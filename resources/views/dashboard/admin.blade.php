@extends('layouts.app')

@section('content')

<h1>Hello Admin {{ Auth::user()->name }}</h1>
    
@endsection