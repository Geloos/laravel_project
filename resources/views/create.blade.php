@extends('layout')

@section('title', 'Add New Transaction')

@section('content')
<div class="transaction-form-container">
    <h1>Add New Transaction</h1>
    
    <form method="POST" action="{{ route('transactions.store') }}" class="transaction-form">
        @csrf
        
        <div class="form-group">
            <label for="transaction_date">Transaction Date</label>
            <input type="datetime-local" id="transaction_date" name="transaction_date" 
                   class="form-control" required>
            <small class="hint">mm/dd/yyyy --:-- --</small>
        </div>
        
        <div class="form-group">
            <label for="amount">Transaction Amount</label>
            <input type="number" step="0.01" id="amount" name="amount" 
                   class="form-control" placeholder="e.g. -50.00 or 100.00" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" 
                      rows="3" placeholder="Optional details about the transaction..."></textarea>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('transactions.index') }}" class="btn cancel-btn">Cancel</a>
            <button type="submit" class="btn save-btn">Save Transaction</button>
        </div>
    </form>
</div>

<style>
    .transaction-form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .transaction-form {
        margin-top: 1.5rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #333;
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
    }
    
    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }
    
    .hint {
        display: block;
        margin-top: 0.25rem;
        color: #666;
        font-size: 0.85rem;
    }
    
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    
    .cancel-btn {
        background-color: #f0f0f0;
        color: #333;
        text-decoration: none;
    }
    
    .cancel-btn:hover {
        background-color: #e0e0e0;
    }
    
    .save-btn {
        background-color: #4CAF50;
        color: white;
    }
    
    .save-btn:hover {
        background-color: #3e8e41;
    }
</style>
@endsection