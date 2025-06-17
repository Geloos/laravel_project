<?php

namespace App\Pipelines\Order;

class ValidateOrder{

    public function handle(array $order, \Closure $next){

        echo 'Validating Order <br />';
        
        return $next($order);

    }

}