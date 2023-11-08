<div class="progress" style="{{ $height ?? '' }}">
    <div class="progress-bar {!! $attributes !!}" role="progressbar" style="width: {{ $value }}%" aria-valuenow="{{ $value }}" aria-valuemin="{{ $value_min }}" aria-valuemax="{{ $value_max }}">{{ $text }}</div>
</div>
