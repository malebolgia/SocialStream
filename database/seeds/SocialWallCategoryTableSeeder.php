<?php

namespace Malacode\SocialStream;

use DB;
use Illuminate\Database\Seeder;

class SocialWallCategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('social_wall_categories')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'name'          => 'social_stream.social_wall_category.view',
                'readable_name' => 'View SocialWallCategory',
            ],
            [
                'name'          => 'social_stream.social_wall_category.create',
                'readable_name' => 'Create SocialWallCategory',
            ],
            [
                'name'          => 'social_stream.social_wall_category.edit',
                'readable_name' => 'Update SocialWallCategory',
            ],
            [
                'name'          => 'social_stream.social_wall_category.delete',
                'readable_name' => 'Delete SocialWallCategory',
            ],
        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'key'      => 'social_stream.social_wall_category.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ],
            */
        ]);
    }
}
