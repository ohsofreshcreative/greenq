<!--- numbers preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Liczby</div>
			<span class="acf-preview__slug">acf/numbers</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($image['ID']))
		<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($image['ID'], 'thumbnail', false, ['class' => 'h-20 w-32 object-contain']) !!}</figure>
		@endif
		@if (!empty($header))
		<p class="text-h5">{{ $header }}</p>
		@endif
		@if (!empty($text))
		<div>{!! $text !!}</div>
		@endif
		@if (!empty($button['title']))
		<div class="acf-preview-actions"><span class="acf-preview-button">{{ $button['title'] }}</span></div>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($r_numbers ?? []), 0, 3) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['title']))
				<p class="text-h6">{{ $item['title'] }}</p>
				@endif
				@if (!empty($item['txt']))
				<p>{!! nl2br(e($item['txt'])) !!}</p>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</div>
