<?php

use Faker\Generator as Faker;
use App\User;
use App\Jabatan;
use App\Jenis;
use App\Category;
use App\Size;
use App\Warna;
use App\Lingkardada;
use App\Via;

$factory->define(User::class, function (Faker $faker) {
    return [

    	'foto' => 'avatar/153902773.jpg',
        'name' => 'Rieska Dhealani',
        'email' => 'admin@gmail.com',
        'email_verified_at' => now(),
        'jabatan' => 1,
        'password' => bcrypt('123456'),
    ];
});

$factory->define(Jabatan::class, function (Faker $faker) {
    return [
        'name' => 'Administator',
        'slug_jabatan' => 'Admin',
    ];
});

$factory->define(Jenis::class, function (Faker $faker) {
    return [
        'bahan' => 'Denim',
        'deskripsi' => 'Kain model denim',
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category' => 'Womens',
        'deskripsi' => 'Kategori perempuan',
    ];
});

$factory->define(Size::class, function (Faker $faker) {
    return [
        'size' => 'S',
        'deskripsi' => 'Ukuran Small',
    ];
});

$factory->define(Warna::class, function (Faker $faker) {
    return [
        'warna' => 'Black',
    ];
});

$factory->define(Lingkardada::class, function (Faker $faker) {
    return [
        'ukuran' => '190cm',
    ];
});

$factory->define(Via::class, function (Faker $faker) {
    return [
        'via' => 'COD',
    ];
});

