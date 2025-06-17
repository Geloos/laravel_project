<?php

namespace App\Pipelines\Order;

class GenerateInvoice{

    public function handle(array $order, \Closure $next){

        echo 'Generating Invoice <br />';
        
        $order['invoice_id'] = rand(420,1312);

        return $next($order);

    }

}