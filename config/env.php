<?php

function env($key, $default = null) {
    static $variables = null;

    if ($variables === null) {
        $variables = [];
        $envFile = __DIR__ . '/../.env';

        if (!file_exists($envFile)) {
            return $default;
        }

        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;

            list($name, $value) = array_map('trim', explode('=', $line, 2));
            $variables[$name] = $value;
        }
    }

    return $variables[$key] ?? $default;
}
