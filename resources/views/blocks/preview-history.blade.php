<!--- history preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Historia</div>
			<span class="acf-preview__slug">acf/history</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_history['image']['ID']))
		<figure class="acf-preview__media m-0">
			{!! wp_get_attachment_image($g_history['image']['ID'], 'thumbnail', false, ['class' => 'h-20 w-32 object-cover']) !!}
		</figure>
		@elseif (!empty($g_history['image']['url']))
		<figure class="acf-preview__media m-0">
			<img class="h-20 w-32 object-cover" src="{{ $g_history['image']['url'] }}" alt="{{ $g_history['image']['alt'] ?? '' }}">
		</figure>
		@endif
		@if (!empty($g_history['header']))
		<p class="text-h5">{{ $g_history['header'] }}</p>
		@endif
		@if (!empty($g_history['text']))
		<div>{!! $g_history['text'] !!}</div>
		@endif
		<div class="acf-preview-actions">
			@if (!empty($g_history['button1']['title']))
			<span class="acf-preview-button">{{ $g_history['button1']['title'] }}</span>
			@endif
			@if (!empty($g_history['button2']['title']))
			<span class="acf-preview-button">{{ $g_history['button2']['title'] }}</span>
			@endif
		</div>
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-3">
			@foreach (array_slice((array) ($r_history ?? []), 0, 3) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['title']))
				<p class="text-h6">{{ $item['title'] }}</p>
				@endif
				@if (!empty($item['text']))
				<p>{{ $item['text'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</div>
