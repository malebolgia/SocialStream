<?php

namespace Malacode\SocialStream\Http\Controllers;

use App\Http\Controllers\AdminController as AdminController;
use Former;
use Malacode\SocialStream\Http\Requests\SocialWallAdminRequest;
use Malacode\SocialStream\Interfaces\SocialWallRepositoryInterface;
use Response;

/**
 * Admin controller class.
 */
class SocialWallAdminController extends AdminController
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
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(SocialWallAdminRequest $request)
    {
        if ($request->wantsJson()) {
            $array = $this->model->json();
            foreach ($array as $key => $row) {
                $array[$key] = array_only($row, config('social_stream.social_wall.listfields'));
            }

            return ['data' => $array];
        }

        $this->theme->prependTitle(trans('social_stream::social_wall.names').' :: ');

        return $this->theme->of('social_stream::admin.social_wall.index')->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function show(SocialWallAdminRequest $request, $id)
    {
        $social_wall = $this->model->find($id);

        if (empty($social_wall)) {
            if ($request->wantsJson()) {
                return [];
            }

            return view('social_stream::admin.social_wall.new');
        }

        if ($request->wantsJson()) {
            return $social_wall;
        }

        Former::populate($social_wall);

        return view('social_stream::admin.social_wall.show', compact('social_wall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(SocialWallAdminRequest $request)
    {
        $social_wall = $this->model->findOrNew(0);
        Former::populate($social_wall);

        return view('social_stream::admin.social_wall.create', compact('social_wall'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(SocialWallAdminRequest $request)
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
    public function edit(SocialWallAdminRequest $request, $id)
    {
        $social_wall = $this->model->find($id);

        Former::populate($social_wall);

        return view('social_stream::admin.social_wall.edit', compact('social_wall'));
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(SocialWallAdminRequest $request, $id)
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
    public function destroy(SocialWallAdminRequest $request, $id)
    {
        try {
            $this->model->delete($id);

            return $this->success(trans('message.success.deleted', ['Module' => trans('social_stream::social_wall.name')]), 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
