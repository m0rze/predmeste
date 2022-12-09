@extends("admin.layouts.main")
@section('title', 'Список категорий')
@section("content")


        <!-- Main Content -->


        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 mt-4">Список категорий</h1>
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                @if(empty($categories))
                    <h6 class="m-0 font-weight-bold text-primary">Категории отсутствуют</h6>
                @endif
                <a class="btn btn-success btn-rnd @if(empty($categories)) mt-3 @endif"
                   href="{{ route("admin.categories.create") }}">Создать новую</a>
            </div>
            <div class="card-body">
                @if(!empty($categories))
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Slug</th>
                                <th>Дата</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Заголовок</th>
                                <th>Slug</th>
                                <th>Дата</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($categories as $category)
                                <tr class="table-item">
                                    <td data-id="{{ $category->id }}"></td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

@endsection
