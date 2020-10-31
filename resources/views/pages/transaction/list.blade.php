@extends('layouts.app')

@section('content')
<div class="container text-light">
    <div class="row">
        <div class='col-lg-6'>
            <h1>Transactions</h1>
            <h5>Current Account Balance: ${{ $currentAccountBalance }}</h5>
        </div>

        <div class="col-lg-6 d-flex align-items-end flex-column">
            <a href="/transaction/create" class="btn btn-success mt-auto p-2">Create Transaction</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mt-2">
            <table class="table table-dark table-bordered">
                <thead>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Source</th>
                    <th>Tag</th>
                    <th>Date</th>
                </thead>

                <tbody>
                @if(@$transactions)
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ ucfirst($transaction->type) }}</td>
                        <td>${{ str_replace('-', '', $transaction->amount) }}</td>
                        <td>{{ $transaction->description }}</td>
                        <td>{{ $transaction->source_id }}</td>
                        <td></td>
                        <td>{{ $transaction->date->format('Y-m-d g:i a') }}</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection