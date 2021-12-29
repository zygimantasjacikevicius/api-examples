@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Books store</h1>
                    
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                    @foreach ($books as $book)
                    <div class="col-md-4">  
                        <div class="book">
                            <div class="book__title">
                                <a href="{{route('books_store_show_book', $book->id)}}">{{$book->title}}</a>
                            </div>
                            
                            <div class="book__author">
                                {{$book->author_id}}
                            </div>
                            <div class="book__image">
                                <div class="book__image__img">
                                <img src="{{$book->photo ?? asset('img/no-image.png')}}" alt="">
                            </div>
                        </div>
                            <div class="book__about">
                                {{$book->about}}
                            </div>
                            
                            <div class="book__info">
                                <div>Pages: {{$book->pages}}</div>
                                <div>ISBN: {{$book->isbn}}</div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection