@extends('base')
@section('title')
    Блог Laravel - {{$article->name}}
@endsection
@section('main')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">

                <h2 class="blog-post-title">{{$article->name}}</h2>
                <p class="blog-post-meta">{{$article->created_at}}</p>
                <p>{{$article->description}}</p>
                <a href="/">Вернуться на главную</a>
            </div><!-- /.blog-main -->

            @include('sections.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
