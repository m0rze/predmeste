
<header class="header-section clearfix">
    <div class="site-navbar">
        <!-- Logo -->
        <a href="{{ route("index") }}" class="site-logo">
            <img src="{{ asset("img/logo.png") }}" alt="УК Предместье" class="logo-img">
        </a>

        <!-- Menu -->
        <nav class="site-nav-menu">
            <ul>

                <li class="active"><a href="{{ route("index") }}">Главная</a></li>
                <li><a href="#">Разделы</a>
                    <ul class="sub-menu">
                        @if(!empty($mainData->categories))
                            @foreach($mainData->categories as $oneCategory)
                                <li><a href="{{ route("category.show", $oneCategory->slug) }}">{{ $oneCategory->title }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                @if(!empty($mainData->staticPages))
                    @foreach($mainData->staticPages as $oneStaticPage)
                        @if($oneStaticPage->staticPlace->id === 1)
                            <li><a href="{{ route("page.show.static", $oneStaticPage->slug) }}">{{ $oneStaticPage->title }}</a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </nav>

    </div>
</header>
