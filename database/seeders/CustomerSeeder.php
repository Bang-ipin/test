<?php

namespace Database\Seeders;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name'          => 'Ervin',
            'address'       => 'Yogyakarta',
            'phone'         => '123456789',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Santoso',
            'address'       => 'Bantul',
            'phone'         => '11111111',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Hasan',
            'address'       => 'Sleman',
            'phone'         => '08767544554',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Lina',
            'address'       => 'Ngawi',
            'phone'         => '565454434345',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Nina',
            'address'       => 'Pacitan',
            'phone'         => '1231231111123',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Adam',
            'address'       => 'Surabaya',
            'phone'         => '867865644',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Adam Jauhari',
            'address'       => 'Lampung',
            'phone'         => '121312123123',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Yusuf',
            'address'       => 'Medan',
            'phone'         => '02719978776',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Surya',
            'address'       => 'Malang',
            'phone'         => '7854643453',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Galang',
            'address'       => 'Gunung Kidul',
            'phone'         => '123123123',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Ima',
            'address'       => 'Bantul',
            'phone'         => '989789797',
            'created_at'    => Carbon::now()
        ]);
        DB::table('customers')->insert([
            'name'          => 'Nimas',
            'address'       => 'Kulonprogo',
            'phone'         => '989897878',
            'created_at'    => Carbon::now()
        ]);
    }
}
