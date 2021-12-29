@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{$outfit->type}}</h1>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="book">
                                <div class="book__author">
                                    {{$outfit->brand_id}}
                                </div>
                                <div class="book__images">
                                    @forelse ($outfit->photos as $photo)
                                    <div class="book__images__img">
                                        <img src="{{$photo->photo}}">
                                    </div>
                                    @empty
                                    <div class="book__images__img">
                                        <img src="{{asset('img/no-image.png')}}">
                                    </div>
                                    @endforelse
                                </div>
                                <div class="book__tags">
                                    @forelse ($outfit->tags as $tag)
                                    <div class="book__tags__tag">
                                        <span class="badge rounded-pill badge-info">#{{$tag->name}}</span>
                                    </div>
                                    @empty
                                    <h3>No tags</h3>
                                    @endforelse
                                </div>
                                <div class="book__info">
                                    <div><b>Price:</b> {{$outfit->price}}</div>
                                    <div><b>Discount:</b> {{$outfit->discount}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection