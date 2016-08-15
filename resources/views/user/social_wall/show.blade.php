<div class="col-md-4 col-sm-6">
         <div class"form-group">
              <label for="nameid">
                {!! trans('social_stream::social_wall.label.nameid') !!}
              </label><br />
              {!! $social_wall['nameid'] !!}
         </div>
      </div>
      <div class="col-md-4 col-sm-6">
         <div class"form-group">
              <label for="options">
                {!! trans('social_stream::social_wall.label.options') !!}
              </label><br />
              {!! $social_wall['options'] !!}
         </div>
      </div>
      <div class="col-md-4 col-sm-6">
         <div class"form-group">
              <label for="category_id">
                {!! trans('social_stream::social_wall.label.category_id') !!}
              </label><br />
              {!! $social_wall['category_id'] !!}
         </div>
      </div>
[<a href='/social_stream/social_wall/{{ $social_wall['slug'] }}'>View</a>]
<hr>
