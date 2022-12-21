@extends("admin.layouts.main")
@section('title', 'Список страниц')
@section("content")

    <h1 class="h3 mb-2 text-gray-800 mt-4">Список страниц</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if(empty($widgets) || count($widgets) === 0)
                <h6 class="m-0 font-weight-bold text-primary">Виджеты отсутствуют</h6>
            @endif
            <a href="{{ route("admin.widgets.create") }}"
               class="btn btn-success btn-rnd @if(empty($widgets) || count($widgets) === 0) mt-3 @endif">
                Добавить виджет
            </a>
        </div>
        <div class="card-body">
            @if(!empty($widgets) && count($widgets) > 0)
                <div class="table-responsive col-md-8">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Имя</th>
                            <th>Действие</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($widgets as $widget)
                            <tr class="table-item">
                                <td data-id="{{ $widget->id }}" class="td-title col-md-6"><a
                                        href="{{ route("admin.widgets.edit", $widget->id) }}">{{ $widget->title }}</a>
                                </td>
                                <td class="delete-icon col-md-2" data-id="{{ $widget->id }}">
                                    <button type="button" class="delete-item btn btn-rnd btn-outline-danger">
                                        <i class="fa fa-solid fa-circle-xmark"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $widgets->onEachSide(5)->links() }}
            @endif
        </div>
    </div>
@endsection
@section("scripts")
    <script src="{{ asset("js/admin/widgets.js") }}"></script>
@endsection

