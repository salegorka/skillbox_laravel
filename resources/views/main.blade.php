@extends('base')
@section('title')
    Блог Laravel - Главная
@endsection
@section('main')
<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                Статьи
            </h3>

            @foreach ($articles as $article)
                <div class="blog-post">
                    <h2 class="blog-post-title">{{$article->name}}</h2>
                    <p class="blog-post-meta">{{$article->created_at}}</p>
                    <p>{{$article->short_description}}</p>
                    <a href="/articles/{{$article->slug}}">Читать далее</a>
                </div><!-- /.blog-post -->
            @endforeach
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        @include('sections.sidebar')

    </div><!-- /.row -->

</main><!-- /.container -->
@endsection
