@if ($block->preview)
	@include('blocks.preview-structure')
@else
<!--- structure --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-structure relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div class="__top grid grid-cols-1 md:grid-cols-2 items-center gap-8">
			@if (!empty($g_structure['header']))
			<h2 data-gsap-element="header" class="text-h2">{{ $g_structure['header'] }}</h2>
			@endif
			@if (!empty($g_structure['text']))
			<div data-gsap-element="txt" class="__txt">
				{!! $g_structure['text'] !!}
			</div>
			@endif
		</div>

		<div class="__content grid grid-cols-1 md:grid-cols-2 gap-10 m-btn">
			@if (!empty($g_structure['image']['ID']))
			<figure data-gsap-element="img" class="__img m-0">
				{!! wp_get_attachment_image($g_structure['image']['ID'], 'large', false, ['class' => 'w-full h-full object-cover radius-img']) !!}
			</figure>
			@endif
			<div class="__col">
				<ol class="__tabs list-none m-0 p-0 flex flex-col gap-6">
					@foreach ($layers as $layer)
					<li data-gsap-element="card" class="__tab flex items-center gap-10 px-10 py-8 radius">
						<span class="__nr text-h7">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
						<span class="__txt text-h7">{{ $layer['header'] }}</span>
					</li>
					@endforeach
				</ol>
				@if (!empty($g_structure['caption']))
				<p class="__caption text-h7 m-btn">{{ $g_structure['caption'] }}</p>
				@endif
			</div>
		</div>
	</div>
</section>
@endif
