{!!Former::horizontal_open()
->id('edit-social_stream-social_wall_category')
->method('PUT')
->files('true')
->action(URL::to('user/social_stream/social_wall_category') .'/'.$social_wall_category['eid'])!!}
@include('social_stream::user.social_wall_category.partial.entry')
{!! Former::close() !!}