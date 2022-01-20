<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\products;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product_id = session()->get('product_id');
        $duration = session()->get('product_add_duration');

        if (!empty($product_id)) {
            products::where('id', $product_id)->where('add_durations', '1')->update([
                'add_durations' => '0'
            ]);
        }
        // session()->flush('product_id');
        // session()->flush('product_add_duration');
    }
}
