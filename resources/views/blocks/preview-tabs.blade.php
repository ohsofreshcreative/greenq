<!--- tabs preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Zakładki</div>
			<span class="acf-preview__slug">acf/tabs</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_tabs['header']))
		<p class="text-h5">{{ $g_tabs['header'] }}</p>
		@endif
		@if (!empty($g_tabs['text']))
		<div>{{ $g_tabs['text'] }}</div>
		@endif
		@if (!empty($r_tabs))
		<div class="acf-preview-actions">
			@foreach (array_slice((array) $r_tabs, 0, 4) as $item)
			@if (!empty($item['tab']))
			<span class="acf-preview-button">{{ $item['tab'] }}</span>
			@endif
			@endforeach
		</div>
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2">
			@foreach (array_slice((array) $r_tabs, 0, 4) as $item)
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
				@if (!empty($item['title']))
				<p class="text-h6">{{ $item['title'] }}</p>
				@endif
				@if (!empty($item['text']))
				<p>{{ $item['text'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@endif
		@if (!empty($g_tabs['button']['title']))
		<div class="acf-preview-actions"><span class="acf-preview-button">{{ $g_tabs['button']['title'] }}</span></div>
		@endif
	</div>
</div>
