<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class ImportTranslationsFromCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translations:import {lang} {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports translations from CSV file';

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
        $file = base_path($this->argument('file'));
        $destPath = resource_path('lang/' . $this->argument('lang') . '/');
        $line = 0;

        if(!file_exists($destPath)){
            mkdir($destPath, 0777, true);
            $this->line("Destination path created");
        }

        collect(explode("\r\n", file_get_contents($file)))->map(function ($item) use (&$line) {
            try {
                list($key, $message) = str_getcsv($item);
                $line++;
            } catch (\Exception $e) {
                $this->error("Invalid CSV on line ". $line);
                throw $e;
            }

            $keyParts = explode(".", $key);

            return [
                'file' => $keyParts[0].".php",
                'key' => implode(".", array_slice($keyParts, 1)),
                'message' => $message,
            ];
        })->groupBy('file')->map(function(Collection $item) {
            return $item->pluck("message", "key");
        })->each(function(Collection $values, $file) use ($destPath) {
            $newValues = array();
            foreach ($values as $key => $value) {
                if(!empty($value)) {
                    array_set($newValues, $key, $value);
                }
            }

            $destFile = $destPath.$file;
            $bytes = file_put_contents($destFile, "<?php ".PHP_EOL.PHP_EOL."return ".var_export($newValues, true).";".PHP_EOL);
            $this->line($bytes." bytes written to ".$destFile);
        });
    }
}
