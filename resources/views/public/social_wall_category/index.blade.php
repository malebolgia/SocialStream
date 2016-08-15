<div class="row">
  <div class="col-md-12">
    @forelse($social_wall_categories as $social_wall_category)
      <div class="col-md-4 col-sm-6">
         <div class"form-group">
              <label for="title">
                {!! trans('social_stream::social_wall_category.label.title') !!}
              </label><br />
              {!! $social_wall_category['title'] !!}
         </div>
      </div>
      <div class="col-md-4 col-sm-6">
         <div class"form-group">
              <label for="description">
                {!! trans('social_stream::social_wall_category.label.description') !!}
              </label><br />
              {!! $social_wall_category['description'] !!}
         </div>
      </div>
[<a href='/social_stream/social_wall_category/{{ $social_wall_category['slug'] }}'>View</a>]
<hr>
    @empty
    <p>No social_wall_categories</p>
    @endif
  </div>
</div>