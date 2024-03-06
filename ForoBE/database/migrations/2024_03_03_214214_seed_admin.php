<?php

use Database\Seeders\CommentsSeeder;
use Database\Seeders\ThreadsSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Database\Seeders\UsersSeeder;

return new class  extends Migration {
    public function up() {
        Artisan::call('db:seed', [
            '--class' => UsersSeeder::class,
        ]);

        Artisan::call('db:seed', [
            '--class' => CommentsSeeder::class,
        ]);

        Artisan::call('db:seed', [
            '--class' => ThreadsSeeder::class,
        ]);
    }
};
