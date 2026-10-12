<!--- contact preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Kontakt</div>
			<span class="acf-preview__slug">acf/contact</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_contact['image']['ID']))
		<figure class="acf-preview__media m-0">
			{!! wp_get_attachment_image($g_contact['image']['ID'], 'thumbnail', false, ['class' => 'h-20 w-32 object-cover']) !!}
		</figure>
		@elseif (!empty($g_contact['image']['url']))
		<figure class="acf-preview__media m-0">
			<img class="h-20 w-32 object-cover" src="{{ $g_contact['image']['url'] }}" alt="{{ $g_contact['image']['alt'] ?? '' }}">
		</figure>
		@endif
		@if (!empty($g_contact['header']))
		<p class="text-h5">{{ $g_contact['header'] }}</p>
		@endif
		@if (!empty($g_contact['subheader']))
		<p>{{ $g_contact['subheader'] }}</p>
		@endif
		@if (!empty($g_contact['address']))
		<div>{!! $g_contact['address'] !!}</div>
		@endif
		@if (!empty($g_contact['phone2']) || !empty($g_contact['mail']) || !empty($g_contact['hours']))
		<div class="acf-preview__card flex flex-col gap-2">
			@if (!empty($g_contact['phone2']))
			<p>{{ $g_contact['phone2'] }}</p>
			@endif
			@if (!empty($g_contact['mail']))
			<p>{{ $g_contact['mail'] }}</p>
			@endif
			@if (!empty($g_contact['hours']))
			<p>{{ $g_contact['hours'] }}</p>
			@endif
		</div>
		@endif
		@if (!empty($g_contact['button']['title']))
		<div class="acf-preview-actions"><span class="acf-preview-button">{{ $g_contact['button']['title'] }}</span></div>
		@endif
		@if (!empty($departments))
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2">
			@foreach (array_slice((array) $departments, 0, 3) as $department)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($department['header']))
				<p class="text-h6">{{ $department['header'] }}</p>
				@endif
				@if (!empty($department['mail']))
				<p>{{ $department['mail'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@endif
	</div>
</div>
