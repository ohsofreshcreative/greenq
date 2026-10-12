@if ($block->preview)
	@include('blocks.preview-sectors')
@else
<!--- sectors --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-sectors relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div class="__top">
			@if (!empty($g_osectors['header']))
			<h2 data-gsap-element="header" class="text-h2 m-header">{{ $g_osectors['header'] }}</h2>
			@endif
			@if (!empty($g_osectors['text']))
			<div data-gsap-element="txt" class="__txt">
				{!! $g_osectors['text'] !!}
			</div>
			@endif
		</div>

		<div class="__cards grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 m-btn">
			@foreach ($sectors as $sector)
			<div data-gsap-element="card" class="__card p-8 bg-white border border-page">
				<div class="__top flex items-center justify-between m-img">
					@if (!empty($sector['icon']['ID']))
					<div class="__icon">
						{!! wp_get_attachment_image($sector['icon']['ID'], 'thumbnail') !!}
					</div>
					@endif
					@if (!empty($sector['label']))
					<span class="__label">{{ $sector['label'] }}</span>
					@endif
				</div>
				<div class="__txt">
					@if (!empty($sector['header']))
					<p class="text-h7 m-header">{{ $sector['header'] }}</p>
					@endif
					@if (!empty($sector['text']))
					<div>{!! $sector['text'] !!}</div>
					@endif
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
