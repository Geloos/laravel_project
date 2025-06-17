<?php

namespace App\Pipelines\Order;

class ApplyDiscount{

    public function handle(array $order, \Closure $next){

       echo 'Applying Discount <br />';

       $order['total'] -= $order['discount'] ?? 0;

       return $next($order);
    }

}