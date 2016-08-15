{!!Former::horizontal_open()
->id('edit-social_stream-social_wall')
->method('PUT')
->files('true')
->action(URL::to('user/social_stream/social_wall') .'/'.$social_wall['eid'])!!}
@include('social_stream::user.social_wall.partial.entry')
{!! Former::close() !!}