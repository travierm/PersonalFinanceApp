@extends('layouts.app')

@section('content')
<div class="container text-light">
    <div class="row">
        <div class='col-lg-12'>
            <h1>Create Transaction</h1>
        </div>
    </div>

    <form method="POST">
        @csrf
        
        <div class="row">
            <div class="col-lg-3">

                <!-- Amount -->
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
                    <input required class="form-control" name="amount" type="number" step="0.01" />
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>

                <!-- Date -->
                <div class="form-group">
                    <label>Date of Transaction</label>
                    <input class="form-control" name="datetime" type="date" value="{{ today()->format('Y-m-d') }}" />
                </div>

                <!-- Source -->
                <div class="form-group">
                    <label>Source</label>
                    <select class="form-control" name="source">
                        @foreach($sources as $source)
                            <option value="{{ $source->id }}">{{ ucfirst($source->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tags -->
                <div class="form-group">
                    <label>Tag</label>
                    <select class="form-control" name="tag">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ ucfirst($tag->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-success mt-2">Create</button>
            </div>
        </div>
    </form>
</div>
@endsection