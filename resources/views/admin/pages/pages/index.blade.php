@extends("admin.layouts.main")
@section('title', 'Список страниц')
@section("content")

    <h1 class="h3 mb-2 text-gray-800 mt-4">Список Страниц</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if(empty($pages) || count($pages) === 0)
                <h6 class="m-0 font-weight-bold text-primary">Страницы отсутствуют</h6>
            @endif
            <a href="{{ route("admin.pages.create") }}"
               class="btn btn-success btn-rnd @if(empty($pages) || count($pages) === 0) mt-3 @endif">
                Создать новую
            </a>
        </div>
        <div class="card-body">
            @if(!empty($pages) && count($pages) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Slug</th>
                            <th>Категория</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Заголовок</th>
                            <th>Slug</th>
                            <th>Категория</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($pages as $page)
                            <tr class="table-item">
                                <td data-id="{{ $page->id }}" class="td-title"><a
                                        href="{{ route("admin.pages.edit", $page->id) }}">{{ $page->title }}</a></td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ $page->category->title }}</td>
                                <td>{{ $page->created_at }}</td>
                                <td class="delete-icon" data-id="{{ $page->id }}">
                                    <button type="button" class="delete-item btn btn-rnd btn-outline-danger"><i
                                            class="fa fa-solid fa-circle-xmark"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $pages->onEachSide(5)->links() }}
            @endif
        </div>
    </div>
@endsection
@section("scripts")
    <script src="{{ asset("js/admin/pages.js") }}"></script>
@endsection

