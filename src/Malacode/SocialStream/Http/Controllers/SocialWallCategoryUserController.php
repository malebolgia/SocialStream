<?php

namespace Malacode\SocialStream\Http\Controllers;

use App\Http\Controllers\UserController as UserController;
use Former;
use Malacode\SocialStream\Http\Requests\SocialWallCategoryUserRequest;
use Malacode\SocialStream\Interfaces\SocialWallCategoryRepositoryInterface;
use Response;
use User;

class SocialWallCategoryUserController extends UserController
{
    /**
     * Initialize social_wall_category controller.
     *
     * @param type SocialWallCategoryRepositoryInterface $social_wall_category
     *
     * @return type
     */
    public function __construct(SocialWallCategoryRepositoryInterface $social_wall_category)
    {
        $this->model = $social_wall_category;
        $this->model->setUserFilter();
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(SocialWallCategoryUserRequest $request)
    {
        $social_wall_categories = $this->model->all();

        $this->theme->prependTitle(trans('social_stream::social_wall_category.names').' :: ');

        return $this->theme->of('social_stream::user.social_wall_category.index', compact('social_wall_categories'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function show(SocialWallCategoryUserRequest $request, $role, $id)
    {
        $social_wall_category = $this->model->find($id);

        return $this->theme->of('social_stream::user.social_wall_category.show', compact('social_wall_category'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(SocialWallCategoryUserRequest $request)
    {
        $social_wall_category = $this->model->findOrNew(0);

        Former::populate($social_wall_category);

        return $this->theme->of('social_stream::user.social_wall_category.create', compact('social_wall_category'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(SocialWallCategoryUserRequest $request)
    {
        try {
            $attributes = $request->all();
            $social_wall_category = $this->model->create($attributes);

            return $this->success(trans('messages.success.created', ['Module' => trans('social_stream::social_wall_category.name')]));
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function edit(SocialWallCategoryUserRequest $request, $role, $id)
    {
        $social_wall_category = $this->model->find($id);

        Former::populate($social_wall_category);

        return $this->theme->of('social_stream::user.social_wall_category.edit', compact('social_wall_category'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(SocialWallCategoryUserRequest $request, $role, $id)
    {
        try {
            $attributes = $request->all();
            $social_wall_category = $this->model->update($attributes, $id);

            return $this->success(trans('messages.success.updated', ['Module' => trans('social_stream::social_wall_category.name')]));
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(SocialWallCategoryUserRequest $request, $role, $id)
    {
        try {
            $this->model->delete($id);

            return $this->success(trans('message.success.deleted', ['Module' => trans('social_stream::social_wall_category.name')]), 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
