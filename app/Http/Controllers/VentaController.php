<?php

namespace App\Http\Controllers;

use App\Events\VentaEvent;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Empleado;
use App\Models\Producto;
use Illuminate\Contracts\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Ventas;
use App\Models\User;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:venta.create', ['only' => ['create']]);
        $this->middleware('permission:venta.edit', ['only' => ['edit']]);
        $this->middleware('permission:venta.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:venta.excel_venta', ['only' => ['excelVenta']]);
        $this->middleware('permission:venta.pdf', ['only' => ['pdf']]);
    }

    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $ventas = Venta::where('MESA', 'LIKE', '%' . $busqueda . '%')
        ->orWhere('ID_ROL_FK_VENTA', 'LIKE', '%' . $busqueda . '%')
        ->orWhere('ID_PRODUCTO_FK_VENTA', 'LIKE', '%' . $busqueda . '%')
             ->latest('ID_VENTA')
            ->paginate(3);
        $data = [
        'ventas' => $ventas, 
        'busqueda' => $busqueda, 
        ];
       return view('venta.index', $data);
    }
    public function pdf()
    {
        $ventas = Venta::all();
        $pdf = Pdf::loadView('venta.pdf', compact('ventas'));
        //return $pdf->stream();
        return $pdf->download('Reporte_Venta'.time().'.pdf');
    }
  
    public function create()
    {
        $empleado = Empleado::all();
        $productos = Producto::all();
        return view('venta.create', compact('empleado', 'productos'));
    }

    public function store(Request $request)
    {
       $request->validate([
            'FECHA_VENTA' => 'required|date',
            'VALOR_VENTA' => 'required|numeric',
            'IVA_VENTA' => 'required|numeric',
            'CANT_VENTA' => 'required|numeric',
            'MESA' => 'required|numeric',
            'ID_ROL_FK_VENTA' => 'required|exists:rol,NOMBRE',
            'ID_PRODUCTO_FK_VENTA' => 'required|exists:producto,NOM_PRODUCTO',
            'ID_METODO_PAGO_FK_VENTA' => 'required|string'
        ]);

        $venta = new Venta();
        $venta->FECHA_VENTA = $request->FECHA_VENTA;
        $venta->VALOR_VENTA = $request->VALOR_VENTA;
        $venta->IVA_VENTA = $request->IVA_VENTA;
        $venta->CANT_VENTA = $request->CANT_VENTA;
        $venta->MESA = $request->MESA;
        $venta->ID_ROL_FK_VENTA = $request->ID_ROL_FK_VENTA;
        $venta->ID_PRODUCTO_FK_VENTA = $request->ID_PRODUCTO_FK_VENTA;
        $venta->ID_METODO_PAGO_FK_VENTA = $request->ID_METODO_PAGO_FK_VENTA;
        $venta->save();
        return redirect()
                    ->route('venta.index')
                    ->with('success', '¡EXITOSO! La venta se  ha creado correctamente.');

                 
    }

    public function show($id)
    {
        //
    }           
   

    public function edit($id)
    {
        $empleado = Empleado::all();
        $productos = Producto::all();
        $venta = Venta::find($id);
        $data = [
            'venta'=>$venta,
        ];
        return view('venta.edit',$data, compact( 'empleado', 'productos'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'FECHA_VENTA' => 'required|date',
        'VALOR_VENTA' => 'required|numeric',
        'IVA_VENTA' => 'required|numeric',
        'CANT_VENTA' => 'required|numeric',
        'MESA' => 'required|numeric',
        'ID_ROL_FK_VENTA' => 'required|exists:rol,NOMBRE',
        'ID_PRODUCTO_FK_VENTA' => 'required|exists:producto,NOM_PRODUCTO',
        'ID_METODO_PAGO_FK_VENTA' => 'required|string'
    ]); 

    $venta = Venta::find($id);
    if (!$venta) {
        return redirect()->route('venta.index')
            ->with('error', '¡Error! La venta no fue encontrada.');
    }

    $venta->FECHA_VENTA = $request->FECHA_VENTA;
    $venta->VALOR_VENTA = $request->VALOR_VENTA;
    $venta->IVA_VENTA = $request->IVA_VENTA;
    $venta->CANT_VENTA = $request->CANT_VENTA;
    $venta->MESA = $request->MESA;
    $venta->ID_ROL_FK_VENTA = $request->ID_ROL_FK_VENTA;
    $venta->ID_PRODUCTO_FK_VENTA = $request->ID_PRODUCTO_FK_VENTA;
    $venta->ID_METODO_PAGO_FK_VENTA = $request->ID_METODO_PAGO_FK_VENTA;
    $venta->save();

    return redirect()->route('venta.index')
        ->with('success', '¡EXITOSO! La venta se ha actualizado correctamente.');
}

    public function destroy($id)
    {
        $venta = venta::find($id);
        $venta->delete();
        return redirect()
               ->route('venta.index')
               ->with('danger','¡EXITOSO! La venta se ha Anulado correctamente.');
    }
   
  

}
