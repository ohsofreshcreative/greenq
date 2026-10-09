<!--- support preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">W czym możemy pomóc</div>
			<span class="acf-preview__slug">acf/support</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_support['label']))
		<p>{{ $g_support['label'] }}</p>
		@endif
		@if (!empty($g_support['header']))
		<p class="text-h5">{{ $g_support['header'] }}</p>
		@endif
		@if (!empty($g_support['text']))
		<div>{!! $g_support['text'] !!}</div>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($r_support ?? []), 0, 3) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['icon']['ID']))
				<figure class="m-0">{!! wp_get_attachment_image($item['icon']['ID'], 'thumbnail', false, ['class' => 'h-16 w-16 object-contain']) !!}</figure>
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
	</div>
</div>
