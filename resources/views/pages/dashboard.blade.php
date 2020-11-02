@extends('layouts.app')

@section('content')
<div class="container-md">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-primary" href="/transaction/create">Create Transaction</a>
                            <a class="btn btn-primary" href="/transactions">View All</a>
                        </div>
                        <a class="btn btn-outline-primary" href="/user/tags">Create Tag</a>
                        <a class="btn btn-outline-primary" href="/user/sources">Create Source</a>
                    </div>

                    <h5 class="mt-4">Current Account Balance: ${{ $currentAccountBalance }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
