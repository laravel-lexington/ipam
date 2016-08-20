<?php
//TODO clean up seeder file
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Subnets;



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

        Model::reguard();
    }
}
