<!--- products preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Produkty</div>
			<span class="acf-preview__slug">acf/products</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_products['header']))
		<p class="text-h5">{{ $g_products['header'] }}</p>
		@endif
		@forelse ($groups as $group)
		<p class="text-h6">{{ $group['name'] }}</p>
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice($group['posts'], 0, 6) as $product)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (has_post_thumbnail($product))
				<figure class="acf-preview__media m-0">{!! get_the_post_thumbnail($product, 'thumbnail', ['class' => 'h-20 w-32 object-contain']) !!}</figure>
				@endif
				<p class="text-h6">{{ get_the_title($product) }}</p>
			</div>
			@endforeach
		</div>
		@if (count($group['posts']) > 6)
		<p>+ {{ count($group['posts']) - 6 }} kolejnych produktów</p>
		@endif
		@empty
		<p>Brak produktów do wyświetlenia.</p>
		@endforelse
	</div>
</div>
