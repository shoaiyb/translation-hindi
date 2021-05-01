<?php

global $Wcms;

$Wcms->addListener('settings', function ($args) {
    $translations = array_map('str_getcsv', file(__DIR__ . '/sl.csv')); // change accordingly to country locale

    foreach ($translations as $replacement) {
        if (count($replacement) !== 2) {
            continue;
        }

        $args[0] = preg_replace("/{$replacement[0]}/", $replacement[1], $args[0]);
    }

    return $args;
});
