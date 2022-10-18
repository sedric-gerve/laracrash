<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
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
      //  User::factory(5)->create();
      $user = User::factory()->create([
        'name' => 'merveille',
        'email' => 'merveille@gmail.com'
      ]);
        Listing::factory(6)->create([
          'user_id'=>$user->id
        ]);
       // Listing::create([
       //     'title'=>'laravel senior developper',
        //    'tags'=>'laravel, javascript',
          //  'company'=>'acme Corp',
        //    'location'=>'boston,MA',
        //    'email'=>'email1@gmail.com',
       //     'webside'=>'https://www.acme.com',
      //      'description'=> 'Lorem ipsum dolor, sit amet consectetur
       //      adipisicing elit. Maiores nesciunt, amet, accusantium 
        //     expedita sint reprehenderit officiis obcaecati earum
         //   impedit ducimus dolores possimus, veritatis ex deleniti.
       //       Quod excepturi voluptatum repudiandae atque'

      //  ]);
      //  Listing::create([
         //   'title'=>'full-stack engeneer ',
           // 'tags'=>'laravel,back-end,api ',
       //     'company'=>'Stark industry',
         //   'location'=>'new york',
          //  'email'=>'email2@gmail.com',
          //  'webside'=>'https://www.Starkindustry.com',
          //  'description'=> 'Lorem ipsum dolor, sit amet consectetur
          //   adipisicing elit. Maiores nesciunt, amet, accusantium 
          //   expedita sint reprehenderit officiis obcaecati earum
          //   impedit ducimus dolores possimus, veritatis ex deleniti.
          //    Quod excepturi voluptatum repudiandae atque'

      // ]);
    }
}
