@extends('layouts.app')

@section('content')
<div class="container-md text-light">
    <div class="row">
        <div class='col-lg-12'>
            <h1>Transaction Tags</h1>
        </div>
    </div>

    <!-- Create Tag Form -->
    <div class="row mt-2">
        <div class="col-lg-12">
            <form class="form-inline" method="POST">
                @csrf

                <div class="form-group">
                    <input class="form-control" name="tag_name" type="text" placeholder="Create new Tag" />
                </div>

                <button class="btn btn-success ml-2">Create Tag</button>
            </form>
        </div>
    </div>

    <!-- Transaction Tag Table -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <table class="table table-bordered table-dark">
                <thead>
                    <th>Tag Name</th>
                    <th>Created</th>
                    <th>Remove</th>
                </thead>

                <tbody>
                    @if($tags)
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{ ucfirst($tag->name) }}</td>
                            <td>{{ $tag->created_at->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-danger" href='/user/tags/delete/{{ $tag->id }}'>Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
