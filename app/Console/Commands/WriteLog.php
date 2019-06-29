<?php

namespace App\Console\Commands;

trait WriteLog
{
    public static function write($command, $result)
    {
        if (empty($result)) {
            \Log::INFO("", ["type" => "Schedule Log", "command" => $command, "time" => date("Y/m/d H:i:s")]);
        } else {
            if (preg_match('/Error/', $command)) {
                \Log::ERROR("", ["type" => "Schedule Log", "command" => $command, "time" => date("Y/m/d H:i:s"), "result" => $result]);
            } else {
                \Log::INFO("", ["type" => "Schedule Log", "command" => $command, "time" => date("Y/m/d H:i:s"), "result" => $result]);
            }
        }
    }

    public static function reponseErrorJSON($message, $code)
    {
        return response(['result' => 'error', 'message' => $message], $code);
    }
}