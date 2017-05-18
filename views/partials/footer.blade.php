<a name="footer"></a>
<footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
    <div class="c-prefooter">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('partials/footer/quick-contact')
                </div>
                <div class="col-md-3">
                    <div class="c-container">
                        @include('partials/footer/links', ['page'=>Page::findBySlug('hizmetlerimiz')])
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="c-container">
                        @include('partials/footer/links', ['page' => Page::findBySlug('kampanyalar')])
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="c-container c-last">
                        @include('partials/footer/menu-links', ['menu' => 'uygulama-paketleri'])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-postfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 c-col">
                    <p class="c-copyright c-font-grey">
                        <span class="c-font-grey-3">{{ trans('themes::theme.copyrights') }}</span>
                        {{ Carbon::now()->format('Y') }} &copy; {{ setting('theme::company-name') }}
                    </p>
                </div>
                <div class="col-md-8 col-sm-12 c-links">
                    {!! Menu::get('footer', \Modules\Theme\Presenters\Sonax\FooterMenuPresenter::class) !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>

<div class="c-layout-go2top">
    <i class="icon-arrow-up"></i>
</div>