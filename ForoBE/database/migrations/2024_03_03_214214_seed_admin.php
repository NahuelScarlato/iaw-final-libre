<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Database\Seeders\AdminSeeder;

return new class  extends Migration {
    public function up() {
        Artisan::call('db:seed', [
            '--class' => AdminSeeder::class,
        ]);
    }
};
