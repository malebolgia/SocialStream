<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.view') }}   {!! trans('social_stream::social_wall_category.name') !!}  [{!! $social_wall_category->name !!}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-success btn-sm" id="btn-new"><i class="fa fa-plus-circle"></i>  New</button>
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit"><i class="fa fa-pencil-square"></i>  Edit</button>
        <button type="button" class="btn btn-danger btn-sm" id="btn-delete"><i class="fa fa-times-circle-o"></i>  Delete</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('social_stream::social_wall_category.name') !!}</a></li>
        </ul>
        {!!Former::vertical_open()
        ->id('show-social_stream-social_wall_category')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/social_stream/social_wall_category'))!!}
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    @include('social_stream::admin.social_wall_category.partial.entry')
                </div>
            </div>
        {!! Former::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
<script type="text/javascript">
$(document).ready(function(){

    $('#btn-new').click(function(){
        $('#entry-social_wall_category').load('{!!URL::to('admin/social_stream/social_wall_category/create')!!}');
    });

    $('#btn-edit').click(function(){
        $('#entry-social_wall_category').load('{!!URL::to('admin/social_stream/social_wall_category')!!}/{!!$social_wall_category->id!!}/edit');
    });

    $('#btn-delete').click(function(){
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function(){
                var data = new FormData();
                $.ajax({
                    url: '{!!URL::to('admin')!!}/social_stream/social_wall_category/{!!$social_wall_category->id!!}',
                    type: 'DELETE',
                    processData: false,
                    contentType: false,
                    success:function(data, textStatus, jqXHR)
                    {
                        swal("Deleted!", "The social_wall_category has been deleted.", "success");
                        $('#entry-social_wall_category').load('{!!URL::to('admin/social_stream/social_wall_category/0')!!}');
                        $('#main-list').DataTable().ajax.reload( null, false );
                    },
                });
        });
    });

});
</script>