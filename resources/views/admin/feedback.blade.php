@extends('base')
@section('title')
    Блог Laravel - Список отзывов
@endsection
@section('main')
    <main role="main" class="container">
        <div class="row">
                <div class="col-md-8 blog-main">

                    <table>
                        <tr>
                            <td>Дата</td>
                            <td>Email</td>
                            <td>Сообщение</td>
                        </tr>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>{{$feedback->email}}</td>
                                <td>{{$feedback->created_at}}</td>
                                <td>{{$feedback->message}}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div><!-- /.row -->
    </main><!-- /.container -->
@endsection
