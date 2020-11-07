@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

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

                    <div class="mb-4">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-primary" href="/transaction/create">Create Transaction</a>
                            <a class="btn btn-primary" href="/transactions">View All</a>
                        </div>
                        <a class="btn btn-outline-primary" href="/user/tags">Create Tag</a>
                        <a class="btn btn-outline-primary" href="/user/sources">Create Source</a>
                    </div>

                    @include('components.account_balance')
                    <h5>Total Transactions: {{ $totalTransactions }}</h5>

                    @if($tagPieChart)
                    <div class="mt-4">
                        <h3>Spending by Tag</h3>
                        {!! $tagPieChart->render() !!}
                    </div>
                    @endif

                    @if($sourcePieChart)
                    <div class="mt-4">
                        <h3>Spending by Source</h3>
                        {!! $sourcePieChart->render() !!}
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
