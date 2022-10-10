@if (!$hideTitle && !empty($postTitle))
    @typography([
        'element' => "h4",
        'variant' => 'h2',
        'classList' => ['module-title']
    ])
        {!! $postTitle !!}
    @endtypography
@endif

@testimonials([
    'isCarousel' => $isCarousel,
    'testimonials' => $testimonials,
    'slidesPerPage' => $slidesPerPage,
])
@endtestimonials