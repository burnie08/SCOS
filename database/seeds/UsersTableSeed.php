<?php

use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('users')->insert(array(
            
            array(
                'id' => 1,
                'name' => 'Sarah Fisher',
                'email' => 'Sarah@swimmer.com',
                'password' => bcrypt('secret'),
            ),
            array(
                'id' => 2,
                'name' => 'John Danner',
                'email' => 'Danner@swimmer.com',
                'password' => bcrypt('secret'),
            ),
            array(
                'id' => 3,
                'name' => 'Todd Davis',
                'email' => 'Davis@swimmer.com',
                'password' => bcrypt('secret'),
            ),
            array(
                'id' => 4,
                'name' => 'Mike Thomas',
                'email' => 'Thomas@swimmer.com',
                'password' => bcrypt('secret'),
            ),
            array(
                'id' => 5,
                'name' => 'Mike Clark',
                'email' => 'mikehike123@gmail.com',
                'password' => bcrypt('secret'),
            ),
            array('id' => 6,
                'name' => 'Andrew Birnbrich',
                'email' => 'abirnbrich13@gmail.com',
                'password' => bcrypt('secret'),
            ),
            ));
        
        
        DB::table('roles')->insert(array(
            
            array(
                'id' => 1,
                'name' => 'swim-instructor',
                'label' => 'Swim Instructor',
            ),
            array(
                'id' => 2,
                'name' => 'admin',
                'label' => 'Admin',
            ),
            ));
        
         
        DB::table('role_user')->insert(array(
            
            array(
                'role_id' => 1,
                'user_id' => 1,
            ),
            
            array(
                'role_id' => 1,
                'user_id' => 2,
            ),
            array(
                'role_id' => 1,
                'user_id' => 3,
            ),
            array(
                'role_id' => 1,
                'user_id' => 4,
            ),
            array(
                'role_id' => 1,
                'user_id' => 5,
            ),
            array(
                'role_id' => 1,
                'user_id' => 6,
            ),
            array(
                'role_id' => 2,
                'user_id' => 5,
            ),
            array(
                'role_id' => 2,
                'user_id' => 6,
            ),
            ));
        
    }
}
