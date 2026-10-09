@if ((!empty($background) && $background !== 'none') || !empty($nomt))
<div class="acf-preview__settings">
  @if (!empty($background) && $background !== 'none')
  <span class="acf-preview__setting acf-preview__setting--background">Tło: {{ $background }}</span>
  @endif
  @if (!empty($nomt))
  <span class="acf-preview__setting acf-preview__setting--nomt">Brak marginesu górnego</span>
  @endif
</div>
@endif
