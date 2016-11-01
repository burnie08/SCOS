<?php

class sCOSTableSeeder extends Seeder {
    public function run()
    {
        
        DB::table('proficiency_levels')->insert(array(
            
            array(
                'id' => 1,
                'name' => 'Not introduced',
                'short_name' => 'NI',
                'created_at' => '2016-10-27 19:56:58',
                'updated_at' => '2016-10-27 19:56:58',
            ),

            array(
                'id' => 3,
                'name' => 'Recently Introduced',
                'short_name' => 'RI',
                'created_at' => '2016-10-27 19:57:40',
                'updated_at' => '2016-10-27 19:57:40',
            ),

            array(
                'id' => 4,
                'name' => 'Progress',
                'short_name' => 'P',
                'created_at' => '2016-10-27 19:57:59',
                'updated_at' => '2016-10-27 19:57:59',
            ),

            array(
                'id' => 5,
                'name' => 'Achieved',
                'short_name' => 'A',
                'created_at' => '2016-10-27 19:58:17',
                'updated_at' => '2016-10-27 19:58:17',
            ),

            array(
                'id' => 6,
                'name' => 'Mastery',
                'short_name' => 'M',
                'created_at' => '2016-10-27 19:58:29',
                'updated_at' => '2016-10-27 19:58:29',
            ),

        ));
        DB::table('role_user')->insert(array(
            
            array(
                'role_id' => 1,
                'user_id' => 1,
            )

        ));
        DB::table('roles')->insert(array(
            
            array(
                'id' => 1,
                'name' => 'Admin',
                'label' => 'Admin',
                'created_at' => '2016-10-24 21:08:50',
                'updated_at' => '2016-10-24 21:08:50',
            )

        ));
        DB::table('swimmers')->insert(array(
            
            array(
                'id' => 1,
                'first_name' => 'Andrew',
                'last_name' => 'Birnbrich',
                'created_at' => '2016-10-27 19:09:12',
                'updated_at' => '2016-10-27 19:09:12',
            )

        ));
        DB::table('users')->insert(array(
            
            array(
                'id' => 1,
                'name' => 'Andrew',
                'email' => 'email@email.com',
                'password' => '$2y$10$Ryh/jppPe2SxeIqOFoC8/u4RVQjUbE21iEzSfitY/XGOaz20kPdSK',
                'remember_token' => NULL,
                'created_at' => '2016-10-24 21:09:29',
                'updated_at' => '2016-10-24 21:09:29',
            )

        ));
    }
}