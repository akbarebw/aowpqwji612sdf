<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class ValidDriveLink implements Rule
{

    function isGoogleDriveLinkValid($url) {
        // Initialize a cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Set a timeout

        // Execute the cURL session
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
            curl_close($ch);
            return false;
        }

        // Get the HTTP response code
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close the cURL session
        curl_close($ch);

        // Check if the HTTP response code is 200 (OK)
        if ($httpCode == 200) {
            return true;
        } else {
            return false;
        }
    }
    public function passes($attribute, $value)
    {
        // Define the pattern for Google Drive links
        $pattern = '/^(https:\/\/)?(drive\.google\.com\/file\/d\/|drive\.google\.com\/open\?id=|drive\.google\.com\/drive\/folders\/)/';

        // Check if the value matches the pattern
        if(preg_match($pattern, $value)){
            if($this->isGoogleDriveLinkValid($value)){
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute harus menggunakan link Google Drive yang valid dan tidak private.';
    }
}
