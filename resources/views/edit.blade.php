@extends('layout')

@section('content')
<div class="edit-transaction-container">
    <h1>Edit Transaction</h1>

    <form action="{{ route('transactions.update', $transactionId) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="transaction_date">Transaction Date</label>
            <input type="datetime-local" 
                id="transaction_date" 
                name="transaction_date" 
                value="{{ old('transaction_date', \Carbon\Carbon::parse($date)->format('Y-m-d\TH:i')) }}"
                class="form-control"
                required>
        </div>

        <div class="form-group">
            <label for="amount">Transaction Amount</label>
            <input type="number" 
                   id="amount" 
                   name="amount" 
                   step="0.01" 
                   value="{{ old('amount', $amount) }}"
                   class="form-control"
                   required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" 
                      name="description" 
                      class="form-control"
                      rows="3">{{ old('description', $description) }}</textarea>
        </div>

        <div class="form-actions">
            <a href="{{ route('transactions.index') }}" class="btn btn-cancel">Cancel</a>
            <button type="submit" class="btn btn-save">Save Transaction</button>
        </div>
    </form>
</div>

<style>
    .edit-transaction-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
        color: #2c3e50;
        margin-bottom: 30px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 25px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #2c3e50;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }

    textarea.form-control {
        min-height: 100px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-cancel {
        background-color: #f8f9fa;
        color: #2c3e50;
        border: 1px solid #ddd;
    }

    .btn-cancel:hover {
        background-color: #e9ecef;
    }

    .btn-save {
        background-color: #2c3e50;
        color: white;
        border: none;
    }

    .btn-save:hover {
        background-color: #1a252f;
    }
</style>
@endsection