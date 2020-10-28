@extends('layouts.app')

@section('content')
<div class="container text-light">
    <div class="row">
        <div class='col-lg-12'>
            <h1>Settings Page</h1>
        </div>
    </div>

    <!-- Form -->
    <form method="POST">
        @csrf
        
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Current Account Balance</label>
                    <input class="form-control" type="number" step="0.01" />
                </div>
            </div>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection