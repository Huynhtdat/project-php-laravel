<?php


namespace App\Http\Services\Publisher;


use App\Models\Publisher;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PublisherService
{
    public function getPublisher()
    {
        return Publisher::where('active', 1)->get();
    }

    public function show()
    {
        return Publisher::select('name_publisher', 'id')
            ->orderbyDesc('id')
            ->get();
    }

    public function getAll()
    {
        return Publisher::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {
            Publisher::create([
                'name_publisher' => (string)$request->input('name_publisher'),
                'active' => (string)$request->input('active')
            ]);

            Session::flash('success', 'Complete Create Publisher');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $menu): bool
    {
        $menu->name_publisher = (string)$request->input('name_publisher');
        $menu->active = (string)$request->input('active');
        $menu->save();

        Session::flash('success', 'Complete Update Publisher');
        return true;
    }

    public function delete($request)
    {
        $publisher = Publisher::where('id', $request->input('id'))->first();
        if ($publisher) {
            $publisher->delete();
            return true;
        }
        return false;
    }


    public function getId($id)
    {
        return Publisher::where('id', $id)->where('active', 1)->firstOrFail();
    }


}
