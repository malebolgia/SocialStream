@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('social_stream::social_wall_category.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('social_stream::social_wall_category.names') !!}</small>
@stop

@section('title')
{!! trans('social_stream::social_wall_category.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="http://www.lavalite.org/admin"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('social_stream::social_wall_category.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='entry-social_wall_category'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="main-list" class="table table-striped table-bordered">
    <thead>
        
    </thead>
</table>
@stop
@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    $('#entry-social_wall_category').load('{!!URL::to('admin/social_stream/social_wall_category/0')!!}');
    oTable = $('#main-list').dataTable( {
        "ajax": '{!! URL::to('/admin/social_stream/social_wall_category') !!}',
        "columns": [
            
        ],
        "social_wall_categoryLength": 50
    });

    $('#main-list tbody').on( 'click', 'tr', function () {
        $(this).toggleClass("selected").siblings(".selected").removeClass("selected");

        var d = $('#main-list').DataTable().row( this ).data();

        $('#entry-social_wall_category').load('{!!URL::to('admin/social_stream/social_wall_category')!!}' + '/' + d.id);

    });
});
</script>
@stop

@section('style')
@stop