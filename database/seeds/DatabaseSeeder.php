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

        User::truncate();
        factory(User::class, 50)->create();

        Subnets::truncate();
        factory(Subnets::class, 50)->create();

        Printers::truncate();
        factory(Printers::class, 50)->create();

        Computers::truncate();
        factory(Computers::class, 150)->create();

        Placeholders::truncate();
        factory(Placeholders::class, 30)->create();

        Model::reguard();
    }
}
