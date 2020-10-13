<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pockets:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete unconfirmed pockets';

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
     * @return mixed
     */
    public function handle()
    {
        $pockets = DB::table('pockets')->where('confirm','no');

        $pockets->where('created_at', '<=', Carbon::now()->subDay())->delete();
    }
}
