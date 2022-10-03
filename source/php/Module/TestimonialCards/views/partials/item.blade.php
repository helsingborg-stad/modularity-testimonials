@slider__item([
            'classList' => ['u-height--100']
        ])

<div style="grid-template-areas:'image header' 'quote quote';display:grid;grid-template-columns:min-content 4fr;">
    @image([
    'classList' => ['c-testimonial__image'],
    'src'=> $slide['image'],
    'alt' => $slide['name']
    ])
@endimage

<div class="c-testimonial__header u-padding__left--2">
    @typography([      
            "element" => "h2"
        ])
        {{$slide['name']}}
    @endtypography

    @divider(['style' => 'solid', 'classList' => ['u-margin__x--0']])
    @enddivider

    @typography([                            
        "element" => "h3",
        'variant' => 'h3',
        'classList' => ['u-margin__top--2']
        
    ])
        {{$slide['title']}}
    @endtypography
</div>

<div class="c-testimonial__quote">
    @typography([
        "variant" => "p",
        "element" => "p",
        "classList" => ['u-color__text--darker']
    ])
        "{{$slide['testimonial']}}"
    @endtypography
</div>
</div>
@endslider__item 