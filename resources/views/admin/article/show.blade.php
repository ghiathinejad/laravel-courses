@extends('layouts.master')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            {{$article->title}}
        </div>
        <div class="card-body">

            <p class="card-text">{{$article->body}}</p>

        </div>
        <div class="card-footer text-muted">
            <form action="/admin/edit/{{ $article->slug_fa }}" method="post">
                @csrf
                @method('get')
                <button type="submit" class="btn btn-warning" >edit</button>
            </form>
        </div>
    </div>


@endsection
