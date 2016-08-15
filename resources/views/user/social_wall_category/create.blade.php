{!!Former::horizontal_open()
->id('create-social_stream-social_wall_category')
->method('POST')
->files('true')
->action(URL::to('user/social_stream/social_wall_category'))!!}
@include('social_stream::user.social_wall_category.partial.entry')
{!! Former::close() !!}