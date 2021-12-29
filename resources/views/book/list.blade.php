@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Books store</h1>
                    <div class="front-sort">
                        <form action="{{route('books')}}" method="get">
                        <div class="form-group">
                            
                        <label for="">Sort by</label>
                        <select class="form-control" name="sort">
                            
                            <option value="title">Title</option>
                            <option value="price_asc" @if ('price_asc' == $select) selected @endif>Price from lowest</option>
                            <option value="price_desc" @if ('price_desc' == $select) selected @endif>Price from highest</option>
                            
                          </select>
                          <button type="submit" class="btn btn-secondary">Sort</button>
                        
                        </div>
                    </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                    @foreach ($books as $book)
                    <div class="col-md-4">  
                        <div class="book">
                            <div class="book__title">
                                {{$book->title}}
                            </div>
                            <div class="book__cat">
                                {{$book->cat}}
                            </div>   
                            <div class="book__image">
                                <img src="{{$book->img}}" alt="">
                            </div>
                            <div class="book__author">
                                {{$book->author}}
                            </div>
                            <div class="book__price">
                                <span>{{$book->price}} Eur</span>
                                <button class="btn btn-success">Buy</button>
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