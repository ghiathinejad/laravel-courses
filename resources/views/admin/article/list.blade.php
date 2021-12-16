@extends('layouts.master')
@section('content')
    <h2 class="my-4">Article List Page</h2>
    <div class="card mb-4">
        <div class="card-body">
            @if(count($articles) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>body</th>
                            <th>operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $art)
                            <tr>
                                <td>{{ $art['id'] }}</td>
                                <td>{{ $art['title'] }}</td>
                                <td>{{ $art['body'] }}</td>
                                <td>
                                    <form action="/admin/article/delete/{{ $art['id'] }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" >delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>


@endsection
