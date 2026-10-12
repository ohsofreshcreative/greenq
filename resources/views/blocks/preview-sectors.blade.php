<!--- sectors preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Zastosowania w inwestycjach</div>
			<span class="acf-preview__slug">acf/sectors</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_osectors['header']))
		<p class="text-h5">{{ $g_osectors['header'] }}</p>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($sectors ?? []), 0, 6) as $sector)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($sector['icon']['url']))
				<figure class="acf-preview__media m-0"><img src="{{ $sector['icon']['url'] }}" alt="{{ $sector['icon']['alt'] ?? '' }}" class="h-20 w-32 object-contain"></figure>
				@endif
				@if (!empty($sector['header']))
				<p class="text-h6">{{ $sector['header'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@if (count((array) ($sectors ?? [])) > 6)
		<p>+ {{ count((array) ($sectors ?? [])) - 6 }} kolejnych elementów</p>
		@endif
	</div>
</div>
