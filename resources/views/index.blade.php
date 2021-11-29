@extends('layout.master')

@section('title' ,  "hello $username" )

@section('content')
    <h1> Hello {{ $username }}</h1>
@endsection

