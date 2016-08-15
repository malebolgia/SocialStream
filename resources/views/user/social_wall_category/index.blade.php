[<a href="/user/social_stream/social_wall_category/create"> {{ trans('cms.create')  }}</a>]
<table id="main-list" class="table table-striped table-bordered">
    <thead>
        <td>Id</td>
        
        <td>Action</td>
    </thead>
    <tbody>
        @foreach($social_wall_categories as $social_wall_category)
        <tr>
            <td><a href="/user/social_stream/social_wall_category/{!! $social_wall_category->eid !!}"> {!! $social_wall_category->id !!} </a></td>
            
            <td>
                <a href="/user/social_stream/social_wall_category/{!! $social_wall_category->eid !!}/edit"> Edit </a>
                <a href="/user/social_stream/social_wall_category/{!! $social_wall_category->eid !!}" class="link-delete"> Delete </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
$(document).ready(function(){
    $('.link-delete').click(function(e){
        var url = $(this).attr('href');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function(){
            $.ajax({
                url: url,
                type: 'DELETE',
                processData: false,
                contentType: false,
                success:function(data, textStatus, jqXHR)
                {
                    data = jQuery.parseJSON(data);
                    window.location = data.redirect;
                },
            });
        });
        e.preventDefault();
    });
});
</script>