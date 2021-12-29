<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OutfitController extends Controller
{
    public function showList()
    {
        $data = Http::acceptJson()->get('http://localhost/books-store/public/api/outfits')->json();

        $data = array_map(
            fn ($o) => (object) $o,
            $data['data']
        );
        $outfits = collect($data)->sortBy('type');

        return view('outfits.list', ['outfits' => $outfits]);
    }

    public function showOutfit($id)
    {
        $data = Http::acceptJson()->get('http://localhost/books-store/public/api/outfit/show' . $id . '?one')->json();
        $outfit = (object) $data['data'][0];

        foreach ($outfit->photos  as &$photo) {
            $photo = (object) $photo;
        }
        foreach ($outfit->tags  as &$tag) {
            $tag = (object) $tag;
        }

        return view('outfits.one', ['outfit' => $outfit]);
    }
}
