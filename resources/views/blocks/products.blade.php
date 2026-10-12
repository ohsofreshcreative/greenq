@if ($block->preview)
	@include('blocks.preview-products')
@else
<!--- products --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-products relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		@if (!empty($g_products['header']))
		<h2 data-gsap-element="header" class="text-h2">{{ $g_products['header'] }}</h2>
		@endif

		@foreach ($groups as $group)
		<div class="__products m-btn">
			<h3 data-gsap-element="header" class="text-h4 m-header">{{ $group['name'] }}</h3>

			<div class="__cards grid grid-cols-1 sm:grid-cols-2 {{ count($group['posts']) % 4 === 0 ? 'lg:grid-cols-4' : 'lg:grid-cols-3' }} gap-8">
				@foreach ($group['posts'] as $product)
				@php
				$label = get_field('offer_label', $product->ID);
				$params = get_field('r_offer_params', $product->ID) ?: [];
				@endphp
				<div data-gsap-element="card" class="__card flex flex-col justify-between bg-white p-6 radius">
					<div class="__content">
						@if (has_post_thumbnail($product))
						<figure class="__img img-xs m-img m-0">
							{!! get_the_post_thumbnail($product, 'medium', ['class' => 'w-auto object-contain']) !!}
						</figure>
						@endif
						<p class="__header text-h7 m-title">{{ get_the_title($product) }}</p>
						@if (!empty($label))
						<p class="__label m-header">{{ $label }}</p>
						@endif
						@if (!empty($params))
						<dl class="__info m-0">
							@foreach ($params as $param)
							<dt class="font-bold">{{ $param['label'] }}</dt>
							<dd class="m-0">{!! nl2br(e($param['value'])) !!}</dd>
							@endforeach
						</dl>
						@endif
					</div>
					<div class="inline-buttons m-btn">
						<x-button :href="get_permalink($product)" variant="underline" data-gsap-element="btn">
							{{ $g_products['button_label'] ?: 'Sprawdź produkt' }}
						</x-button>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		@endforeach
	</div>
</section>
@endif
