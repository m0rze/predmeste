@extends("website.layouts.main")
@section('title', 'Управляющая компания "Предместье"')
@section("content")

    <section class="features-section spad">
        <div class="container">
            <div class="last-text">
                Последние записи:
            </div>
            <div class="features">
                @foreach($featurePages as $page)
                    <x-website.featurepage :featurePage="$page"></x-website.featurepage>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section("scripts")
    <script src="{{ asset("js/website/index.js") }}"></script>
@endsection
