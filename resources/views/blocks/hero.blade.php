<!-- hero --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-hero relative bg-main -spt overflow-visible' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	@if (!empty($g_hero['video']))
	<video class="absolute inset-0 w-full h-full object-cover z-0" autoplay loop muted playsinline>
		<source src="{{ $g_hero['video'] }}" type="video/mp4">
	</video>
	
	@elseif(!empty($g_hero['image']))
	<figure data-gsap-element="img" class="absolute inset-0 w-full h-full z-0 m-0">
		<picture class="w-full h-full">
			<img src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] }}" class="w-full h-full object-cover" />
		</picture>
	</figure>
	@endif

	@if (!empty($g_hero['video']) || !empty($g_hero['image']))
	<div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(90deg, #173A11 5.84%, rgba(23, 58, 17, 0) 100.47%);"></div>
	@endif

	<img data-gsap-element="signet" class="absolute mix-blend-overlay opacity-20 z-2 pointer-events-none" src="{{ get_template_directory_uri() }}/resources/images/signet.svg" alt="" />

	<div class=" __wrapper c-main relative z-10">
		<div class="__content relative flex flex-col justify-center w-full md:w-10/12 lg:w-8/12 z-20 pt-48 pb-62">
			<h1 data-gsap-element="header" class="text-h2 text-white  m-header">
				{{ $g_hero['title'] }}
			</h1>
			@if (!empty($g_hero['text']))
			<div data-gsap-element="text" class="text-white">
				{!! $g_hero['text'] !!}
			</div>
			@endif

			<div class="inline-buttons m-btn">
				@if (!empty($g_hero['button1']))
				<x-button
					:href="$g_hero['button1']['url']"
					variant="primary"
					class=""
					data-gsap-element="btn">
					{{ $g_hero['button1']['title'] }}
				</x-button>
				@endif

				@if (!empty($g_hero['button2']))
				<x-button
					:href="$g_hero['button2']['url']"
					variant="outline"
					class=""
					data-gsap-element="btn">
					{{ $g_hero['button2']['title'] }}
				</x-button>
				@endif
			</div>

			@if (!empty($g_hero['bar_header']) || !empty($g_hero['bar_text']))
			<div data-gsap-element="card" class="__bar flex items-center m-btn px-10 py-6 radius">
				@if (!empty($g_hero['bar_icon']['ID']))
				<div class="__icon shrink-0 mr-6">
					{!! wp_get_attachment_image($g_hero['bar_icon']['ID'], 'thumbnail') !!}
				</div>
				@endif
				<div class="__txt text-white">
					@if (!empty($g_hero['bar_header']))
					<p class="text-h7">{{ $g_hero['bar_header'] }}</p>
					@endif
					@if (!empty($g_hero['bar_text']))
					<div>{!! $g_hero['bar_text'] !!}</div>
					@endif
				</div>
			</div>
			@endif
		</div>
	</div>

</section>