@extends('layouts.app')

@section('content')
<div class="container-md text-light">
    <div class="row">
        <div class='col-lg-12'>
            <h1>Transaction Sources</h1>
        </div>
    </div>

    <!-- Create Tag Form -->
    <div class="row mt-2">
        <div class="col-lg-12">
            <form class="form-inline" method="POST">
                @csrf

                <div class="form-group">
                    <input class="form-control" name="source_name" type="text" placeholder="Create new Source" />
                </div>

                <button class="btn btn-success ml-2">Create Source</button>
            </form>
        </div>
    </div>

    <!-- Transaction Tag Table -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <table class="table table-bordered table-dark">
                <thead>
                    <th>Source Name</th>
                    <th>Created</th>
                    <th>Remove</th>
                </thead>

                <tbody>
                    @if($sources)
                        @foreach($sources as $source)
                        <tr>
                            <td>{{ ucwords($source->name) }}</td>
                            <td>{{ $source->created_at->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-danger" href='/user/source/delete/{{ $source->id }}'>Remove</a>
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
