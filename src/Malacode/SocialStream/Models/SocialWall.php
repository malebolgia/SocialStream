<?php

namespace Malacode\SocialStream\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class SocialWall extends Model
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
        $this->fillable = config('social_stream.social_wall.fillable');
        $this->uploads = config('social_stream.social_wall.uploadable');
        $this->uploadRootFolder = config('social_stream.social_wall.upload_root_folder');
        $this->table = config('social_stream.social_wall.table');
    }
}
