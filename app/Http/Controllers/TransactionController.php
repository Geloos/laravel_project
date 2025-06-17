<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\TransactionService;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

readonly class TransactionController 
{
    private int $user_id;

    public function __construct(readonly TransactionService $transactionService)
    {
        $this->user_id = $this->getUserId();
    }

    private function getUserId(): int
    {
        return((int)session('loginId'));
    }

    public function index()
    {
        $transactions = $this->transactionService->getAll($this->user_id);
        
        $income = $this->transactionService->getTotalIncome($this->user_id);
        $expense = $this->transactionService->getTotalExpense($this->user_id);

        return view('transactions', [
            'totalIncome' => $income,
            'totalExpense' => $expense,
            'netSavings' => $income - $expense,
            'goal' => 10000,
            'transactions' => $transactions
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function edit(int $transactionId)
    {
        $transaction = $this->transactionService->find($transactionId, $this->user_id);
        
        return view('edit', [
            'transactionId' => $transactionId,
            'date' => $transaction->transaction_date,
            'amount' => $transaction->amount,
            'description' => $transaction->description
        ]);
    }

    public function update(int $transactionId, Request $request)
    {
        $amount = $request->get('amount');
        $date = Carbon::parse($request->get('date'));
        $description = $request->get('description') ?? 'No description';

        $this->transactionService->update($transactionId,$amount,$date,$description,$this->user_id);

        return redirect(route('transactions.index'));
    }

    public function store(Request $request): RedirectResponse
    {

        $amount = $request->get('amount');
        $date = Carbon::parse($request->get('date'));
        $description = $request->get('description') ?? 'No description';

        $this->transactionService->create($amount,$date,$description,$this->user_id);

        return redirect(route('transactions.index'));
    }

    public function destroy(int $transactionId): RedirectResponse
    {
        $this->transactionService->delete($transactionId, $this->user_id);
        return redirect(route('transactions.index'));
    }
}