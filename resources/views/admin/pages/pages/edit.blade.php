@extends("admin.layouts.main")
@section('title', 'Редактировать страницу '.$page->title)
@section("content")

    <h1 class="h3 mb-2 text-gray-800 mt-4">Редактировать страницу {{ $page->title }}</h1>
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
                    @if(!empty($page->category_id))
                        <label for="category_id"><h4 class="text-primary">Категория</h4></label>
                        <select required class="form-control" name="category_id" id="category_id"
                    @else
                             <label for="static_place_id"><h4 class="text-primary">Место расположения на странице</h4></label>
                                <select required class="form-control" name="static_place_id" id="static_place_id">
                    @endif
                         <option value=""></option>
                         @foreach($selectData as $oneData)
                              <option @if($oneData->id === $page->category_id || $oneData->id === $page->static_place_id) selected @endif value="{{ $oneData->id }}">{{ $oneData->title }}</option>
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

