<?php

namespace App\Console;
use App\Http\Controllers;
use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
    	$schedule->call(function(){
    		$fix_accounts = DB::table('fix_accounts')->get();

            foreach ($fix_accounts as $data) {
                DB::table('accounts')->insert([
                    'expense_type' => $data->expense_type,
            		'type'         => $data->type,
            		'account_name' => $data->account_name,
            		'amount'       => $data->amount,
            		'user_id'      => $data->user_id,
            		'date'         => date('Y-m') . '-' . date('d', strtotime($data->date)),
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s')
                ]);
            }
    	})->monthlyOn(1, '00:01');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
