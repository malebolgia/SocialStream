<?php

namespace Malacode\SocialStream\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class SocialWallCategory extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Initialiaze page modal.
     *
     * @param $name
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Initialize the modal variables.
     *
     * @return void
     */
    public function initialize()
    {
        $this->fillable = config('social_stream.social_wall_category.fillable');
        $this->uploads = config('social_stream.social_wall_category.uploadable');
        $this->uploadRootFolder = config('social_stream.social_wall_category.upload_root_folder');
        $this->table = config('social_stream.social_wall_category.table');
    }
    /**
     * The social_category_belongs_to that belong to the social_wall_category.
     */
    public function social_category_belongs_to(){
        return $this->belongsTo('SocialStream\SocialWallCategory\Models\social_wall');
    }
}
