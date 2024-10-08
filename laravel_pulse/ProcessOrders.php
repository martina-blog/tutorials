<?php

// app/Console/Commands/ProcessOrders.php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProcessOrders extends Command
{
    protected $signature = 'process:orders';

    public function handle()
    {
        // Your command logic here

        // Record a custom metric for processed orders
        pulse()->increment('processed_orders');
    }
}