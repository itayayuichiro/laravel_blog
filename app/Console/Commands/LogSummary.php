<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Logs;

class LogSummary extends Command
{
    use WriteLog;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:summary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '日にち毎の集計を行うコマンド';

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

        $this->write("LogSummary Start", NULL);
        try {
            $file = fopen('./storage/logs/laravel-' . date("Y-m-d") . '.log', "r");
            $logs = array();
            if ($file) {
                while ($line = fgets($file)) {
                    if (preg_match('/Access Log/', $line)) {

                        $json = preg_replace('/ GET | POST | PUT | PATCH | DELETE /', '', explode('local.DEBUG:', $line)[1]);
                        $arr = json_decode($json, true);
                        $is_exist = false;
                        foreach ($logs as &$log) {
                            if (in_array($arr['path'], $log)) {
                                $is_exist = true;
                                $log['cnt'] = $log['cnt'] + 1;
                                $log['time'] = ($log['time'] * $log['cnt'] + $arr['time']) / $log['cnt'];
                            }
                        }
                        if (!$is_exist) {
                            $hash = array();
                            $hash['path'] = $arr['path'];
                            $hash['cnt'] = 1;
                            $hash['time'] = $arr['time'];
                            $hash['status_code'] = $arr['status_code'];
                            $hash['summary_date'] = date("Y-m-d");
                            array_push($logs, $hash);
                        }
                    }
                }
            }

            foreach ($logs as &$log) {
                $flight = Logs::create(['path' => $log['path'], 'status_code' => $log['status_code'], 'time' => $log['time'], 'cnt' => $log['cnt'], 'summary_date' => $log['summary_date']]);
            }
            fclose($file);
            $this->write("LogSummary End", "success");
        } catch (\Exception $e) {
            $this->write("LogSummary Error", $e->getTraceAsString());
        }

    }
}
