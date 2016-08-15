<?php

namespace Malacode\SocialStream;

class SocialStream
{
    /**
     * $social_wall object.
     */
    protected $social_wall;
    /**
     * $social_wall_category object.
     */
    protected $social_wall_category;

    /**
     * Constructor.
     */
    public function __construct(\Malacode\SocialStream\Interfaces\SocialWallRepositoryInterface $social_wall,
        \Malacode\SocialStream\Interfaces\SocialWallCategoryRepositoryInterface $social_wall_category)
    {
        $this->social_wall = $social_wall;
        $this->social_wall_category = $social_wall_category;
    }

    /**
     * Returns count of social_stream.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }
}
