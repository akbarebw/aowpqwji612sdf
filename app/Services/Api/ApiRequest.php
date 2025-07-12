<?php

namespace App\Services\Api;

use GuzzleHttp\Client;
use App\Services\Token\TokenService;
use App\Console\Commands\TokenCommand;

class ApiRequest
{
    protected $client;
    protected $baseUri;
    protected $token;
    protected $tokenService;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUri = 'http://103.190.110.11:8100/ws/live2.php';
        $this->token = env('TOKEN_PDDIDIKTI');
        $this->tokenService = new TokenService();
    }

    public function sendRequest(
        string $act,
        array $additionalParams = [],
        string $method = 'POST',
        array $headers = []
    ): ?array {

        $defaultHeaders = [
            'Content-Type' => 'application/json',
        ];

        $headers = array_merge($defaultHeaders, $headers);

        $makeRequest = function () use ($act, $additionalParams, $headers, $method) {
            $body = json_encode(array_merge([
                'act' => $act,
                'token' => $this->token,
                'filter' => "",
                'order' => '',
                'limit' => '',
                'offset' => '',
            ], $additionalParams));

            $response = $this->client->request($method, $this->baseUri, [
                'headers' => $headers,
                'body' => $body,
            ]);

            return json_decode($response->getBody(), true);
        };

        try {
            $result = $makeRequest();

            // Jika token expired
            if (isset($result['error_code']) && $result['error_code'] == 100) {
                $newToken = $this->refreshToken();

                if ($newToken) {
                    $this->token = $newToken;
                    $result = $makeRequest();
                    // update Token
                    $this->tokenService->updateEnvToken('TOKEN_PDDIDIKTI', $newToken);
                }
            }

            return $result;

        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }

    protected function refreshToken(): ?string
    {
        try {
            $response = $this->client->request('GET', 'https://britech.id/tokenbypass');

            $data = json_decode($response->getBody(), true);

            if (isset($data['data']['token'])) {
                return $data['data']['token'];
            }

        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kembalikan null
            return null;
        }

        return null;
    }

}
