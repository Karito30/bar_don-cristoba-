<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $productos = Producto::where('NOM_PRODUCTO', 'LIKE', '%' . $busqueda . '%')
             ->orWhere('CATEGORIA_PRODUCTO', 'LIKE', '%' . $busqueda . '%')
             ->latest('ID_PRODUCTO')
            ->paginate(3);
        $data = [
        'productos' => $productos, 
        'busqueda' => $busqueda, 
        ];
       return view('producto.index', $data);
    }

    public function pdf()
    {
        $producto= Producto::all();
        $pdf = Pdf::loadView('producto.pdf', compact('producto'));
        //return $pdf->stream();
        return $pdf->download('Reporte_Producto'.time().'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = proveedor::all();
        return view('producto.create', compact('proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NOM_PRODUCTO' => 'required|max:50',
            'VALOR_PRODUCTO' => 'required|numeric|min:1',
            'CATEGORIA_PRODUCTO' => 'required|max:50',
            'CANT_PRODUCTO' => 'required|numeric|min:1',
            'ID_PROVEEDOR_FK_PRODUCTO' => 'required|exists:proveedor,NOMBRE_PROVEEDOR',
        
        ]);

        $producto =  new producto();
        $producto->NOM_PRODUCTO=$request->NOM_PRODUCTO;
        $producto->VALOR_PRODUCTO=$request->VALOR_PRODUCTO;
        $producto->CATEGORIA_PRODUCTO=$request->CATEGORIA_PRODUCTO;
        $producto->CANT_PRODUCTO=$request->CANT_PRODUCTO;
        $producto->ID_PROVEEDOR_FK_PRODUCTO=$request->ID_PROVEEDOR_FK_PRODUCTO;
        $producto->save();
        return redirect()->route('producto.index')
      ->with('success','¡EXITOSO! El producto se  ha Registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = producto::find($id);
        $proveedor = proveedor::all();
        return view('producto.edit',compact('producto','proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NOM_PRODUCTO' => 'required|max:50',
            'VALOR_PRODUCTO' => 'required|numeric|min:1',
            'CATEGORIA_PRODUCTO' => 'required|max:50',
            'CANT_PRODUCTO' => 'required|numeric|min:1',
            'ID_PROVEEDOR_FK_PRODUCTO' => 'required|exists:proveedor,NOMBRE_PROVEEDOR',
        
        ]);

        $producto = producto::find($id);
        $producto->NOM_PRODUCTO=$request->NOM_PRODUCTO;
        $producto->VALOR_PRODUCTO=$request->VALOR_PRODUCTO;
        $producto->CATEGORIA_PRODUCTO=$request->CATEGORIA_PRODUCTO;
        $producto->CANT_PRODUCTO=$request->CANT_PRODUCTO;
        $producto->ID_PROVEEDOR_FK_PRODUCTO=$request->ID_PROVEEDOR_FK_PRODUCTO;
        $producto->save();
        return redirect()->route('producto.index')
      ->with('success','¡EXITOSO! El producto se  ha Actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = producto::find($id);
        $producto->delete();
        return redirect()
               ->route('producto.index')
               ->with('danger','¡EXITOSO! La venta se ha Anulado correctamente.');
    }
}
