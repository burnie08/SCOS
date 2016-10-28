<?php

class sCOSTableSeeder extends Seeder {
    public function run()
    {
        
        DB::table('skill_cards')->insert(array(
            
            array(
                'id' => 1,
                'name' => 'Backfloat skill Card',
                'created_at' => '2016-10-28 02:39:10',
                'updated_at' => '2016-10-28 02:39:10',
            )

        ));
        DB::table('skills')->insert(array(
            
            array(
                'id' => 1,
                'skill_card_id' => 1,
                'name' => 'First skill',
                'created_at' => '2016-10-28 02:39:22',
                'updated_at' => '2016-10-28 02:39:22',
            )

        ));
    }
}