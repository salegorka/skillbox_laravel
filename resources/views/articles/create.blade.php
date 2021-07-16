@extends('base')
@section('title')
    Блог Laravel - Создать статью
@endsection
@section('main')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="/articles">
                    @csrf
                    <div class="mb-3">
                        <label for="InputSlug" class="form-label">Cимвольный код статьи</label>
                        <input type="text" class="form-control" id="InputSlug" name="slug">
                    </div>
                    <div class="mb-3">
                        <label for="InputName" class="form-label">Название статьи</label>
                        <input type="text" class="form-control" id="InputName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="TextareaShortDescription" class="form-label">Краткое описание</label>
                        <textarea class="form-control" id="TextareaShortDescription" name="short-description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="TextareaDescription" class="form-label">Детальное описание</label>
                        <textarea class="form-control" id="TextareaDescription" name="description" rows="5"></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="CheckPublished" name="published">
                        <label class="form-check-label" for="CheckPublished">Опубликовано</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать статью</button>
                </form>
            </div>

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
