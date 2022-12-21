@extends("admin.layouts.main")
@section('title', 'Новый виджет')
@section("content")

    <h1 class="h3 mb-2 text-gray-800 mt-4">Новый виджет</h1>
    <div class="row mt-2">
        <div class="col-10">
            <form class="shadow page-form" action="{{ route("admin.widgets.store") }}" method="post">
                @csrf
                <div class="row">
                    <label class="" for="title"><h4 class="text-primary">Имя виджета</h4></label>
                    <input required type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="row mt-3">
                    <label for="body"><h4 class="text-primary">Код виджета</h4></label>
                    <textarea required name="body" id="body" rows="20" class="body form-control">{{ old('body') }}</textarea>
                </div>
                <div class="row mt-3">
                    <button type="submit" class="btn btn-rnd btn-success">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("scripts")
@endsection

