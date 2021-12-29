<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showList(Request $request)
    {
        $data = Http::acceptJson()->get('https://in3.dev/knygos/types')->json();
        $cats = [];
        foreach ($data as $cat) {
            $cats[$cat['id']] = $cat['title'];
        }

        $data = Http::acceptJson()->get('https://in3.dev/knygos/')->json();

        $data = array_map(
            function ($b) use ($cats) {
                $b['cat'] = $cats[$b['type']];
                return (object) $b;
            },
            $data
        );

        $books = collect($data)->sortBy('title');

        if ($request->sort && $request->sort == 'price_asc') {

            $books = $books->sortBy('price');
            $select = 'price_asc';
        } else if ($request->sort && $request->sort == 'price_desc') {

            $books = $books->sortByDesc('price');
            $select = 'price_desc';
        }

        return view('book.list', [
            'books' => $books,
            'select' => $select ?? 'default'
        ]);
    }
}
