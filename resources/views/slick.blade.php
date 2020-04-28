@pushonce('header:carousel')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha256-4hqlsNP9KM6+2eA8VUT0kk4RsMRTeS7QGHIM+MZ5sLY=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI=" crossorigin="anonymous" />
<style>
.slick-arrow.slick-prev{left: 1rem; z-index: 1;opacity: 0;}
.slick-arrow.slick-next{right: 1rem; z-index: 1;opacity: 0;}
.vlCarouselWrapper:hover .slick-arrow{opacity: 1;}
</style>
@endpushonce

<div class="vlCarouselWrapper relative overflow-hidden bg-gray-800" 
	style="height: {{ $carouselHeight ?? '60vh' }}">

	<div class="vlCarousel">
		@foreach($files as $file)
			<div class="vlCarouselItem bg-no-repeat bg-cover bg-fixed" 
				style="height: {{ $carouselHeight ?? '60vh' }};
					background-image: url({{ asset(is_string($file) ? $file : $file->path) }})">
			</div>
		@endforeach
	</div>

	@isset($carouselOverlay)
		<div class="{{$carouselOverlay}} opacity-50 vlAbsoluteInset"></div>
	@endif
	
	@hasSection('vlCarouselContent')
		<div class="vlCarouselContent opacity-0 vlAbsoluteInset vlFlexCenter">
			@yield('vlCarouselContent')
		</div>
	@endif
</div>

@pushonce('scripts:carousel')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha256-NXRS8qVcmZ3dOv3LziwznUHPegFhPZ1F/4inU7uC8h0=" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){

	$('.vlCarouselWrapper').find('.vlCarouselContent').animate({'opacity': 1}, 700)
	$('.vlCarousel').slick({
		@isset($carouselSettings)
			{{ $carouselSettings }}
		@else
			autoplay: true,
	  		autoplaySpeed: 2000,
	  		fade: true,
	  		cssEase: 'linear'
	  	@endif
	})

	$('.vlCarousel').each(function(){
		var carousel = $(this)

		var speed = {{ $vlCarouselSpeed ?? -0.2 }}, {{-- speed between -1 and 1 --}}
			cH = carousel.height(),
			cT = carousel.offset().top,
			wH = $(window).height(),
			wW = $(window).width()

		/* Annoying bug on mobile, where bg-fixed or bg-scroll don't work.... */
		var safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent)
		if(cT > wH && (safari)){
			carousel.find('.vlCarouselItem').each(function(i, el) {
				$(this).removeClass('bg-fixed')
			})
			return
		}

		carousel.find('.vlCarouselItem').each(function(i, el) {
			var item = $(this),
				src = item.css('background-image').replace(/^url\(["']?/, '').replace(/["']?\)$/, ''),
				requiredHeight = cH + 2*(cT + cH)*Math.abs(speed)

			$('<img/>').attr('src', src).on('load', function() {

				item.data('ready', true)

				var widthDiff = wW - requiredHeight * this.naturalWidth / this.naturalHeight

				if(widthDiff > 0){
					var heightDiff = widthDiff * this.naturalHeight/ this.naturalWidth
					item.css('background-size', 'auto '+( requiredHeight + heightDiff )+'px' )
						.css('background-position', '50% '+(-1*(cT + cH)*Math.abs(speed))+'px')
				}else{

					item.css('background-size', 'auto '+( requiredHeight )+'px' )
						.css('background-position', '50% '+(-1*(cT + cH)*Math.abs(speed))+'px')
				
				}

			    $(this).remove(); // prevent memory leaks
			})
		})

		$(window).scroll(function() {
			var y = $(this).scrollTop()

			//animate only if on screen
			if( (y > cT - wH) && (y < cT + cH) ){
				carousel.find('.vlCarouselItem').each(function(i, el) {
					if($(el).data('ready'))
				    	$(el).css('background-position', '50% '+(((cT + cH) - y)*speed)+'px')
				})
			}
		})
	})
})
</script>
@endpushonce