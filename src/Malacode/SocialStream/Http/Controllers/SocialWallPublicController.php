<?php

namespace Malacode\SocialStream\Http\Controllers;

use App\Http\Controllers\PublicController as CMSPublicController;
use Malacode\SocialStream\Interfaces\SocialWallRepositoryInterface;

class SocialWallPublicController extends CMSPublicController
{
    /**
     * Constructor.
     *
     * @param type \Malacode\SocialWall\Interfaces\SocialWallRepositoryInterface $social_wall
     *
     * @return type
     */
    public function __construct(SocialWallRepositoryInterface $social_wall)
    {
        $this->model = $social_wall;
        parent::__construct();
    }

    /**
     * Show social_wall's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $social_walls = $this->model->all();

        return $this->theme->of('social_stream::public.social_wall.index', compact('social_walls'))->render();
    }

    /**
     * Show social_wall.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $social_wall = $this->model->findBySlug($slug);

        return $this->theme->of('social_stream::public.social_wall.show', compact('social_wall'))->render();
    }
}
