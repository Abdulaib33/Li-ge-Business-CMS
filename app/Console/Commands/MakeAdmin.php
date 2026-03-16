<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    protected $signature = 'user:make-admin {email}';
    protected $description = 'Promote a user to admin by email';

    public function handle(): int
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if (! $user) {
            $this->error("User not found: {$email}");
            return self::FAILURE;
        }

        $user->is_admin = true;
        $user->save();

        $this->info("✅ {$email} is now an admin.");
        return self::SUCCESS;
    }
}
