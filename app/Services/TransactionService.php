<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\DatabaseManager;



readonly class TransactionService{
    public function __construct(public DatabaseManager $db)
    {
        
    }

    public function find(int $id, int $userId): ?\stdClass
    {
        return $this->db->selectOne(
            'SELECT * FROM transactions WHERE id = ? AND user_id = ?',
            [$id, $userId]
        );
    }


    public function create(float $amount, Carbon $date, string $description,int $userId){
        
       return $this->db->insert(
            'INSERT INTO transactions(amount,user_id,transaction_date,description) values(?,?,?,?)',
            [$amount,$userId,$date,$description]
        );

    }

    public function getAll($user_id) :array{
        
        return $this->db->select('SELECT id,amount,transaction_date,description FROM transactions 
        WHERE user_id = ?
        ORDER BY transaction_date DESC,created_at DESC',
        [$user_id]
        );
    }

    public function update(int $id, float $amount, Carbon $date, string $description, int $userId): int
    {
        return $this->db->update(
            'UPDATE transactions 
            SET amount = :amount, transaction_date = :date, description = :description, updated_at = datetime("now") 
            WHERE id = :id AND user_id = :user_id',
            [
                'id' => $id,
                'amount' => $amount,
                'date' => $date,
                'description' => $description,
                'user_id' => $userId,
            ]
        );
    }


    public function delete(int $id, int $userId): int
    {
        return $this->db->delete(
            'DELETE FROM transactions WHERE id = ? AND user_id = ?',
            [$id, $userId]
        );
    }


    public function getTotalIncome(int $userId): float
    {
        return (float) $this->db->scalar(
            'SELECT SUM(amount) FROM transactions WHERE amount > 0 AND user_id = ?',
            [$userId]
        );
    }

    public function getTotalExpense(int $userId): float
    {
        return (float) $this->db->scalar(
            'SELECT ABS(SUM(amount)) FROM transactions WHERE amount < 0 AND user_id = ?',
            [$userId]
        );
    }


}


