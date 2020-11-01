@extends('layouts.app')

@section('content')
<div class="container text-light">
    <div class="row">
        <div class='col-lg-12'>
            <h1>Create Transaction</h1>
            <h5>Current Account Balance: ${{ $currentAccountBalance }}</h5>
        </div>
    </div>

    @include('components.modal.source_create')

    <form method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-4">
                @include('components.error_alert')
                @include('components.success_alert')

                <!-- Type -->
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type">
                        <option value='income'>Income</option>
                        <option selected value='expense'>Expense</option>
                    </select>
                </div>

                <!-- Amount -->
                <div class="form-group">
                    <label>Amount</label>
                    <input class="form-control" name="amount" type="number" step="0.01" placeholder="Amount: $1.23" />
                </div>

                <!-- Source -->
                <div class="form-group">
                    <label>Source</label>
                    <select class="form-control mb-2" name="source_id">
                        <option value="">None</option>
                        @foreach($sources as $source)
                            <option value="{{ $source->id }}">{{ ucfirst($source->name) }}</option>
                        @endforeach
                    </select>
                    @include('components.modal.open_modal_button', [
                        'text' => 'Create Source',
                        'modalId' => 'sourceCreateModal'
                    ])
                </div>

                <!-- Tags -->
                <div class="form-group">
                    <label>Tag</label>
                    <select class="form-control" name="tag_id">
                        <option value="">None</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ ucfirst($tag->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>

                <!-- Date -->
                <div class="form-group">
                    <label>Date of Transaction</label>
                    <input class="form-control" name="date" type="datetime-local" value="{{ now()->format('Y-m-d\TH:i') }}" />
                </div>

                <button class="btn btn-success">Create</button>
                <a href="/transactions" class="btn btn-primary mt-auto">View All</a>
            </div>
        </div>
    </form>
</div>
@endsection
