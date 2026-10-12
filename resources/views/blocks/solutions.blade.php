@if ($block->preview)
	@include('blocks.preview-solutions')
@else
<!--- solutions --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-solutions relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<nav class="__btns flex flex-wrap gap-4" aria-label="Rozwiązania">
			@foreach ($solutions as $solution)
			@if (!empty($solution['header']))
			<x-button :href="'#' . sanitize_title($solution['header'])" variant="outline" data-gsap-element="btn" class="__btn">{{ $solution['header'] }}</x-button>
			@endif
			@endforeach
		</nav>
	</div>

	@foreach ($solutions as $solution)
	<div @if(!empty($solution['header'])) id="{{ sanitize_title($solution['header']) }}" @endif class="__content -smt">
		<div class="__wrapper c-main grid grid-cols-1 md:grid-cols-2 items-center gap-20">
			@if (!empty($solution['image']['ID']))
			<figure data-gsap-element="img" @class(['__img m-0', 'md:order-2' => $loop->even])>
				{!! wp_get_attachment_image($solution['image']['ID'], 'large', false, ['class' => 'w-full h-full object-cover radius-img']) !!}
			</figure>
			@endif
			<div class="__txt">
				@if (!empty($solution['header']))
				<h2 data-gsap-element="header" class="text-h6 m-header">{{ $solution['header'] }}</h2>
				@endif
				@if (!empty($solution['text']))
				<div data-gsap-element="txt" class="[&_p]:mb-4 [&_p:last-child]:mb-0">{!! $solution['text'] !!}</div>
				@endif
				@if (!empty($solution['list']))
				<div class="__list m-btn [&_ul]:list-disc [&_ul]:pl-6 [&_li]:mb-2">
					@if (!empty($solution['list_header']))
					<p class="font-bold m-header">{{ $solution['list_header'] }}</p>
					@endif
					{!! $solution['list'] !!}
				</div>
				@endif
			</div>
		</div>
	</div>
	@endforeach
</section>
@endif
