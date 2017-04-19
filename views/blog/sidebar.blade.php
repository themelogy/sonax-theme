<!--<form action="#" method="post">
    <div class="input-group">
        <input type="text" class="form-control c-square c-theme-border" placeholder="{{ trans('blog::post.title.post search') }}">
        <span class="input-group-btn">
            <button class="btn c-theme-btn c-theme-border c-btn-square" type="button">{{ trans('blog::post.buttons.search') }}</button>
        </span>
    </div>
</form>-->
<div class="c-content-ver-nav">
    <div class="c-content-title-1 c-theme c-title-md">
        <h3 class="c-font-bold c-font-uppercase">{{ trans('blog::category.title.category') }}</h3>
        <div class="c-line-left c-theme-bg"></div>
    </div>
    <ul class="c-menu c-arrow-dot1 c-theme">
        @foreach(BlogCategory::all() as $category)
            <li>
                <a href="{{ $category->url }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
<div class="c-content-tab-1 c-theme c-margin-t-30">
    <div class="nav-justified">
        <ul class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="#blog_recent_posts" data-toggle="tab">{{ trans('blog::post.title.recent posts') }}</a>
            </li>
            <li>
                <a href="#blog_popular_posts" data-toggle="tab">{{ trans('blog::post.title.popular posts') }}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="blog_recent_posts">
                <ul class="c-content-recent-posts-1">
                    @foreach(Blog::latest(5) as $post)
                        <li>
                            <div class="c-image">
                                <img src="{{ $post->present()->firstimage(50,50,'fit',80) }}" alt="" class="img-responsive"></div>
                            <div class="c-post">
                                <a href="{{ $post->url }}" class="c-title c-font-14">{{ $post->title }}</a>
                                <div class="c-date">{{ $post->created_at->formatLocalized('d F Y') }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-pane" id="blog_popular_posts">
                <ul class="c-content-recent-posts-1">
                    @foreach(app(\Modules\Blog\Entities\Post::class)->orderBy('counter', 'desc')->get()->take(5) as $post)
                        <li>
                            <div class="c-image">
                                <img src="{{ $post->present()->firstimage(50,50,'fit',80) }}" alt="" class="img-responsive"></div>
                            <div class="c-post">
                                <a href="{{ $post->url }}" class="c-title c-font-14">{{ $post->title }}</a>
                                <div class="c-date">{{ $post->created_at->formatLocalized('d F Y') }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>