<?php

namespace Malacode\SocialStream\Http\Controllers;

use App\Http\Controllers\UserController as UserController;
use Former;
use Malacode\SocialStream\Http\Requests\SocialWallUserRequest;
use Malacode\SocialStream\Interfaces\SocialWallRepositoryInterface;
use Response;
use User;

class SocialWallUserController extends UserController
{
    /**
     * Initialize social_wall controller.
     *
     * @param type SocialWallRepositoryInterface $social_wall
     *
     * @return type
     */
    public function __construct(SocialWallRepositoryInterface $social_wall)
    {
        $this->model = $social_wall;
        $this->model->setUserFilter();
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(SocialWallUserRequest $request)
    {
        $social_walls = $this->model->all();

        $this->theme->prependTitle(trans('social_stream::social_wall.names').' :: ');

        return $this->theme->of('social_stream::user.social_wall.index', compact('social_walls'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function show(SocialWallUserRequest $request, $role, $id)
    {
        $social_wall = $this->model->find($id);

        return $this->theme->of('social_stream::user.social_wall.show', compact('social_wall'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(SocialWallUserRequest $request)
    {
        $social_wall = $this->model->findOrNew(0);

        Former::populate($social_wall);

        return $this->theme->of('social_stream::user.social_wall.create', compact('social_wall'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(SocialWallUserRequest $request)
    {
        try {
            $attributes = $request->all();
            $social_wall = $this->model->create($attributes);

            return $this->success(trans('messages.success.created', ['Module' => trans('social_stream::social_wall.name')]));
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
    public function edit(SocialWallUserRequest $request, $role, $id)
    {
        $social_wall = $this->model->find($id);

        Former::populate($social_wall);

        return $this->theme->of('social_stream::user.social_wall.edit', compact('social_wall'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(SocialWallUserRequest $request, $role, $id)
    {
        try {
            $attributes = $request->all();
            $social_wall = $this->model->update($attributes, $id);

            return $this->success(trans('messages.success.updated', ['Module' => trans('social_stream::social_wall.name')]));
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
    public function destroy(SocialWallUserRequest $request, $role, $id)
    {
        try {
            $this->model->delete($id);

            return $this->success(trans('message.success.deleted', ['Module' => trans('social_stream::social_wall.name')]), 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
