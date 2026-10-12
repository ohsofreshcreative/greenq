<!--- works preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Realizacje</div>
			<span class="acf-preview__slug">acf/works</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_oworks['header']))
		<p class="text-h5">{{ $g_oworks['header'] }}</p>
		@endif
		@if (!empty($g_oworks['button']['title']))
		<div class="acf-preview-actions"><span class="acf-preview-button">{{ $g_oworks['button']['title'] }}</span></div>
		@endif
		<div class="acf-preview__grid grid grid-cols-2 sm:grid-cols-3">
			@foreach (array_slice((array) ($photos ?? []), 0, 6) as $photo)
			@if (!empty($photo['image']['url']))
			<figure class="acf-preview__media m-0"><img src="{{ $photo['image']['url'] }}" alt="{{ $photo['image']['alt'] ?? '' }}" class="h-20 w-32 object-cover"></figure>
			@endif
			@endforeach
		</div>
		@if (count((array) ($photos ?? [])) > 6)
		<p>+ {{ count((array) ($photos ?? [])) - 6 }} kolejnych zdjęć</p>
		@endif
	</div>
</div>
