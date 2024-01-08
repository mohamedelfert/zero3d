<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
//        $this->call(SettingsTableSeeder::class);

//        Category::factory(10)->create();
//        Store::factory(5)->create();
//        Product::factory(100)->create();
    }
}
