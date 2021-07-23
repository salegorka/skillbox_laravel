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
                    @include('forms.articles')
                    <button type="submit" class="btn btn-primary">Создать статью</button>
                </form>
            </div>

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
