<?php

namespace App\Providers;

use App\Services\Stripe;
use App\Contracts\PaymentProcessor;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PaymentProcessorProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(PaymentProcessor::class, function($app){
            return  $app->make(Stripe::class,['config'=> []]);
        });

        $this->app->alias(PaymentProcessor::class,'paymentProcessor');
    }

    public function provides(): array
    {
        return [PaymentProcessor::class,'paymentProcessor'];
    }

}
