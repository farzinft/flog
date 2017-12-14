<?php

return [


    /**
     * Log Path
     */
    'log_path' => storage_path('logs/' . kebab_case(config('app.name')) . '.log'),


    /**
     * Log Format
     */
    'log_format' => "%datetime% [%level_name%] (%channel%): %message% %context%\n",


    /**
     * Daily Log Max Files
     */
    'max_files' => 5,


    /**
     * set jalali Date
     */
    'jalali_date' => false
];