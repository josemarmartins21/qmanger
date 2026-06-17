<div class="card">
    <div>{{ $header }}</div>
    
    <div class="body">{{ $body }}</div>
    
    <div {{ $attributes->merge(['class' => 'flex items-center flex-wrap justify-between']) }}>
        {{ $footer }}
    </div>
</div>