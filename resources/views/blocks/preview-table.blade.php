<!--- table preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Tabela</div>
			<span class="acf-preview__slug">acf/table</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_table['header']))
		<p class="text-h5">{{ $g_table['header'] }}</p>
		@endif
		@if (!empty($g_table['text']))
		<p>{{ $g_table['text'] }}</p>
		@endif
		@if (!empty($r_table))
		@php
		$columns = [
			$g_table_cols['col1'] ?? 'Model',
			$g_table_cols['col2'] ?? 'Wydajność',
			$g_table_cols['col3'] ?? 'Napęd / silnik',
			$g_table_cols['col4'] ?? 'Grubość wirnika',
		];
		@endphp
		<div class="overflow-x-auto">
			<table class="w-full border-collapse text-left">
				<thead>
					<tr>
						@foreach ($columns as $column)
						<th class="border-b-2 border-primary bg-primary px-3 py-2 text-white">{{ $column }}</th>
						@endforeach
					</tr>
				</thead>
				<tbody>
					@foreach (array_slice((array) $r_table, 0, 4) as $row)
					<tr>
						@foreach (['col1', 'col2', 'col3', 'col4'] as $column)
						<td class="border-b border-gray-200 px-3 py-2">{{ $row[$column] ?? '' }}</td>
						@endforeach
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
	</div>
</div>
