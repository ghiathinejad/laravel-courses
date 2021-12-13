@extends('layouts.master')
@section('content')
    <h2 class="my-4">Article Page</h2>
    <div class="card mb-4">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/admin/article/create" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">title: </label><input name="title" type="text" class="form-control" value="{{$article->title}}">
                </div>
                <div class="form-group">
                    <label for="body">body: </label><textarea name="body" class="form-control">{{$article->body}}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="save"  class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>


@endsection
