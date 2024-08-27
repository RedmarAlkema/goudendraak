<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Exception;

class WebsiteController extends Controller
{
    public function menu(Request $request)
    {
        try {
            $query = Menu::query();
            $likedIds = session('liked', []);

            if ($request->has('search')) {
                $query->where('naam', 'like', '%' . $request->input('search') . '%');
            }

            if ($request->has('filter')) {
                if ($request->input('filter') == 'liked') {
                    $query->whereIn('id', $likedIds);
                } elseif ($request->input('filter') == 'not_liked') {
                    $query->whereNotIn('id', $likedIds);
                }
            }

            if ($request->has('sort')) {
                $sort = $request->input('sort');
                if ($sort === 'liked') {
                    if (!empty($likedIds)) {
                        $query->orderByRaw('FIELD(id, ' . implode(',', $likedIds) . ') DESC');
                    }
                } elseif ($sort === 'alphabetical') {
                    $query->orderBy('naam', 'asc');
                } elseif ($sort === 'price_asc') {
                    $query->orderBy('price', 'asc');
                } elseif ($sort === 'price_desc') {
                    $query->orderBy('price', 'desc');
                }
            }

            $menu = $query->paginate(20)->appends([
                'search' => $request->input('search'),
                'filter' => $request->input('filter'),
                'sort' => $request->input('sort')
            ]);

            return view('paginas.menu', compact('menu'));

        } catch (Exception $e) {
            \Log::error('Fout in de menu-functie: ' . $e->getMessage());
            return response()->view('errors.general', [], 500);
        }
    }

    public function toggleLike($id)
    {
        try {
            $liked = Session::get('liked', []);

            if (in_array($id, $liked)) {
                $liked = array_diff($liked, [$id]);
            } else {
                $liked[] = $id;
            }

            Session::put('liked', $liked);

            return redirect()->back();
        } catch (Exception $e) {
            \Log::error('Fout in de toggleLike-functie: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is iets misgegaan bij het toggelen van de like.');
        }
    }

    public function likedItems()
    {
        try {
            $liked = Session::get('liked', []);
            $menu = Menu::whereIn('id', $liked)->get();

            return view('paginas.liked', compact('menu'));
        } catch (Exception $e) {
            \Log::error('Fout in de likedItems-functie: ' . $e->getMessage());
            return response()->view('errors.general', [], 500);
        }
    }
}
