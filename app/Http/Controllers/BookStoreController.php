<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class BookStoreController extends Controller
{
    public function showList()
    {
        $data = Http::acceptJson()->get('http://localhost/books-store/public/api/books')->json();

        $data = array_map(
            fn ($b) => (object) $b,
            $data['data']
        );


        $books = collect($data)->sortBy('title');

        return view('book-store.list', ['books' => $books]);
    }

    public function showBook($id)
    {

        $data = Http::acceptJson()->get('http://localhost/books-store/public/api/book/show' . $id . '?one')->json();
        $book = (object) $data['data'][0];

        foreach ($book->photos  as &$photo) {
            $photo = (object) $photo;
        }
        foreach ($book->tags  as &$tag) {
            $tag = (object) $tag;
        }

        return view('book-store.one', ['book' => $book]);
    }
}
