<section id="{{ $sectionID }}" class="section section-sm padding-sm section-school-testimonial">
    <div class="container">
        <div class="grid js-autoslide-xs js-autoslide-sm js-autoslide-md" data-flickity='{{ $flickitySettings }}'>
            @php ($i = 1)
            @foreach($testimonials as $testimonial)
            <div class="js-slider grid-xs-12 grid-sm-6 grid-lg-3">
                <div class="hip-card">
                    @if ($i % 2 === 0 )

                        <div class="image">
                            <img src="{{$testimonial['image_resize']}}">
                        </div>
                        <div class="header">
                            <h4>{{$testimonial['name']}}</h4>
                            <h6>{{$testimonial['title']}}</h6>
                        </div>

                    @else

                        <div class="header">
                            <h4>{{$testimonial['name']}}</h4>
                            <h6>{{$testimonial['title']}}</h6>
                        </div>
                        <div class="image">
                            <img src="{{$testimonial['image_resize']}}">
                        </div>

                    @endif

                    @php ($i++)
                    <div class="content">
                        <p>
                           {{$testimonial['testimonial']}}
                        <p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</section>
