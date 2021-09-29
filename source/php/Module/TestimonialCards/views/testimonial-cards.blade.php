@if (!$hideTitle && !empty($postTitle))
    @typography([
        'element' => "h4"
    ])
        {!! $postTitle !!}
    @endtypography
@endif

@testimonials(
    ['perRow' => 4,
    'testimonials' => $testimonials
    ]
)
@endtestimonials

