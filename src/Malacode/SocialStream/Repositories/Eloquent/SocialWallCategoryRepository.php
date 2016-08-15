<?php

namespace Malacode\SocialStream\Repositories\Eloquent;

use Malacode\SocialStream\Interfaces\SocialWallCategoryRepositoryInterface;

class SocialWallCategoryRepository extends BaseRepository implements SocialWallCategoryRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('social_stream.social_wall_category.model');
    }
}
