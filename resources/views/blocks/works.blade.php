@if ($block->preview)
	@include('blocks.preview-works')
@else
<!--- works --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-works relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div class="__top flex flex-col md:flex-row md:items-end md:justify-between gap-8">
			<div class="__content">
				@if (!empty($g_oworks['header']))
				<h2 data-gsap-element="header" class="text-h2 m-header">{{ $g_oworks['header'] }}</h2>
				@endif
				@if (!empty($g_oworks['text']))
				<div data-gsap-element="txt" class="__txt">
					{!! $g_oworks['text'] !!}
				</div>
				@endif
			</div>
			@if (!empty($g_oworks['button']['url']))
			<div class="inline-buttons">
				<x-button :href="$g_oworks['button']['url']" variant="primary" data-gsap-element="btn">
					{{ $g_oworks['button']['title'] }}
				</x-button>
			</div>
			@endif
		</div>

		@if (!empty($photos))
		<div class="__photos grid grid-cols-1 md:grid-cols-2 gap-8 m-btn">
			@if (!empty($photos[0]['image']['ID']))
			<figure data-gsap-element="img" class="__photo m-0">
				{!! wp_get_attachment_image($photos[0]['image']['ID'], 'large', false, ['class' => 'w-full h-full object-cover radius-img']) !!}
			</figure>
			@endif
			<div class="__photos grid grid-cols-2 gap-2.5">
				@foreach (array_slice($photos, 1, 4) as $photo)
				@if (!empty($photo['image']['ID']))
				<figure data-gsap-element="img" class="__photo m-0">
					{!! wp_get_attachment_image($photo['image']['ID'], 'medium_large', false, ['class' => 'w-full h-full object-cover radius-img']) !!}
				</figure>
				@endif
				@endforeach
			</div>
		</div>
		@endif
	</div>
</section>
@endif
