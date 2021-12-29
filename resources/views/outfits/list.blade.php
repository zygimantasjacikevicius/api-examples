@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Outfits store</h1>
                    
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                    @foreach ($outfits as $outfit)
                    <div class="col-md-4">  
                        <div class="book">
                            <div class="book__title">
                                <a href="{{route('outfits_show_outfit', $outfit->id)}}">{{$outfit->type}}</a>
                            </div>
                            
                            <div class="book__author">
                                {{$outfit->brand_id}}
                            </div>
                            <div class="book__image">
                                <div class="book__image__img">
                                    <img src="{{$outfit->photo ?? asset('img/no-image.png')}}" alt="">
                                </div>
                            </div>
                            <div class="book__about">
                                {{$outfit->color}}
                            </div>
                            
                            <div class="book__info">
                                <div>Price: {{$outfit->price}}</div>
                                <div>Discount: {{$outfit->discount}}</div>
                                <div>Final price: {{$outfit->final_price}}</div>
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