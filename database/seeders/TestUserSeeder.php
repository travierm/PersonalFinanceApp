<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use App\Models\UserTransactionTag;
use App\Models\UserTransactionSource;
use Illuminate\Database\Seeder;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => Hash::make('test'),
        ]);

        $userId = $user->id;

        $this->createTag($userId, 'paycheck');
        $this->createTag($userId, 'groceries');
        $this->createTag($userId, 'fast food');
        $this->createTag($userId, 'electronics');

        $this->createSource($userId, 'employer');
        $this->createSource($userId, 'meijer');
        $this->createSource($userId, 'taco bell');
        $this->createSource($userId, 'best buy');

    }

    private function createTag($userId, $name)
    {
        UserTransactionTag::create([
            'user_id' => $userId,
            'name' => $name
        ]);
    }

    private function createSource($userId, $name)
    {
        UserTransactionSource::create([
            'user_id' => $userId,
            'name' => $name
        ]);
    }
}
