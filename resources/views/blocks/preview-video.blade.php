<!--- video preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Wideo</div>
			<span class="acf-preview__slug">acf/video</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_video['header']))
		<p class="text-h5">{{ $g_video['header'] }}</p>
		@endif
		@if (!empty($g_video['video']))
		<div class="acf-preview__media">
			<p>Wideo</p>
		</div>
		@endif
	</div>
</div>
