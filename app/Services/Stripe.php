<?php

namespace App\Services;

use App\Contracts\PaymentProcessor;

readonly class Stripe implements PaymentProcessor{

    public function __construct(array $config){
        
    }

    public function process(array $transaction):void{
        
        echo ('processing Stripe Payment ' . $transaction['transactionId'] . '<br/>');
    
    }
}
