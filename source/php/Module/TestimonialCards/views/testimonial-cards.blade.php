<section class="section section-full section-sm padding-sm section-school-testimonial">
    <div class="container">
        <div class="grid">
            @php ($i = 1)
            @foreach(get_field('modularity-testimonial-cards', $ID) as $testimonial)
            <div class="grid-xs-12 grid-sm-6 grid-lg-3">
                <div class="hip-card">
                    @if ($i % 2 === 0 )
                    <div class="image">
                        <img src="{{$testimonial['image']['url']}}">
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
                        <img src="{{$testimonial['image']['url']}}">
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
