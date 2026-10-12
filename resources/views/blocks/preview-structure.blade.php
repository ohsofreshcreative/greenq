<!--- structure preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Struktura</div>
			<span class="acf-preview__slug">acf/structure</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_structure['image']['url']))
		<figure class="acf-preview__media m-0"><img src="{{ $g_structure['image']['url'] }}" alt="{{ $g_structure['image']['alt'] ?? '' }}" class="h-20 w-32 object-contain"></figure>
		@endif
		@if (!empty($g_structure['header']))
		<p class="text-h5">{{ $g_structure['header'] }}</p>
		@endif
		@if (!empty($g_structure['text']))
		<div>{!! $g_structure['text'] !!}</div>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
			@foreach (array_slice((array) ($layers ?? []), 0, 6) as $layer)
			<div class="acf-preview__card flex flex-col gap-2">
				<p class="text-h6">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} {{ $layer['header'] }}</p>
			</div>
			@endforeach
		</div>
		@if (count((array) ($layers ?? [])) > 6)
		<p>+ {{ count((array) ($layers ?? [])) - 6 }} kolejnych elementów</p>
		@endif
	</div>
</div>
