<!--- catalogues preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Katalogi</div>
			<span class="acf-preview__slug">acf/catalogues</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@foreach (array_slice((array) ($r_catalogues ?? []), 0, 2) as $group)
		@if (!empty($group['group_title']))
		<p class="text-h5">{{ $group['group_title'] }}</p>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
			@foreach (array_slice((array) ($group['group_items'] ?? []), 0, 4) as $item)
			<div class="acf-preview__card flex items-center gap-2">
				<span class="acf-preview-button">PDF</span>
				<div class="min-w-0">
					@if (!empty($item['title']))
					<p class="text-h6">{{ $item['title'] }}</p>
					@endif
					<p>Pobierz</p>
				</div>
			</div>
			@endforeach
		</div>
		@if (count((array) ($group['group_items'] ?? [])) > 4)
		<p>+ {{ count((array) $group['group_items']) - 4 }} kolejnych katalogów</p>
		@endif
		@endforeach
	</div>
</div>
