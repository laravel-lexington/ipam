<?php
//TODO clean up seeder file
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Users;
use App\Sessions;
use App\Payments;
use App\PaymentMethods;
use App\PageViews;
use App\Orders;
use App\Items;
use App\Downloads;


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

        Users::truncate();
        factory(Users::class, 50)->create();

        Sessions::truncate();
        factory(Sessions::class, 50)->create();

        Payments::truncate();
        factory(Payments::class, 50)->create();

        PaymentMethods::truncate();
        factory(PaymentMethods::class, 50)->create();

        PageViews::truncate();
        factory(PageViews::class, 50)->create();

        Orders::truncate();
        factory(Orders::class, 50)->create();

        Items::truncate();
        factory(Items::class, 50)->create();

        Downloads::truncate();
        factory(Downloads::class, 50)->create();

        Model::reguard();
    }
}
