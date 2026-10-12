<!--- gallery preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Galeria</div>
			<span class="acf-preview__slug">acf/gallery</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_gallery['header']))
		<p class="text-h5">{{ $g_gallery['header'] }}</p>
		@endif
		<div class="acf-preview__grid grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4">
			@foreach (array_slice((array) ($g_gallery['gallery'] ?? []), 0, 8) as $image)
			@if (!empty($image['ID']))
			<figure class="acf-preview__media m-0">
				{!! wp_get_attachment_image($image['ID'], 'thumbnail', false, ['class' => 'h-16 w-full object-cover']) !!}
			</figure>
			@elseif (!empty($image['url']))
			<figure class="acf-preview__media m-0">
				<img class="h-16 w-full object-cover" src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? '' }}">
			</figure>
			@endif
			@endforeach
		</div>
	</div>
</div>
