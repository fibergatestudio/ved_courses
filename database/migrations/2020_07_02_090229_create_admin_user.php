<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\User;

class CreateAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $demo_values = [
            [
                'name' => 'admin',
                'email'=> 'admin@mail.com',
                'password' => Hash::make('qwerty'),
                'role' => 'admin',
                'status' => 'confirmed'
            ]
        ];

        User::insert($demo_values);
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('name', '=', 'admin')->delete();
    }
}
