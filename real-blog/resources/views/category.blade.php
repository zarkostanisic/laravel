@extends ('layouts.app')

@section ('content')
<div class="content-wrapper">

<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Category: {{ $category->name }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">
                @foreach ($posts as $post)
                    <a href="{{ route('single', $post->slug) }}">
                        <div class="case-item-wrap">

                            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $post->featured }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title">{{ $post->title }}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>

            <div class="row text-center">
                {{ $posts->links() }}
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            
            @include ('includes.sidebar')

        </main>
    </div>
</div>
@endsection