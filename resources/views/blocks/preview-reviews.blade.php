<!--- reviews preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Slider - Opinie</div>
			<span class="acf-preview__slug">acf/reviews</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($header))
		<p class="text-h5">{{ $header }}</p>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($r_reviews ?? []), 0, 3) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['image']['ID']))
				<figure class="acf-preview__media m-0">
					{!! wp_get_attachment_image($item['image']['ID'], 'thumbnail', false, ['class' => 'h-12 w-24 object-contain']) !!}
				</figure>
				@elseif (!empty($item['image']['url']))
				<figure class="acf-preview__media m-0">
					<img class="h-12 w-24 object-contain" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}">
				</figure>
				@endif
				@if (!empty($item['header']))
				<p class="text-h6">{{ $item['header'] }}</p>
				@endif
				@if (!empty($item['txt']))
				<p>{{ $item['txt'] }}</p>
				@endif
				@if (!empty($item['name']))
				<p>{{ $item['name'] }}</p>
				@endif
				@if (!empty($item['position']))
				<p>{{ $item['position'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@if (empty($r_reviews))
		<p>Opinie są zarządzane w panelu „Opinie”.</p>
		@endif
	</div>
</div>
