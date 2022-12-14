@extends("admin.layouts.main")
@section('title', 'Новая страница')
@section("content")

    <h1 class="h3 mb-2 text-gray-800 mt-4">Новая страница</h1>
    <div class="row mt-2">
        <div class="col-10">
            <form class="shadow page-form" action="{{ route("admin.pages.update", $page->id) }}" method="post">
                @csrf
                @method("PUT")
                <div class="row">
                    <label class="" for="title"><h4 class="text-primary">Заголовок</h4></label>
                    <input required type="text" class="form-control" name="title" id="title" value="{{ $page->title }}">
                </div>
                <div class="row mt-3">
                    <label for="category_id"><h4 class="text-primary">Категория</h4></label>
                    <select required class="form-control" name="category_id" id="category_id">
                        <option value=""></option>
                        @foreach($categories as $oneCategory)
                            <option @if($page->category_id === $oneCategory->id) selected @endif value="{{ $oneCategory->id }}">{{ $oneCategory->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mt-3">
                    <label for="body"><h4 class="text-primary">Текст</h4></label>
                    <x-admin.editor-buttons></x-admin.editor-buttons>
                    <textarea required name="body" id="body" rows="20" class="body form-control">{{ $page->body }}</textarea>
                </div>
                <div class="row mt-3">
                    <button type="submit" class="btn btn-rnd btn-success">Применить</button>
                </div>
            </form>
        </div>
    </div>
    <x-admin.editor-modal></x-admin.editor-modal>
@endsection
@section("scripts")
    <script src="{{ asset("js/admin/pages.js") }}"></script>
    <script src="{{ asset("js/admin/editor.js") }}"></script>
@endsection

