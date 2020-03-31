<div {{ $attributes->merge(['class' => 'card statistic']) }} >
    <div class="card-body statistic-body border-{{ $color }}">
      <i class="icon {{ $icon }} text-{{ $color }}"></i>
      <p class="statistic-title">{{ $title }}</p>
      <p class="statistic-value text-{{ $color }}">{{ $value }}</p>
    </div>
  </div>
