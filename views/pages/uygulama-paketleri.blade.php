@extends('layouts.master')

@section('content')
    <div class="c-layout-page">

        <div class="c-layout-breadcrumbs-1 c-raindrops c-fonts-uppercase c-fonts-bold">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-white c-font-sbold">{{ $page->title }}</h3>
                    <h4 class="c-font-thin c-font-white c-opacity-07"> {{ $page->title }}</h4>
                </div>

                {!! Breadcrumbs::render('page') !!}

            </div>
        </div>

        <div class="c-content-box c-size-md c-bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if($page = Page::findBySlug($page->slug))
                            <div class="ui styled fluid accordion">
                                @foreach($page->children()->orderBy('position', 'asc')->get() as $child)
                                <div class="title @if($loop->first) active @endif">
                                    <i class="dropdown icon"></i>
                                    {{ $child->title }}
                                </div>
                                <div class="content @if($loop->first) active @endif">
                                    @if($child->children()->count()>0)
                                        <div class="accordion">
                                            @foreach($child->children()->get() as $child)
                                                <div class="title @if($loop->first) active @endif">
                                                    <i class="dropdown icon"></i>
                                                    {{ $child->title }}
                                                </div>
                                                <div class="content @if($loop->first) active @endif">
                                                    <div class="padding-20">
                                                    {!! $child->body !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="padding-20">
                                                {!! $child->body !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@push('scripts')
<script type="text/javascript">
    $('.ui.accordion').accordion();
</script>
@endpush
