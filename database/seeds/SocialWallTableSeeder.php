<?php

namespace Malacode\SocialStream;

use DB;
use Illuminate\Database\Seeder;

class SocialWallTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('social_walls')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'name'          => 'social_stream.social_wall.view',
                'readable_name' => 'View SocialWall',
            ],
            [
                'name'          => 'social_stream.social_wall.create',
                'readable_name' => 'Create SocialWall',
            ],
            [
                'name'          => 'social_stream.social_wall.edit',
                'readable_name' => 'Update SocialWall',
            ],
            [
                'name'          => 'social_stream.social_wall.delete',
                'readable_name' => 'Delete SocialWall',
            ],
        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'key'      => 'social_stream.social_wall.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
