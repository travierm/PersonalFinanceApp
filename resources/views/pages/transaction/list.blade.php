@extends('layouts.app')

@section('content')
<div class="container-md text-light">
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
                    <th>Tags</th>
                    <th>Date</th>
                    <th>Remove</th>
                </thead>

                <tbody>
                @if(@$transactions)
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ ucfirst($transaction->type) }}</td>
                        <td>${{ str_replace('-', '', $transaction->amount) }}</td>
                        <td>{{ $transaction->description }}</td>
                        <!-- Transaction Source -->
                        <td>
                            <form method="POST" action="/transaction/update/source">
                                @csrf

                                <input type="hidden" name="transaction_id" value="{{ $transaction->id }}" />
                                @component('components.select.source', [
                                    'sources' => $sources,
                                    'sourceId' => $transaction->source_id,
                                    'submitOnChange' => true
                                ])
                                @endcomponent
                            </form>
                        </td>
                        <!-- Tags -->
                        <td>
                            <!-- List of Tags attached to Transaction -->
                            @include('components.list.tags', [
                                'transactionTags' => $transaction->getTags()
                            ])

                            <!-- Modal for Attaching Tags to Transactions -->
                            @include('components.modal.transaction_tag_create', [
                                'tags' => $tags,
                                'transactionId' => $transaction->id
                            ])

                            <!-- Button to open Modal -->
                            @include('components.modal.open_modal_button', [
                                'text' => 'Attach Tag',
                                'modalId' => 'transactionTagCreateModal_transactionId_' . $transaction->id
                            ])
                        </td>
                        <td>{{ $transaction->date->format('Y-m-d g:i a') }}</td>
                        <td>
                            <a class="btn btn-sm btn-danger mt-1" href="/transaction/delete/{{ $transaction->id }}">Remove</a>
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
