<!--- comparison preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Porównanie</div>
			<span class="acf-preview__slug">acf/comparison</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_comparison['header']))
		<p class="text-h5">{{ $g_comparison['header'] }}</p>
		@endif
		@if (!empty($g_comparison['text']))
		<div>{!! $g_comparison['text'] !!}</div>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2">
			@foreach (array_slice((array) ($tabs ?? []), 0, 6) as $tab)
			<div class="acf-preview__card flex flex-col gap-2">
				<p class="text-h6">{{ $tab['tab'] }}</p>
				@if (!empty($tab['header']))
				<p>{{ $tab['header'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</div>
