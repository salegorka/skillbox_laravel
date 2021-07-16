@extends('base')
@section('title')
    Блог Laravel - О нас
@endsection
@section('main')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">

                <p>Проект на курсе PHP разработчик часть 3. Домашнее задание 3</p>

            </div><!-- /.blog-main -->

            @include('sections.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
