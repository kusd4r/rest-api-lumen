<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function index()
    {
        $menus = Menu::OrderBy("id", "DESC")->paginate(10);

        $outPut = [
            "massage" => "menus",
            "results" => $menus
        ];

        return response()->json($menus, 200);
    }
    //create data
    public function store(Request $request)
    {
        $this->validate($request, [
            "kode_baju" => "required",
            "deskripsi" => "required",
            "jenis" => "required",
            "harga" => "required",
            "kode_celana" => "required",
            // "user_id" => "required|exists:users,id"
        ]);

        $menus = Menu::create([
            'kode_baju' => $request->input('kode_baju'),
            'deskripsi' =>  $request->input('deskripsi'),
            'jenis' =>  $request->input('jenis'),
            'harga' =>  $request->input('harga'),
            'kode_celana' =>  $request->input('kode_celana'),
        ]);

        return response()->json($menus, 200);
    }

    //menampilkan data per id/ read detail
    public function show($id)
    {
        $menus = Menu::find($id);

        if (!$menus) {
            abort(404);
        }
        return response()->json($menus, 200);

        }

    ///fungs updaet data
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $menus = Menu::find($id);

        if (!$menus) {
            abort(404);
        }

        $menus->fill($input);
        $menus->save();

        return response()->json($menus,200);
    }

    ///fungs delete data
    public function destroy($id)
    {
        $menus = Menu::find($id);

        if (!$menus) {
            abort(404);
        }

        $menus->delete();
        $message = ['message' => 'deleted successfully', '$menu_id' => $id];

        return response()->json($message,200);
    }

}
