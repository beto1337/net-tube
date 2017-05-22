<section id="premium">
		<div class="row">
				<div class="heading clearfix">
						<div class="large-11 columns">
								<h4><i class="fa fa-play-circle-o"></i>Premium Videos</h4>
						</div>
						<div class="large-1 columns">
								<div class="navText show-for-large">
										<a class="prev secondary-button"><i class="fa fa-angle-left"></i></a>
										<a class="next secondary-button"><i class="fa fa-angle-right"></i></a>
								</div>
						</div>
				</div>
		</div>
		<div id="owl-demo" class="owl-carousel carousel" data-car-length="4" data-items="4" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="3000" data-dots="false" data-auto-width="false" data-responsive-small="1" data-responsive-medium="2" data-responsive-xlarge="5">
			@foreach ($post as $post)
			<div class="item">
					<figure class="premium-img" style="height:240px;">
							<img src="{{imagen480($post->post_imagen)}}" height="240" width="320"  alt="carousel">
							<figcaption style="padding-bottom:15px;padding-top: 0px;">
									<h5>{{validarlargo($post->post_titulo)}}</h5>
									<p>{{validarlista($post->post_categoria,4)}}</p>
							</figcaption>
					</figure>
					<a href="{{url(validarlista($post->post_categoria,4).'/'.$post->post_slug)}}" class="hover-posts">
							<span><i class="fa fa-play"></i>ver</span>
					</a>
			</div>
			@endforeach
		</div>
</section>
