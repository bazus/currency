<?php

namespace App\Console\Commands;

use App\Models\Rate;
use Carbon\{CarbonPeriod, Carbon};
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class GetRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get rates from bank.gov.ua';

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
        Rate::getRates(true);

        return 0;
    }
}
