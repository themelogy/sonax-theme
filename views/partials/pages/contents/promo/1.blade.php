<div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space" style="padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <article class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <div class="owl-carousel-1">
                    @if($slide = Slide::findBySlug('promo-1'))
                        @foreach($slide->sliders()->where('status', 1)->orderBy('ordering', 'asc')->get() as $slider)
                        <div>
                            <a @if($slider->link->target)target="{{ $slider->link->target }}" @endif href="{{ $slider->link->url }}">
                                <img src="{{ \Imagy::getImage($slider->files()->first()->filename, 'test', ['width' => 370, 'height' => 290, 'mode' => 'fit', 'quality' => 80]) }}" alt="">
                            </a>
                        </div>
                        @endforeach
                    @endif
                </div>
            </article>
            <!-- /.entry-item -->

            <article class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <div class="p-lft-15">
                @if($slide = Slide::findBySlug('promo-2'))
                    @foreach($slide->sliders()->where('status', 1)->orderBy('ordering', 'asc')->get()->take(2) as $slider)
                    <div @if($loop->first)class="m-bot-40" @endif>
                        <a @if($slider->link->target)target="{{ $slider->link->target }}" @endif href="{{ $slider->link->url }}">
                            <img class="img-responsive" src="{{ \Imagy::getImage($slider->files()->first()->filename, 'test', ['width' => 370, 'height' => null, 'mode' => 'resize', 'quality' => 100]) }}" alt="">
                        </a>
                    </div>
                    @endforeach
                @endif
                </div>
            </article>
            <!-- /.entry-item -->

            <article class="col-md-4 col-xs-12 col-sm-12 col-lg-4">
                <div class="owl-carousel-2">
                    @if($slide = Slide::findBySlug('promo-3'))
                        @foreach($slide->sliders()->where('status', 1)->orderBy('ordering', 'asc')->get() as $slider)
                            <div>
                                <a @if($slider->link->target)target="{{ $slider->link->target }}" @endif href="{{ $slider->link->url }}">
                                    <img src="{{ \Imagy::getImage($slider->files()->first()->filename, 'test', ['width' => 370, 'height' => 290, 'mode' => 'fit', 'quality' => 100]) }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </article>
            <!-- /.entry-item -->
        </div>
    </div>
</div>


@push('scripts')
<script>
    $(document).ready(function(){
        $(".owl-carousel-1").owlCarousel({
            items : 1,
            pagination: false,
            autoPlay: 5000,
            transitionStyle: "backSlide",
            itemsCustom : false,
            itemsDesktop : [1199,1],
            itemsDesktopSmall : [980,1],
            itemsTablet: [768,1],
            itemsTabletSmall: false,
            itemsMobile : [479,1],
            singleItem : true,
            itemsScaleUp : true
        });
        $(".owl-carousel-2").owlCarousel({
            items : 1,
            pagination: false,
            autoPlay: 5000,
            transitionStyle: "goDown",
            itemsCustom : false,
            itemsDesktop : [1199,1],
            itemsDesktopSmall : [980,2],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [479,1],
            singleItem : false,
            itemsScaleUp : true
        });
    });
</script>
@endpush