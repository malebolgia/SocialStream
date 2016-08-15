<?php

namespace Malacode\SocialStream\Repositories\Eloquent;

use Malacode\SocialStream\Interfaces\SocialWallRepositoryInterface;

class SocialWallRepository extends BaseRepository implements SocialWallRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('social_stream.social_wall.model');
    }
}
