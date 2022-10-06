@if (!$hideTitle && !empty($postTitle))
    @typography([
        'element' => "h4"
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