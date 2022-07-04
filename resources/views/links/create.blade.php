@extends('layouts.app')

@section('title')
    Создать ссылку
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('link'))
        <div class="alert alert-success">
            <a href="{{ session('link')['uuid'] }}">Сокращенная ссылка</a> для сайта {{ session('link')['link'] }} создана.
        </div>
    @endif

    <form action="{{ route('links.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Ссылка:</label>
                    <div class="col-sm-10">
                        <input name="link" type="form-control" class="form-control" id="link" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Лимит переходов:</label>
                    <div class="col-sm-10">
                        <input name="enter_limit" type="number" class="form-control" id="enter_limit" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Время жизни ссылки (в часах):</label>
                    <div class="col-sm-10">
                        <input name="expired_at" type="number" class="form-control" max="24" min="1" id="expired_at" value="1">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-lg-right">Создать ссылку</button>
            </div>
        </div>
    </form>
    <br>
@endsection
