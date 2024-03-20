<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $empleados = Empleado::where('NOMBRE_ROL', 'LIKE', '%' . $busqueda . '%')
            ->latest('ID_ROL')
            ->paginate(3);
        
        $mensaje = 'La búsqueda se realizó correctamente.';
    
        return view('empleado.index', compact( 'empleados', 'busqueda', 'mensaje'));
    }


    public function pdf()
    {
        $empleados = Empleado::all();
        $pdf = Pdf::loadView('empleado.pdf', compact('empleados'));
        //return $pdf->stream();
        return $pdf->download('Reporte_Roles'.time().'.pdf');
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
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
            'FECHA_NA_ROL' => 'required|date|before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d') . '|after_or_equal:' . Carbon::now()->subYears(50)->format('Y-m-d'),
            'NOMBRE' => 'required|string|max:255',
            'NOMBRE_ROL' => 'required|string|max:255'
        ]);
    
        $empleado = new empleado;
        $empleado->FECHA_NA_ROL=$request->input('FECHA_NA_ROL');
        $empleado->NOMBRE=$request->input('NOMBRE');
        $empleado->NOMBRE_ROL=$request->input('NOMBRE_ROL');
        $empleado->save();
        return redirect()->route('empleado.index')
                        ->with('success', '¡EXITOSO! El Rol se  ha Registrado correctamente.');
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
        $empleado = empleado::find($id);
        return view('empleado.edit',compact('empleado'));
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
            'FECHA_NA_ROL' => ['required', 'date', 'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d')],
            'NOMBRE' => 'required|string|max:255',
            'NOMBRE_ROL' => 'required|string|max:255'
            ]);
        
            $empleado = empleado::find($id);
            $empleado->FECHA_NA_ROL=$request->input('FECHA_NA_ROL');
            $empleado->NOMBRE=$request->input('NOMBRE');
            $empleado->NOMBRE_ROL=$request->input('NOMBRE_ROL');
            $empleado->save();
            return redirect()->route('empleado.index')
                            ->with('success', '¡EXITOSO! El Rol se  ha Actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect()
               ->route('empleado.index')
               ->with('danger','¡EXITOSO! El Rol se ha Anulado correctamente.');
    }
}
