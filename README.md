# flog
easy way to Customizing laravel log.
you can log with custom name, custom format and custom time. 

# Usage

Add package to your project

```
composer require farzinft/flog:"dev-master"
```
add service provider:
```
Flog\FlogServiceProvider::class
```
then publish config file

```
php artisan vendor:publish --provider='Flog\FlogServiceProvider'
```

now in flog.php config file you can customize laravel logger and when 

you attempt to use log such as Log::info() the logger work as you expect parameters in flog.php configuration file.

```

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
     * set jalali Date //for persian date
     */
    'jalali_date' => false
];
```
