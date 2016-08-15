<div class="box-header with-border">
    <h3 class="box-title">  {!! trans('social_stream::social_wall_category.names') !!}</h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" id="btn-new-social_wall_category"><i class="fa fa-plus-circle"></i> New </button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" style="min-height:100px">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h1 class="text-center">
            <small>
            <button type="button" class="btn btn-app" data-toggle="tooltip" data-placement="top" title=""  id="btn-new-social_wall_category-icn">
            <span class="badge bg-purple">{!! SocialStream::count('social_wall_category') !!}</span>
            <i class="fa fa-plus-circle  fa-3x"></i>
            {{ trans('cms.create') }} {!! trans('social_stream::social_wall_category.name') !!}
            </button>
            <br>{!! trans('social_stream::social_wall_category.text.preview') !!}
            </small>
            </h1>
        </div>
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#btn-new-social_wall_category, #btn-new-social_wall_category-icn').click(function(){
        $('#entry-social_wall_category').load('{!!URL::to('admin/social_stream/social_wall_category/create')!!}');
    });
});
</script>