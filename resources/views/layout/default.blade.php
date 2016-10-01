<html>
    <head>
        <title>@yield('title')</title>
        {!! HTML::style('vendor/social_stream/inc/layout.css') !!}
        {!! HTML::style('vendor/social_stream/css/dcsns_wall.css') !!}

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        
        {!! HTML::script('vendor/social_stream/inc/js/jquery.plugins.js') !!}
        {!! HTML::script('vendor/social_stream/inc/js/jquery.site.js') !!}
        {!! HTML::script('vendor/social_stream/js/jquery.social.stream.wall.1.6.js') !!}
        {!! HTML::script('vendor/social_stream/js/jquery.social.stream.1.5.16.js') !!}
        
        <script type="text/javascript">
			jQuery(document).ready(function($){
				$('#social-stream').dcSocialStream({
					feeds: {
						twitter: {
							id: '/9927875,#designchemical,designchemical'
						},
						rss: {
							id: 'http://feeds.feedburner.com/codecondo',
							out: 'intro,thumb,text,share'
						},
						stumbleupon: {
							id: 'remix4'
						},
						facebook: {
							id: '157969574262873',
							out: 'intro,thumb,text,user,share'
						},
						google: {
							id: '111470071138275408587'
						},
						delicious: {
							id: 'designchemical'
						},
						vimeo: {
							id: 'brad'
						},
						youtube: {
							id: 'FilmTrailerZone/UUPPPrnT5080hPMxK1N4QSjA',
							thumb: 'medium',
							out: 'intro,thumb,title,user,share'
						},
						pinterest: {
							id: 'jaffrey,designchemical/design-ideas'
						},
						flickr: {
							id: ''
						},
						lastfm: {
							id: 'lastfm'
						},
						dribbble: {
							id: 'frogandcode'
						},
						tumblr: {
							id: 'richters',
							thumb: 250
						},
						instagram: {
							id: '!186786085',
							accessToken: '186786085.91dbf99.da4d8fab71544cdba8645bd0a02f07a1'
						}
					},
					rotate: {
						delay: 0
					},
					twitterId: 'designchemical',
					control: false,
					filter: true,
					wall: true,
					center: true,
					cache: false,
					max: 'limit',
					limit: 3,
					iconPath: 'images/dcsns-dark/',
					imagePath: 'images/dcsns-dark/'
				});
							 
			});
			</script>
    </head>
    <body>
      
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>

