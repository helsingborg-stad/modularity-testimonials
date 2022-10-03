@if (!$hideTitle && !empty($postTitle))
    @typography([
        'element' => "h4"
    ])
        {!! $postTitle !!}
    @endtypography
@endif

{{-- @testimonials([
    'isCarousel' => $isCarousel,
    'testimonials' => $testimonials
])
@endtestimonials --}}

@slider([
    

])
    @foreach ($testimonials as $slide)
        @includeFirst(['partials.item', 'partials.item'])
    @endforeach
@endslider