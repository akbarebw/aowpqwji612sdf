<?php

namespace App\Services\Token;

use Illuminate\Support\Facades\File;

class TokenService
{
    public function updateEnvToken(string $key, string $value): void
    {
        $path = base_path('.env');

        if (File::exists($path)) {
            $escapedValue = str_replace(['"', "'"], '', $value);

            $envContent = File::get($path);

            if (preg_match("/^{$key}=.*/m", $envContent)) {
                $envContent = preg_replace(
                    "/^{$key}=.*/m",
                    "{$key}={$escapedValue}",
                    $envContent
                );
            } else {
                $envContent .= "\n{$key}={$escapedValue}";
            }

            File::put($path, $envContent);
        }
    }
}
