<!--- image preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Obraz</div>
			<span class="acf-preview__slug">acf/image</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2">
			@foreach (['image', 'image2'] as $field)
			@if (!empty($g_image[$field]['ID']))
			<figure class="acf-preview__media m-0">
				{!! wp_get_attachment_image($g_image[$field]['ID'], 'thumbnail', false, ['class' => 'h-24 w-full object-contain']) !!}
			</figure>
			@elseif (!empty($g_image[$field]['url']))
			<figure class="acf-preview__media m-0">
				<img class="h-24 w-full object-contain" src="{{ $g_image[$field]['url'] }}" alt="{{ $g_image[$field]['alt'] ?? '' }}">
			</figure>
			@endif
			@endforeach
		</div>
	</div>
</div>
