<!--- steps preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Kroki współpracy</div>
			<span class="acf-preview__slug">acf/steps</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		<div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
			<div>
				@if (!empty($g_steps['label']))
				<p class="text-primary">{{ $g_steps['label'] }}</p>
				@endif
				@if (!empty($g_steps['header']))
				<p class="text-h5">{{ $g_steps['header'] }}</p>
				@endif
			</div>
			@if (!empty($g_steps['button']['title']))
			<div class="acf-preview-actions"><span class="acf-preview-button">{{ $g_steps['button']['title'] }}</span></div>
			@endif
		</div>

		<div class="acf-preview__grid acf-preview__grid--steps grid grid-cols-1 items-stretch sm:grid-cols-2 lg:grid-cols-6">
			@foreach (array_slice((array) ($r_steps ?? []), 0, 6) as $item)
			<div class="flex h-full flex-col gap-1">
				<p class="text-big text-primary-900">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
				<div class="acf-preview__step flex flex-1 flex-col gap-2 radius border border-gray-200 p-3">
					@if (!empty($item['title']))
					<p class="text-h6">{{ $item['title'] }}</p>
					@endif
					@if (!empty($item['text']))
					<p>{!! nl2br(e($item['text'])) !!}</p>
					@endif
				</div>
			</div>
			@endforeach
		</div>
		@if (count((array) ($r_steps ?? [])) > 6)
		<p>+ {{ count((array) ($r_steps ?? [])) - 6 }} kolejnych etapów</p>
		@endif
	</div>
</div>
