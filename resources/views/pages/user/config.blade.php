@extends('layouts.app')

@section('content')
<div class="container-md text-light">
    <div class="row">
        <div class='col-lg-12'>
            <h1>Account Config</h1>
        </div>
    </div>

    <!-- Form -->
    <form method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Current Account Balance</label>
                    <input class="form-control" name="current_account_balance" value="{{ $config->current_account_balance }}" type="number" step="0.01" />

                    @if($config->current_account_balance_updated_at)
                    <p class="mt-2">Last Updated: {{ $config->current_account_balance_updated_at->diffForHumans() }}</p>
                    @endif
                </div>
            </div>
        </div>

        <button class="btn btn-success">Save</button>
    </form>

    <div class="row">
        <div class="col-lg-3">
            <div class="float-right">
                <a href="/user/tags" class="btn btn-primary">Next: Create Tags</a>
            </div>
        </div>
    </div>
</div>
@endsection
