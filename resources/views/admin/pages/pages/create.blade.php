@extends("admin.layouts.main")
@section('title', 'Новая страница')
@section("content")

    <h1 class="h3 mb-2 text-gray-800 mt-4">Новая страница</h1>
    <div class="row mt-2">
        <div class="col-10">
            <form class="shadow page-form" action="{{ route("admin.pages.store") }}" method="post">
                @csrf
                <div class="row">
                    <label class="" for="title"><h4 class="text-primary">Заголовок</h4></label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="row mt-3">
                    <label for="category_id"><h4 class="text-primary">Категория</h4></label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $oneCategory)
                            <option value="{{ $oneCategory->id }}">{{ $oneCategory->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mt-3">
                    <label for="body"><h4 class="text-primary">Текст</h4></label>
                    <x-admin.editor-buttons></x-admin.editor-buttons>
                    <textarea name="body" id="body" rows="20" class="body form-control"></textarea>
                </div>
            </form>
        </div>
    </div>

@endsection
@section("scripts")
    <script src="{{ asset("js/admin/pages.js") }}"></script>
    <script src="{{ asset("js/admin/editor.js") }}"></script>
@endsection

