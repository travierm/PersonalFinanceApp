@extends('layouts.app')

@section('content')
<div class="container text-light">
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
                    <p>Last Updated: {{ $config->current_account_balance_updated_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection