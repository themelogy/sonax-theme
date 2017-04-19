@extends('layouts.master')

@section('content')

    <div class="c-layout-page">

        <div class="c-layout-breadcrumbs-1 c-raindrops c-fonts-uppercase c-fonts-bold">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-white c-font-sbold">{{ trans('blog::blog.title') }}</h3>
                    <h4 class="c-font-thin c-font-white c-opacity-07"></h4>
                </div>

                {!! Breadcrumbs::renderIfExists('blog.index') !!}

            </div>
        </div>

        <div class="c-content-box c-size-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row m-bot-10">
                            <div class="col-md-12">
                                <?php if ($previous = $post->present()->previous): ?>
                                <a class="btn btn-default c-btn-uppercase"
                                   href="{{ route('blog.slug', [$previous->slug]) }}">{{ trans('blog::post.title.previous') }}</a>
                                <?php endif; ?>
                                <?php if ($next = $post->present()->next): ?>
                                <a class="btn btn-default c-btn-uppercase"
                                   href="{{ route('blog.slug', [$next->slug]) }}">{{ trans('blog::post.title.next') }}</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="c-content-blog-post-1-list">
                            <div class="c-content-blog-post-1">
                                @if($file = $post->present()->firstimage(818, 460, 'fit', 80))
                                    <div class="c-media">
                                        <div class="c-content-media-2-slider" data-slider="owl" data-single-item="true" data-auto-play="4000">
                                            <div class="owl-carousel owl-theme c-theme owl-single">
                                                <div class="item">
                                                    <div class="c-content-media-2" style="background-image: url({{ $file }}); min-height: 460px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="c-title c-font-bold c-font-uppercase">
                                    <a href="{{ $post->url }}">{{ $post->title }}</a>
                                </div>
                                <div class="c-desc">
                                    {!! $post->content  !!}
                                </div>
                                <div class="c-panel">
                                    <div class="c-author">
                                        <a href="#">
                                            <span class="c-font-uppercase">{{ $post->author->fullname }}</span>
                                        </a>
                                    </div>
                                    <div class="c-date">
                                        <span class="c-font-uppercase">{{ $post->created_at->formatLocalized('d F Y, H:i') }}</span>
                                    </div>
                                    <ul class="c-tags c-theme-ul-bg">
                                        @foreach($post->tags()->get() as $tag)
                                            <li><a href="{{ route('blog.tag', [$tag->slug]) }}">{{ $tag->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        @include('blog.sidebar')
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection