@extends("admin.layouts.main")
@section('title', 'Список категорий')
@section("content")

    <h1 class="h3 mb-2 text-gray-800 mt-4">Список категорий</h1>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            @if(empty($categories) || count($categories) === 0)
                <h6 class="m-0 font-weight-bold text-primary">Категории отсутствуют</h6>
            @endif
            <button type="button" class="new-cat-button btn btn-success btn-rnd @if(empty($categories) || count($categories) === 0) mt-3 @endif">
                Создать новую
            </button>
        </div>
        <div class="card-body">
            @if(!empty($categories) && count($categories) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Slug</th>
                            <th>Количество страниц</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Заголовок</th>
                            <th>Slug</th>
                            <th>Количество страниц</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($categories as $category)
                            <tr class="table-item">
                                <td data-id="{{ $category->id }}" class="td-title">{{ $category->title }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->pages_count }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td class="delete-icon" data-id="{{ $category->id }}"><button type="button" class="delete-item btn btn-rnd btn-outline-danger"><i class="fa fa-solid fa-circle-xmark"></i></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories->onEachSide(5)->links() }}
            @endif
        </div>
    </div>
@endsection
@section("modals")
    <div class="new-cat-modal shadow deactivated">
        <input type="hidden" class="cat_id">
        <div class="row">
            <div class="col-10"></div>
            <div class="col-2"><button class="close-modal btn btn-primary float-right mt-2 mr-2" type="button"><i class="fa fa-solid fa-circle-xmark"></i></button></div>
        </div>
        <div class="row new-cat-items">
            <div class="row errors">
                <div class="col-2"></div>
                <div class="col-8 error-text deactivated">

                </div>
            </div>
            <div class="row mt-2">
                <label for="cat_name">Имя категории</label>
                <input id="cat_name" class="cat_name form-control" name="cat_name" type="text">
            </div>
            <div class="row mt-4">
                <button type="button" class="add-cat-button btn btn-rnd btn-success">Добавить</button>
            </div>
        </div>
    </div>
    <input type="hidden" class="token" value="{{ $token }}">
@endsection
@section("scripts")
    <script src="{{ asset("js/admin/categories.js") }}"></script>
@endsection

