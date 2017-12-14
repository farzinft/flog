<?php

namespace Flog;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Morilog\Jalali\JalaliServiceProvider;

class FlogServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/flog.php' => config_path('flog.php'),
        ]);

        if (config('jalali_date')) {
            $this->app->register(JalaliServiceProvider::class);
        }
    }

    public function register()
    {
        $this->configureMonolog();
    }

    protected function configureMonolog()
    {
        $this->app->configureMonologUsing(function ($monolog) {

            $logPath = config('flog.log_path');

            $logStreamHandler = new StreamHandler($logPath);

            $logFormat = config('flog.log_format');

            $formatter = new LineFormatter($logFormat);

            $logStreamHandler->setFormatter($formatter);

            $dailyHandler = new RotatingFileHandler($logPath, config('flog.max_files'));

            $dailyHandler->setFormatter($formatter);

            $monolog->pushHandler($logStreamHandler);

            $monolog->pushHandler($dailyHandler);

            $monolog->pushProcessor(function ($record) {
                $record['datetime'] = Carbon::now()->format('Y/m/d H:i:s');
                if (config('flog.jalali_date')) {
                    $record['datetime'] = Carbon::now()->format('Y/m/d H:i:s') . ' | ' . jdate()->format('Y/m/d H:i:s');
                }
                return $record;
            });
        });
    }
}