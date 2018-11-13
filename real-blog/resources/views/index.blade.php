@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row">
        @for ($i = 0; $i < count($latest_posts); $i++)
        @php
            $post = $latest_posts[$i];
        @endphp
        <div class="{{ $i == 0 ? 'col-lg-12 col-md-12' : 'col-lg-6 col-md-6' }}">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                        <div class="overlay"></div>
                        <a href="{{ $post->featured }}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{ route('single', $post->slug) }}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="{{ route('single', $post->slug) }}">{{ $post->title }}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="2016-04-17 12:00:00">
                                            <!-- {{ $post->created_at->diffForHumans() }} -->
                                            {{ $post->created_at->toFormattedDateString() }}
                                        </time>

                                    </span>

                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a>
                                    </span>

                                    <span class="post__comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>

                                </div>
                        </div>
                    </div>

            </article>
        </div>
        @endfor
    </div>
</div>


<div class="container-fluid">
    @foreach ($categories as $category)
    <div class="row medium-padding120 bg-border-color">
        <div class="container">
            <div class="col-lg-12">
            <div class="offers">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="heading">
                            <h4 class="h1 heading-title">{{ $category->name }}</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="case-item-wrap">
                        @foreach ($category->home_posts as $post)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src="{{ $post->featured }}" alt="our case">
                                </div>
                                <h6 class="case-item__title">
                                    <a href="{{ route('single', $post->slug) }}">{{ $post->title }}</a>
                                </h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="padded-50"></div>
        </div>
    </div>
    @endforeach
</div>
@endsection