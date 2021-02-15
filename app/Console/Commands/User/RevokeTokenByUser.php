<?php

namespace App\Console\Commands\User;

use App\Contracts\AccessTokenContract;
use App\Contracts\UserContract;
use Illuminate\Console\Command;

class RevokeTokenByUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user-token:revoke {userEmail}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revoke all tokens for user by user email';

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
     * @param  UserContract         $userService
     *
     * @param  AccessTokenContract  $accessTokenService
     *
     * @return int
     */
    public function handle(UserContract $userService, AccessTokenContract $accessTokenService)
    {
        $user = $userService->findByEmail($this->argument('userEmail'));
        if(!$user) {
            $this->alert('User not found.');
        }
        $accessTokenService->revoke($user);
        $this->info('Revoked!');
        return 0;
    }
}
