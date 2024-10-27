<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\admin;
use App\Models\course;
use App\Models\opeside;
use App\Models\exam;
use App\Models\qustion;
use App\Models\degre;
use App\Models\comment;
use App\Models\file;
use App\Models\pay;
use App\Models\proplem;
use App\Models\setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(300)->create();
        admin::factory(10)->create();
        course::factory(200)->create();
        opeside::factory(200)->create();
        exam::factory(200)->create();
        qustion::factory(200)->create();
        degre::factory(200)->create();
        comment::factory(200)->create();
        file::factory(200)->create();
        pay::factory(200)->create();
        proplem::factory(200)->create();
        admin::create([
            'name' => "mohamed",
            'email' =>"mo@mo.mo",
            
            'password' => Hash::make("mo@mo.mo"),
        ]);
        setting::create([
            'phone' => "mohamed",
        ]);

    }
}
