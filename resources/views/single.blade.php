@extends('layouts.master')


@section('content')
    <h1 class="my-4">{{$article->title}}
    </h1>
        <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">

                <p class="card-text">{{$article->body}}</p>
                <form action="/admin/article/{{$article->id}}/edit" method="post">
                    @csrf
                    @method('get')
                    <button type="submit" class="btn btn-warning" >edit</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                Posted on January 1, 2017 by
                <a href="#">Start Bootstrap</a>
            </div>
        </div>
@endsection


@section('sidebar')
    @parent

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Bar Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>
@endsection
