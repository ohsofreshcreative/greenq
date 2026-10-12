<!--- overlap preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Treść oraz duże kafelki</div>
			<span class="acf-preview__slug">acf/overlap</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_overlap['header']))
		<p class="text-h5">{{ $g_overlap['header'] }}</p>
		@endif
		@if (!empty($g_overlap['text']))
		<div>{!! $g_overlap['text'] !!}</div>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2">
			@foreach (array_slice((array) ($r_overlap ?? []), 0, 4) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['image']['ID']))
				<figure class="acf-preview__media m-0">
					{!! wp_get_attachment_image($item['image']['ID'], 'thumbnail', false, ['class' => 'h-16 w-full object-cover']) !!}
				</figure>
				@elseif (!empty($item['image']['url']))
				<figure class="acf-preview__media m-0">
					<img class="h-16 w-full object-cover" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}">
				</figure>
				@endif
				@if (!empty($item['header']))
				<p class="text-h6">{{ $item['header'] }}</p>
				@endif
				@if (!empty($item['text']))
				<div>{!! $item['text'] !!}</div>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</div>
