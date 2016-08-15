{!!Former::horizontal_open()
->id('create-social_stream-social_wall')
->method('POST')
->files('true')
->action(URL::to('user/social_stream/social_wall'))!!}
@include('social_stream::user.social_wall.partial.entry')
{!! Former::close() !!}