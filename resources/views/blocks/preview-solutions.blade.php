<!--- solutions preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Rozwiązania</div>
			<span class="acf-preview__slug">acf/solutions</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($solutions ?? []), 0, 6) as $solution)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($solution['image']['url']))
				<figure class="acf-preview__media m-0"><img src="{{ $solution['image']['url'] }}" alt="{{ $solution['image']['alt'] ?? '' }}" class="h-20 w-32 object-cover"></figure>
				@endif
				@if (!empty($solution['header']))
				<p class="text-h6">{{ $solution['header'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@if (count((array) ($solutions ?? [])) > 6)
		<p>+ {{ count((array) ($solutions ?? [])) - 6 }} kolejnych elementów</p>
		@endif
	</div>
</div>
