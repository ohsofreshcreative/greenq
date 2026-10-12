<!--- news preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Aktualności</div>
			<span class="acf-preview__slug">acf/news</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_news['header']))
		<p class="text-h5">{{ $g_news['header'] }}</p>
		@endif
		@if (!empty($g_news['text']))
		<div>{!! $g_news['text'] !!}</div>
		@endif
		@if (!empty($g_news['button']['title']))
		<div class="acf-preview-actions"><span class="acf-preview-button">{{ $g_news['button']['title'] }}</span></div>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($items ?? []), 0, 3) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['image_url']))
				<figure class="acf-preview__media m-0">
					<img class="h-16 w-full object-cover" src="{{ $item['image_url'] }}" alt="{{ $item['image_alt'] ?? '' }}">
				</figure>
				@endif
				@if (!empty($item['category']))
				<p>{{ $item['category'] }}</p>
				@endif
				@if (!empty($item['title']))
				<p class="text-h6">{{ $item['title'] }}</p>
				@endif
				@if (!empty($item['excerpt']))
				<p>{{ $item['excerpt'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</div>
