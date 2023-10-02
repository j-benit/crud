<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Correo;
use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * Class CorreoController
 * @package App\Http\Controllers
 */
class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correo = Correo::paginate();

return view('correo.index', compact('correo'))
    ->with('i', (request()->input('page', 1) - 1) * $correo->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $correo = new Correo();
        $categorias = categoria::pluck('nombre','id');
        return view('correo.create', compact('correo','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Correo::$rules);

        $correo = Correo::create($request->all());

        return redirect()->route('correo.index')
            ->with('success', 'Correo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $correo = Correo::find($id);

        return view('correo.show', compact('correo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $correo = Correo::find($id);

        return view('correo.edit', compact('correo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Correo $correo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Correo $correo)
    {
        request()->validate(Correo::$rules);

        $correo->update($request->all());

        return redirect()->route('Correo.index')
            ->with('success', 'Correo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
   

    public function destroy($id)
{
    $correo = Correo::find($id);

    if ($correo) {
        $correo->delete();
        return redirect()->route('correo.index')
            ->with('success', 'Correo deleted successfully');
    } else {
        return redirect()->route('correo.index')
            ->with('error', 'Correo not found');
    }
}
}
