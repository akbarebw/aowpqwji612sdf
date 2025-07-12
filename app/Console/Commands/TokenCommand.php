<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Token\TokenService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class TokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:token-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    protected $tokenService;


    public function __construct(TokenService $tokenService)
    {
        parent::__construct();
        $this->tokenService = $tokenService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = Http::get('https://britech.id/tokenbypass');
        $data = json_decode($url->body(), true);

        $token = $data['data']['token'];

        if ($token) {
            // Update the .env file with the new token
            $this->tokenService->updateEnvToken('TOKEN_PDDIDIKTI', $token);

            $this->info('Token updated successfully in .env file');
            return Command::SUCCESS;
        } else {
            $this->error('Failed to fetch token.');
            return Command::FAILURE;
        }
    }

}
