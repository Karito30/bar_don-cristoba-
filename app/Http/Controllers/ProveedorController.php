<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\ProveedorCreadoNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        
        $this->middleware('permission:proveedor.excel_proveedor', ['only' => ['excelProveedor']]);
        
    }

    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $proveedores = Proveedor::where('NOMBRE_PROVEEDOR', 'LIKE', '%' . $busqueda . '%')
        ->orWhere('ID_ROL_FK_PROVEEDOR', 'LIKE', '%' . $busqueda . '%')
             ->latest('ID_PROVEEDOR')
            ->paginate(3);
        $data = [
        'proveedores' => $proveedores, 
        'busqueda' => $busqueda, 
        ];
       return view('proveedor.index', $data);
    }

    public function pdf()
    {
        $proveedor= Proveedor::all();
        $pdf = Pdf::loadView('proveedor.pdf', compact('proveedor'));
        //return $pdf->stream();
        return $pdf->download('Reporte_Proveedor'.time().'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = empleado::all();
        return view('proveedor.create',compact('empleado'));
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
            'NOMBRE_PROVEEDOR' => 'required',
            'DIRECCION_PROVEEDOR' => 'required',
            'TEL_PROVEEDOR' => 'required',
            'ID_ROL_FK_PROVEEDOR' => 'required|exists:rol,NOMBRE', 
        ]);


        $proveedor = new proveedor;
        $proveedor->NOMBRE_PROVEEDOR=$request->NOMBRE_PROVEEDOR;
        $proveedor->DIRECCION_PROVEEDOR=$request->DIRECCION_PROVEEDOR;
        $proveedor->TEL_PROVEEDOR=$request->TEL_PROVEEDOR;
        $proveedor->ID_ROL_FK_PROVEEDOR=$request->ID_ROL_FK_PROVEEDOR;
        $proveedor->save();
        return redirect()->route('proveedor.index')
                         ->with('success', '¡EXITOSO! El proveedor se ha creado correctamente.');
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
        $empleado = empleado::all();
        $proveedor = proveedor::find($id);
        $data = [
            'proveedor'=>$proveedor,
        ];
        return view('proveedor.edit',$data, compact( 'empleado'));
        
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
            'NOMBRE_PROVEEDOR' => 'required',
            'DIRECCION_PROVEEDOR' => 'required',
            'TEL_PROVEEDOR' => 'required',
            'ID_ROL_FK_PROVEEDOR' => 'required|exists:rol,NOMBRE', 
        ]);

        $proveedor = proveedor::find($id);
        $proveedor->NOMBRE_PROVEEDOR=$request->NOMBRE_PROVEEDOR;
        $proveedor->DIRECCION_PROVEEDOR=$request->DIRECCION_PROVEEDOR;
        $proveedor->TEL_PROVEEDOR=$request->TEL_PROVEEDOR;
        $proveedor->ID_ROL_FK_PROVEEDOR=$request->ID_ROL_FK_PROVEEDOR;
        $proveedor->save();
        return redirect()->route('proveedor.index')
                         ->with('success', '¡EXITOSO! El proveedor se ha Actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = proveedor::find($id);
        $proveedor->delete();
        return redirect()
               ->route('proveedor.index')
               ->with('danger','¡EXITOSO! El proveedor se ha Anulado correctamente.');
    }
  
}
