<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtenemos listado  de categorias DB::table('categorias')->get()
        //$categorias = Categoria::all();
        $categorias = Categoria::paginate(4);
        return view('categorias', ['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoriaCreate');
    }

    private function validarForm(Request $request)
    {
        $request->validate(
            ['catNombre'=>'required|unique:categorias,catNombre|min:2|max:30'],
            [
                'catNombre.required'=>'El campo "Nombre de la Categoria" es obligatorio.',
                'catNombre.min'=>'El campo "Nombre de la Categoria" debe tener al menos dos caracteres.',
                'catNombre.max'=>'El campo "Nombre de la Categoria" debe tener 30 caracteres como máximo.',
                'catNombre.unique'=>'No puede haber dos categorias con el mismo nombre.'
            ]
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //validar
        $this->validarForm( $request );
        /*si no valida a: se genera una variable $errors
                        b: redirección al form*/
        try {
            //Instanciamos
            $Categoria = new Categoria;
            //Asignamos atributos
            $Categoria->catNombre = $catNombre = $request->catNombre;
            //Lo guardamos en la tabla
            $Categoria->save();

            //Listo! Redirección con Mensaje Ok!
            return redirect('/categorias')
                            -> with(['mensaje' => 'Categoria: ' . $catNombre . ' agregada correctamente.']);
        } catch (\Throwable $th){
            return redirect('/categorias')
                ->with(['mensaje' => 'No se pudo agregar la categoria.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        //Obtenemos los datos de las categorias filtradas por su Id
        $Categoria = Categoria::find($id);
        return view('categoriaEdit', [ 'Categoria' => $Categoria ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validación
        $this->validarForm($request);
        try {
            //Obtenemos los datos de la categoria a modificar
            $Categoria = Categoria::find($request->idCategoria);
            //Le asignamos los nuevos atributos
            $Categoria->catNombre = $catNombre = $request->catNombre;
            //Guardamos los cambios
            $Categoria->save();
            //Redirección con mensaje Ok
            return redirect('/categorias')
                        ->with(['mensaje' => 'La categoria "' . $catNombre . '" ha sido modificada correctamente.']);
        }catch (\Throwable $th)
        {
            //throw $th;
            return redirect('/categorias')
                        ->with(['mensaje' => 'No se pudo modificar la categoria']);
        }
    }

    private function checkProducto( $idCategoria)
    {
        $check = Producto::where('idCategoria', $idCategoria)->count();
        return $check;
    }

    public function confirm( $id )
    {
        //Obtenemos los datos de la categoría, filtrados por su $id
        $Categoria = Categoria::find($id);
        //Si no hay Productos relacionados a esta categoria
        if ($this->checkProducto($id) == 0){
            return view('categoriaDelete', [ 'Categoria' => $Categoria]);
        }
        //ELSE
            return redirect('/categorias')
                        ->with(
                            [
                                'clase'=>'warning',
                                'mensaje'=>'No se puede eliminar la
                                categoria ' . $Categoria->catNombre. ' ya que tiene productos relacionados.'
                            ]
                        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $Categoria = Categoria::destroy($request->idCategoria);
            //Redirecciono con Mensaje Ok
            return redirect('/categorias')
                    ->with(['mensaje'=>'Categoría "' . $request->catNombre . '" eliminada correctamente']);
        }catch(\Throwable $th)
        {
            //throw $th;
            return redirect('/categorias')
                    ->with(['mensaje' => 'No se pudo eliminar la categoria seleccionada']);
        }
    }
}
