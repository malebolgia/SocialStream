<div class="box-header with-border">
    <h3 class="box-title"> Edit  {!! trans('social_stream::social_wall_category.name') !!} [{!!$social_wall_category->name!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" id="btn-save"><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" id="btn-close"><i class="fa fa-times-circle"></i> cms.close</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#social_wall_category" data-toggle="tab">{!! trans('social_stream::social_wall_category.tab.name') !!}</a></li>
        </ul>
        {!!Former::vertical_open()
        ->id('edit-social_wall_category')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/social_stream/social_wall_category/'. $social_wall_category['id']))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="social_wall_category">
                @include('social_stream::admin.social_wall_category.partial.entry')
            </div>
        </div>
        {!!Former::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
<script type="text/javascript">

        (function ($) {
            $('#btn-close').click(function(){
                $('#entry-social_wall_category').load('{!!URL::to('admin/social_stream/social_wall_category')!!}/{!!$social_wall_category->id!!}');
            });

            $('#btn-save').click(function(){
                $('#edit-social_wall_category').submit();
            });

            $('#edit-social_wall_category')
            .submit( function( e ) {

                if($('#edit-social_wall_category').valid() == false) {
                    toastr.warning({{ trans('message.unprocessable') }}, '{{ trans('cms.warning') }}');
                    return false;
                }

                var formURL  = "{!! URL::to('admin/social_stream/social_wall_category/')!!}/{!!$social_wall_category->id!!}";
                $.ajax( {
                    url: formURL,
                    type: 'POST',
                    data: new FormData( this ),
                    processData: false,
                    contentType: false,
                    success:function(data, textStatus, jqXHR)
                    {
                        $('#entry-social_wall_category').load('{!!URL::to('admin/social_stream/social_wall_category')!!}/{!!$social_wall_category->id!!}');
                        $('#main-list').DataTable().ajax.reload( null, false );
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                    }
                });
                e.preventDefault();
            });

        }(jQuery));

</script>