<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportTranslationsToCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translations:export {lang?} {fallback?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Takes all translations and exports them as CSV';

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
     * @return void
     */
    public function handle()
    {
        $language = $this->argument("lang") ?? 'en';
        $fallback = $this->argument("fallback") ?? "en";

        $messages = $this->getMessagesFromPath(resource_path('lang/' . $language . '/'));

        if ($language != $fallback) {
            $fallbackMessages = $this->getMessagesFromPath(resource_path('lang/' . $fallback . '/'));
            $messages = array_merge($messages, array_diff_key($fallbackMessages, $messages));
        }

        foreach ($messages as $key => $message) {
            if (!is_string($message)) {
                continue;
            }
            $out = fopen('php://output', 'w');
            fputcsv($out, [$key, $message, ($fallbackMessages[$key] ?? false) == $message ? 0 : 1]);
            fclose($out);
        }
    }

    /**
     * Returns all translation messages from a given path
     *
     * @param $path
     * @return array
     */
    public function getMessagesFromPath($path)
    {
        $messages = [];

        foreach (scandir($path) as $file) {
            if (substr($file, -4) != '.php') {
                continue;
            }

            $messages[substr($file, 0, -4)] = require($path . $file);
        }

        return array_dot($messages);
    }
}
