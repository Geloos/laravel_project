@extends('layout')

@section('content')
<div class="transactions-container">
    <h1>Transactions</h1>

    <div class="summary-cards">
        <div class="summary-card income">
            <h3>Total Income</h3>
            <p>${{ number_format($totalIncome, 2) }}</p>
        </div>

        <div class="summary-card expense">
            <h3>Total Expense</h3>
            <p>${{ number_format($totalExpense, 2) }}</p>
        </div>

        <div class="summary-card savings">
            <h3>Net Savings</h3>
            <p>${{ number_format($netSavings, 2) }}</p>
        </div>

        <div class="summary-card goal">
            <h3>Goal</h3>
            <p>${{ number_format($goal, 2) }}</p>
        </div>
    </div>

    <div class="divider"></div>

    <div class="create-transaction">
        <h2>Create Transaction</h2>
        <a href="{{ route('transactions.create') }}" class="create-btn">+ New Transaction</a>
    </div>

    <div class="divider"></div>

    <div class="transactions-list-section">
        <h2>Transaction History</h2>

        @if($transactions && count($transactions) > 0)
        <div class="transactions-table">
            <div class="table-header">
                <div class="date-header">DATE</div>
                <div class="amount-header">AMOUNT</div>
                <div class="description-header">DESCRIPTION</div>
                <div class="actions-header">ACTIONS</div>
            </div>

            @foreach($transactions as $transaction)
            <div class="table-row">
                {{-- Date Cell - Safe Handling --}}
                <div class="date-cell">
                    @isset($transaction->transaction_date)
                    {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('m/d/Y h:i A') }}
                    @else
                    No date
                    @endisset
                </div>

                {{-- Amount Cell - Safe Handling --}}
                <div class="amount-cell @if(($transaction->amount ?? 0) >= 0) positive-amount @else negative-amount @endif">
                    ${{ number_format(abs($transaction->amount ?? 0), 2) }}
                </div>

                {{-- Description Cell - Safe Handling --}}
                <div class="description-cell">
                    {{ $transaction->description ?? 'No description' }}
                </div>

                {{-- Actions Cell - Safe Handling --}}
                <div class="actions-cell">
                    @isset($transaction->id)
                    <a href="{{ route('transactions.edit', $transaction->id) }}" class="edit-button">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" onclick="return confirm('Delete this transaction?')">
                            Delete
                        </button>
                    </form>
                    @else
                    <span class="text-muted">No actions</span>
                    @endisset
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="no-transactions">
            No transactions found. Create your first transaction!
        </div>
        @endif
    </div>
</div>

<style>
    .transactions-list-section {
        margin-top: 40px;
    }

    .transactions-list-section h2 {
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 1.8rem;
    }

    .transactions-table {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table-header {
        display: grid;
        grid-template-columns: 2fr 1fr 2fr 1fr;
        background-color: #f8f9fa;
        font-weight: bold;
        padding: 15px 20px;
        border-bottom: 1px solid #ecf0f1;
    }

    .table-row {
        display: grid;
        grid-template-columns: 2fr 1fr 2fr 1fr;
        padding: 15px 20px;
        border-bottom: 1px solid #ecf0f1;
        align-items: center;
    }

    .table-row:last-child {
        border-bottom: none;
    }

    .table-row:hover {
        background-color: #f8f9fa;
    }

    .positive-amount {
        color: #27ae60;
        font-weight: bold;
    }

    .negative-amount {
        color: #e74c3c;
        font-weight: bold;
    }

    .actions-cell {
        display: flex;
        gap: 10px;
    }

    .edit-button {
        padding: 6px 12px;
        background-color: #3498db;
        color: white;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background-color 0.2s;
    }

    .edit-button:hover {
        background-color: #2980b9;
    }

    .delete-button {
        padding: 6px 12px;
        background-color: #e74c3c;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background-color 0.2s;
    }

    .delete-button:hover {
        background-color: #c0392b;
    }

    .delete-form {
        margin: 0;
    }

    .no-transactions {
        text-align: center;
        padding: 30px;
        color: #7f8c8d;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection