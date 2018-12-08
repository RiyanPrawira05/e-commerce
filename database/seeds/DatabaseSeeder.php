<?php

use Illuminate\Database\Seeder;
use App\Jabatan;
use App\User;
use App\Jenis;
use App\Category;
use App\Size;
use App\Warna;
use App\Lingkardada;
use App\Via;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(Jabatan::class,1)->create();
        factory(User::class,1)->create();
        factory(Jenis::class,1)->create();
        factory(Category::class,1)->create();
        factory(Size::class,1)->create();
        factory(Warna::class,1)->create();
        factory(Lingkardada::class,1)->create();
        factory(Via::class,1)->create();
    }
}
