@extends('base')
@section('title')
    Блог Laravel - Контакты
@endsection
@section('main')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">

                @if (isset($success))
                    <div class="alert alert-danger">
                        {{$success}}
                    </div>
                @else
                    <h1>Форма для отправки отзывов</h1>
                    <form method="POST" action="/contacts">
                        @csrf
                        <div class="mb-3">
                            <label for="InputEmail" class="form-label">Электронная почта</label>
                            <input type="text" class="form-control" id="InputEmail" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="TextareaMessage" class="form-label">Ваше сообщение</label>
                            <textarea class="form-control" id="TextareaMessage" name="message" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                @endif

            </div>
        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection
