<?php

namespace Malacode\SocialStream\Http\Controllers;

use App\Http\Controllers\PublicController as CMSPublicController;
use Malacode\SocialStream\Interfaces\SocialWallCategoryRepositoryInterface;

class SocialWallCategoryPublicController extends CMSPublicController
{
    /**
     * Constructor.
     *
     * @param type \Malacode\SocialWallCategory\Interfaces\SocialWallCategoryRepositoryInterface $social_wall_category
     *
     * @return type
     */
    public function __construct(SocialWallCategoryRepositoryInterface $social_wall_category)
    {
        $this->model = $social_wall_category;
        parent::__construct();
    }

    /**
     * Show social_wall_category's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $social_wall_categories = $this->model->all();

        return $this->theme->of('social_stream::public.social_wall_category.index', compact('social_wall_categories'))->render();
    }

    /**
     * Show social_wall_category.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $social_wall_category = $this->model->findBySlug($slug);

        return $this->theme->of('social_stream::public.social_wall_category.show', compact('social_wall_category'))->render();
    }
}
