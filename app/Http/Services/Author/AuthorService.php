<?php


namespace App\Http\Services\Author;


use App\Models\Author;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthorService
{
    public function getAuthor()
    {
        return Author::where('active', 1)->get();
    }

    public function show()
    {
        return Author::select('name_author', 'id')
            ->orderbyDesc('id')
            ->get();
    }

    public function getAll()
    {
        return Author::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {
            Author::create([
                'name_author' => (string)$request->input('name_author'),
                'active' => (string)$request->input('active')
            ]);

            Session::flash('success', 'Complete Create Author');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $menu): bool
    {
        $menu->name_author = (string)$request->input('name_author');
        $menu->active = (string)$request->input('active');
        $menu->save();

        Session::flash('success', 'Complete Update Author');
        return true;
    }

    public function delete($request)
    {
        $author = Author::where('id', $request->input('id'))->first();
        if ($author) {
            $author->delete();
            return true;
        }
        return false;
    }


    public function getId($id)
    {
        return Author::where('id', $id)->where('active', 1)->firstOrFail();
    }

    // public function getProduct($menu, $request)
    // {
    //     $query = $menu->products()
    //         ->select('id', 'name_author')
    //         ->where('active', 1);

    //     if ($request->input('price')) {
    //         $query->orderBy('price', $request->input('price'));
    //     }

    //     return $query
    //         ->orderByDesc('id')
    //         ->paginate(12)
    //         ->withQueryString();
    // }
}
