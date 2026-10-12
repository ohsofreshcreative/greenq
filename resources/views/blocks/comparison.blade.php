@if ($block->preview)
	@include('blocks.preview-comparison')
@else
<!--- comparison --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-comparison relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div x-data="{ tab: 0 }">
			<div class="__top grid grid-cols-1 md:grid-cols-2 items-center gap-8">
				@if (!empty($g_comparison['header']))
				<h2 data-gsap-element="header" class="text-h2">{{ $g_comparison['header'] }}</h2>
				@endif
				@if (!empty($g_comparison['text']))
				<div data-gsap-element="txt" class="__txt">
					{!! $g_comparison['text'] !!}
				</div>
				@endif
			</div>

			@if (count($tabs) > 1)
			<div class="__tabs inline-flex gap-2 p-2 radius m-btn" role="tablist">
				@foreach ($tabs as $tab)
				<button
					type="button"
					role="tab"
					class="__btn px-8 py-4 radius cursor-pointer aria-selected:text-white aria-selected:bg-primary"
					x-on:click="tab = {{ $loop->index }}"
					x-bind:aria-selected="tab === {{ $loop->index }}">
					{{ $tab['tab'] }}
				</button>
				@endforeach
			</div>
			@endif

			@foreach ($tabs as $tab)
			<div
				class="__content grid grid-cols-1 lg:grid-cols-2 gap-8 m-btn"
				role="tabpanel"
				x-show="tab === {{ $loop->index }}"
				@if (!$loop->first) style="display: none" @endif>
				<div class="__col">
					<div class="__top flex items-center justify-between m-header">
						@if (!empty($tab['header']))
						<p class="text-h7">{{ $tab['header'] }}</p>
						@endif
						@if (!empty($tab['badge']))
						<span class="__bulb px-6 py-4 radius">{{ $tab['badge'] }}</span>
						@endif
					</div>
					@if (!empty($tab['steps']))
					<ol class="__tabs list-none m-0 p-0 flex flex-col gap-3">
						@foreach ($tab['steps'] as $step)
						<li class="__tab flex items-center gap-6 p-2 radius">
							<span class="__nr">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
							<span class="__txt">{{ $step['header'] }}</span>
						</li>
						@endforeach
					</ol>
					@endif
				</div>
				@if (!empty($tab['params']))
				<ul class="__tabs list-none m-0 p-0 flex flex-col gap-4">
					@foreach ($tab['params'] as $param)
					<li class="__tab flex items-center justify-between px-6 py-4 radius">
						<span>{{ $param['label'] }}</span>
						<span>{{ $param['value'] }}</span>
					</li>
					@endforeach
				</ul>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
