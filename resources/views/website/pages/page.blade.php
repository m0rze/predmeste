@extends("website.layouts.main")
@section('title',  $page->title)
@section("content")
    <div class="container">
        <article class="page-content">

            <header class="page-header">
                <h1>{{ $page->title }}</h1>
            </header>
            <div class="content">
                {!! $page->body !!}
            </div>

        </article>
    </div>
@endsection
@section("scripts")
@endsection
