<?php

return [


    /**
     * Log Path
     */
    'log_path' => storage_path('logs/' . kebab_case(config('app.name')) . '.log'),


    /**
     * Log Format
     */
    'log_format' => "--START--" . PHP_EOL .
        "DATE: %datetime%" . PHP_EOL .
        "LEVEL: [%level_name%]" . PHP_EOL .
        "CHANNEL: (%channel%):" . PHP_EOL .
        "MESSAGE: %message%" . PHP_EOL .
        "CONTEXT: %context%" . PHP_EOL .
        "--END--" . PHP_EOL .
        "\n",


    /**
     * Daily Log Max Files
     */
    'max_files' => 5,


    /**
     * set jalali Date
     */
    'jalali_date' => false
];