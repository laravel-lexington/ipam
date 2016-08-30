<?php
//TODO clean up seeder file
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Subnets;
use App\Computers;
use App\Printers;
use App\Placeholders;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Model::unguard();

        App\Models\Database\User::truncate();
        factory(App\Models\Database\User::class, 50)->create();

        App\Models\Database\Subnets::truncate();
        factory(App\Models\Database\Subnets::class, 50)->create();

        App\Models\Database\Printers::truncate();
        factory(App\Models\Database\Printers::class, 50)->create();

        App\Models\Database\Computers::truncate();
        factory(App\Models\Database\Computers::class, 150)->create();

        App\Models\Database\Placeholders::truncate();
        factory(App\Models\Database\Placeholders::class, 30)->create();

        Model::reguard();
    }
}
