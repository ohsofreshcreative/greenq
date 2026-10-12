@php
$offerId = get_the_ID();
$image = get_field('offer_image', $offerId);
$subtitle = get_field('offer_subtitle', $offerId);
$lead = get_field('offer_lead', $offerId);
$points = get_field('r_offer_points', $offerId) ?: [];
$button1 = get_field('offer_button1', $offerId);
$button2 = get_field('offer_button2', $offerId);
$params = get_field('r_offer_params', $offerId) ?: [];

$about = get_field('offer_about', $offerId);
$summary = get_field('r_offer_summary', $offerId) ?: [];
$specText = get_field('offer_spec_text', $offerId);
$spec = get_field('r_offer_spec', $offerId) ?: [];
$usageText = get_field('offer_usage_text', $offerId);
$usage = get_field('r_offer_usage', $offerId) ?: [];
$usageNote = get_field('offer_usage_note', $offerId);
$whereText = get_field('offer_where_text', $offerId);
$where = get_field('r_offer_where', $offerId) ?: [];
$docsText = get_field('offer_docs_text', $offerId);
$docs = get_field('r_offer_docs', $offerId) ?: [];
$docsIcon = get_field('offer_docs_icon', $offerId);
$docsDownload = get_field('offer_docs_download', $offerId);

$tabs = array_filter([
	'opis' => ($about || $summary) ? 'Opis' : null,
	'parametry' => $spec ? 'Parametry' : null,
	'zuzycie' => $usage ? 'Zużycie materiału' : null,
	'zastosowania' => $where ? 'Zastosowania' : null,
	'dokumenty' => $docs ? 'Dokumenty' : null,
]);
@endphp

<!--- offer --->

<article class="b-offer relative">

	<section class="__product -menu-mt">
		<div class="__wrap c-main grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
			<figure data-gsap-element="img" class="__img m-0 bg-white radius flex items-center justify-center p-10">
				@if (!empty($image['ID']))
				{!! wp_get_attachment_image($image['ID'], 'large', false, ['class' => 'w-auto h-auto max-w-full']) !!}
				@elseif (has_post_thumbnail())
				{!! get_the_post_thumbnail($offerId, 'large', ['class' => 'w-auto h-auto max-w-full']) !!}
				@endif
			</figure>

			<div class="__data">
				<div class="__header">
					<h1 data-gsap-element="header" class="text-h2 m-title">{{ get_the_title() }}</h1>
					@if (!empty($subtitle))
					<p class="text-h7">{{ $subtitle }}</p>
					@endif
				</div>

				@if (!empty($lead))
				<div data-gsap-element="txt" class="__txt m-btn">{!! $lead !!}</div>
				@endif

				@if (!empty($params))
				<div class="__info grid grid-cols-2 gap-2 m-btn [&>:last-child:nth-child(odd)]:col-span-2">
					@foreach ($params as $param)
					<dl class="m-0 bg-white radius px-6 py-4">
						<dt class="font-bold">{{ $param['label'] }}</dt>
						<dd class="m-0">{!! nl2br(e($param['value'])) !!}</dd>
					</dl>
					@endforeach
				</div>
				@endif

				@if (!empty($points))
				<ul class="__list list-none m-btn p-0">
					@foreach ($points as $point)
					<li class="flex items-center gap-4 mb-2">
						<svg class="shrink-0 text-primary" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<rect width="16" height="16" rx="8" class="fill-primary-50" />
							<path d="M4.5 8.2L7 10.5L11.5 5.8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						{{ $point['text'] }}
					</li>
					@endforeach
				</ul>
				@endif

				@if (!empty($button1['url']) || !empty($button2['url']))
				<div class="inline-buttons m-btn flex flex-wrap items-center gap-6">
					@if (!empty($button1['url']))
					<x-button :href="$button1['url']" variant="primary" data-gsap-element="btn">
						{{ $button1['title'] }}
					</x-button>
					@endif
					@if (!empty($button2['url']))
					<x-button :href="$button2['url']" variant="outline-secondary" data-gsap-element="btn">
						{{ $button2['title'] }}
						@if (!empty($docsDownload['ID']))
						<span class="ml-2">{!! wp_get_attachment_image($docsDownload['ID'], 'thumbnail', false, ['class' => 'w-4 h-auto']) !!}</span>
						@endif
					</x-button>
					@endif
				</div>
				@endif
			</div>
		</div>
	</section>

	@if (!empty($tabs))
	<nav class="__btns sticky top-0 z-30 bg-white -smt" aria-label="Sekcje produktu">
		<div class="c-main flex flex-wrap gap-8">
			@foreach ($tabs as $anchor => $tabLabel)
			<a href="#{{ $anchor }}" class="__btn py-6">{{ $tabLabel }}</a>
			@endforeach
		</div>
	</nav>
	@endif

	<div class="__about bg-white">
		<div class="__wrapper c-main">

			@if (isset($tabs['opis']))
			<section id="opis" class="__section py-14">
				<h2 data-gsap-element="header" class="text-h4 m-header">Opis rozwiązania</h2>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
					@if (!empty($about))
					<div data-gsap-element="txt" class="__txt">{!! $about !!}</div>
					@endif
					@if (!empty($summary))
					<div class="__summary border border-dashed border-primary-300 radius p-6">
						<p class="font-bold m-title">W skrócie</p>
						<ul class="list-none m-0 p-0">
							@foreach ($summary as $point)
							<li class="flex items-center gap-4 mb-2">
								<svg class="shrink-0 text-primary" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
									<rect width="16" height="16" rx="8" class="fill-primary-50" />
									<path d="M4.5 8.2L7 10.5L11.5 5.8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
								{{ $point['text'] }}
							</li>
							@endforeach
						</ul>
					</div>
					@endif
				</div>
			</section>
			@endif

			@if (isset($tabs['parametry']))
			<section id="parametry" class="__section __specification py-14 border-t border-primary-100">
				<div class="__top grid grid-cols-1 md:grid-cols-2 gap-10 items-end">
					<h2 data-gsap-element="header" class="text-h4">Parametry techniczne</h2>
					@if (!empty($specText))
					<div data-gsap-element="txt" class="__txt">{!! $specText !!}</div>
					@endif
				</div>
				<div class="__table grid grid-cols-1 md:grid-cols-2 gap-x-8 m-btn">
					@foreach (array_chunk($spec, (int) ceil(count($spec) / 2)) as $column)
					<div class="__col">
						@foreach ($column as $row)
						<div class="__point flex items-center justify-between gap-6 py-4 border-t border-primary-100">
							<span>{{ $row['label'] }}</span>
							<span class="font-bold text-right">{{ $row['value'] }}</span>
						</div>
						@endforeach
					</div>
					@endforeach
				</div>
			</section>
			@endif

			@if (isset($tabs['zuzycie']))
			<section id="zuzycie" class="__section __usage py-14 border-t border-primary-100">
				<h2 data-gsap-element="header" class="text-h4 m-header">Zużycie materiału</h2>
				@if (!empty($usageText))
				<div data-gsap-element="txt" class="__txt">{!! $usageText !!}</div>
				@endif
				<div class="__tabs grid grid-cols-2 lg:grid-cols-4 gap-2 m-btn">
					@foreach ($usage as $item)
					<div class="__tab bg-white border border-primary-100 radius px-6 py-4">
						<p class="m-0">{{ $item['label'] }}</p>
						<p class="m-0 text-h7">{{ $item['value'] }}</p>
					</div>
					@endforeach
				</div>
				@if (!empty($usageNote))
				<div class="__txt m-btn">{!! $usageNote !!}</div>
				@endif
			</section>
			@endif

			@if (isset($tabs['zastosowania']))
			<section id="zastosowania" class="__section __where py-14 border-t border-primary-100">
				<h2 data-gsap-element="header" class="text-h4 m-header">Gdzie sprawdza się płyta</h2>
				@if (!empty($whereText))
				<div data-gsap-element="txt" class="__txt">{!! $whereText !!}</div>
				@endif
				<div class="__cards grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 border border-primary-100 radius m-btn">
					@foreach ($where as $item)
					<div data-gsap-element="card" class="__card flex items-start gap-6 p-8 border border-primary-100">
						@if (!empty($item['icon']['ID']))
						<div class="__icon shrink-0">{!! wp_get_attachment_image($item['icon']['ID'], 'thumbnail', false, ['class' => 'w-8 h-auto']) !!}</div>
						@endif
						<div class="__txt">
							<p class="font-bold m-0">{{ $item['header'] }}</p>
							@if (!empty($item['text']))
							<div>{!! $item['text'] !!}</div>
							@endif
						</div>
					</div>
					@endforeach
				</div>
			</section>
			@endif

			@if (isset($tabs['dokumenty']))
			<section id="dokumenty" class="__section __docs py-14 border-t border-primary-100">
				<h2 data-gsap-element="header" class="text-h4 m-header">Dokumentacja produktu</h2>
				@if (!empty($docsText))
				<div data-gsap-element="txt" class="__txt">{!! $docsText !!}</div>
				@endif
				<div class="__cards grid grid-cols-1 md:grid-cols-2 gap-8 m-btn">
					@foreach ($docs as $doc)
					<div data-gsap-element="card" class="__card flex items-center justify-between gap-6 bg-white border border-primary-100 radius p-4">
						<div class="__content flex items-center gap-6">
							@if (!empty($docsIcon['ID']))
							<div class="__icon shrink-0">{!! wp_get_attachment_image($docsIcon['ID'], 'thumbnail', false, ['class' => 'w-14 h-auto']) !!}</div>
							@endif
							<div class="__txt">
								<p class="font-bold m-0">{{ $doc['header'] }}</p>
								@if (!empty($doc['text']))
								<p class="m-0">{{ $doc['text'] }}</p>
								@endif
							</div>
						</div>
						@if (!empty($doc['file']['url']))
						<a href="{{ $doc['file']['url'] }}" class="__download shrink-0 p-3" download aria-label="Pobierz: {{ $doc['header'] }}">
							@if (!empty($docsDownload['ID']))
							{!! wp_get_attachment_image($docsDownload['ID'], 'thumbnail', false, ['class' => 'w-5 h-auto']) !!}
							@else
							Pobierz
							@endif
						</a>
						@endif
					</div>
					@endforeach
				</div>
			</section>
			@endif

		</div>
	</div>

	<div id="tresc" class="__entry">
		{!! apply_filters('the_content', get_the_content()) !!}
	</div>
</article>
