@extends("website.layouts.main")
@section('title', 'Обращения')
@section("content")
    <div class="container mt-5 mb-5">
        <div class="widgets">
            @foreach($widgets as $widget)
                <div class="mt-3">
                    {!! $widget->body !!}
                </div>
            @endforeach
        </div>
    </div>
@endsection
