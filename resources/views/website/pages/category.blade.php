@extends("website.layouts.main")
@section('title', $category->title.' - Управляющая компания "Предместье"')
@section("content")

    <section class="features-section spad">
        <div class="container">
            <div class="last-text">
                {{ $category->title }}
            </div>
            <div class="features">
                @foreach($pages as $page)
                    <x-website.featurepage :featurePage="$page"></x-website.featurepage>
                @endforeach
            </div>
            {{ $pages->onEachSide(5)->links() }}
        </div>
    </section>
@endsection
@section("scripts")
    <script src="{{ asset("js/website/index.js") }}"></script>
@endsection
