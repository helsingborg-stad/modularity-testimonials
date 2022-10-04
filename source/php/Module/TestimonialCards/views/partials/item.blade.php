@slider__item([
     'classList' => ['u-height--100']
])
        @card([
            'classList' => ['u-padding__y--3', 'u-padding__x--3']
        ])

    <div class="testimonial__grid">
            @image([
            'classList' => ['testimonial__image'],
            'src'=> $slide['image'],
            'alt' => $slide['name']
            ])
        @endimage

        <div class="testimonial__header u-padding__left--2">
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

        <div class="testimonial__quote">
            @typography([
                "variant" => "p",
                "element" => "p",
                "classList" => ['u-color__text--darker']
            ])
                "{{$slide['testimonial']}}"
            @endtypography
        </div>
    </div>
    @endcard
@endslider__item 

