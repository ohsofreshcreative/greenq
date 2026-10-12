<!--- slider preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Slider</div>
			<span class="acf-preview__slug">acf/slider</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_slider['header']))
		<p class="text-h5">{{ $g_slider['header'] }}</p>
		@endif
		@if (!empty($g_slider['text']))
		<div>{!! $g_slider['text'] !!}</div>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($slides ?? []), 0, 6) as $slide)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($slide['icon']['url']))
				<figure class="acf-preview__media m-0"><img src="{{ $slide['icon']['url'] }}" alt="{{ $slide['icon']['alt'] ?? '' }}" class="h-20 w-32 object-contain"></figure>
				@endif
				@if (!empty($slide['label']))
				<p>{{ $slide['label'] }}</p>
				@endif
				@if (!empty($slide['header']))
				<p class="text-h6">{{ $slide['header'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@if (count((array) ($slides ?? [])) > 6)
		<p>+ {{ count((array) ($slides ?? [])) - 6 }} kolejnych elementów</p>
		@endif
	</div>
</div>
