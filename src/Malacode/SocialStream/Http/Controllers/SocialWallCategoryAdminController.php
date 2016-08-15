<?php

namespace Malacode\SocialStream\Http\Controllers;

use App\Http\Controllers\AdminController as AdminController;
use Former;
use Malacode\SocialStream\Http\Requests\SocialWallCategoryAdminRequest;
use Malacode\SocialStream\Interfaces\SocialWallCategoryRepositoryInterface;
use Response;

/**
 * Admin controller class.
 */
class SocialWallCategoryAdminController extends AdminController
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
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(SocialWallCategoryAdminRequest $request)
    {
        if ($request->wantsJson()) {
            $array = $this->model->json();
            foreach ($array as $key => $row) {
                $array[$key] = array_only($row, config('social_stream.social_wall_category.listfields'));
            }

            return ['data' => $array];
        }

        $this->theme->prependTitle(trans('social_stream::social_wall_category.names').' :: ');

        return $this->theme->of('social_stream::admin.social_wall_category.index')->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function show(SocialWallCategoryAdminRequest $request, $id)
    {
        $social_wall_category = $this->model->find($id);

        if (empty($social_wall_category)) {
            if ($request->wantsJson()) {
                return [];
            }

            return view('social_stream::admin.social_wall_category.new');
        }

        if ($request->wantsJson()) {
            return $social_wall_category;
        }

        Former::populate($social_wall_category);

        return view('social_stream::admin.social_wall_category.show', compact('social_wall_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(SocialWallCategoryAdminRequest $request)
    {
        $social_wall_category = $this->model->findOrNew(0);
        Former::populate($social_wall_category);

        return view('social_stream::admin.social_wall_category.create', compact('social_wall_category'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(SocialWallCategoryAdminRequest $request)
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
    public function edit(SocialWallCategoryAdminRequest $request, $id)
    {
        $social_wall_category = $this->model->find($id);

        Former::populate($social_wall_category);

        return view('social_stream::admin.social_wall_category.edit', compact('social_wall_category'));
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(SocialWallCategoryAdminRequest $request, $id)
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
    public function destroy(SocialWallCategoryAdminRequest $request, $id)
    {
        try {
            $this->model->delete($id);

            return $this->success(trans('message.success.deleted', ['Module' => trans('social_stream::social_wall_category.name')]), 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
