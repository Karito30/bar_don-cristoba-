<?php

namespace App\Http\Controllers;

use App\Events\PedidoEvent;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\Pedidos;

class PedidoController extends Controller
{ 
    

    
    

    public function __construct()
    {
        $this->middleware('permission:pedido.create', ['only' => ['create']]);
        $this->middleware('permission:pedido.edit', ['only' => ['edit']]);
        $this->middleware('permission:pedido.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:pedido.excel_venta', ['only' => ['excelVenta']]);
        $this->middleware('permission:pedido.pdf', ['only' => ['pdf']]);
    }

    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $pedidos = Pedido::where('CANTIDAD', 'LIKE', '%' . $busqueda . '%')
             ->orWhere('NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR', 'LIKE', '%' . $busqueda . '%')
             ->latest('ID_PEDIDO_PROVEEDOR')
            ->paginate(3);
        $data = [
        'pedidos' => $pedidos, 
        'busqueda' => $busqueda, 
        ];
       return view('pedido.index', $data);
    }

    public function pdf()
    {
        $pedido = Pedido::all();
        $pdf = Pdf::loadView('pedido.pdf', compact('pedido'));
        //return $pdf->stream();
        return $pdf->download('Reporte_Pedido'.time().'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = Proveedor::all();
        $producto = Producto::all();
        return view('pedido.create', compact('proveedor', 'producto'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR' => 'required|exists:proveedor,NOMBRE_PROVEEDOR',
            'NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR' => 'required|exists:producto,NOM_PRODUCTO',
            'CANTIDAD' => 'required|numeric',
            'PRECIO' => 'required|numeric',
            'FECHA_PEDIDO' => 'required|date',
            'SUBTOTAL' => 'required|numeric',
            'TOTAL' => 'required|numeric',
            
        ]);

        $pedido = new pedido();
        $pedido->ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR=$request->ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR;
        $pedido->NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR=$request->NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR;
        $pedido->CANTIDAD=$request->CANTIDAD;
        $pedido->PRECIO=$request->PRECIO;
        $pedido->FECHA_PEDIDO=$request->FECHA_PEDIDO;
        $pedido->SUBTOTAL=$request->SUBTOTAL;
        $pedido->TOTAL=$request->TOTAL;
        $pedido->save();
        $user = User::all(); 
        Notification::send($user, new Pedidos($pedido));
        return redirect()->route('pedido.index')
        ->with('success', '¡EXITOSO! El pedido se  ha creado correctamente.');
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
        $proveedor = Proveedor::all();
        $producto = Producto::all();
        $pedido = pedido::find($id);
        $data = [
            'pedido'=>$pedido,
        ];
        return view('pedido.edit',$data, compact( 'proveedor', 'producto'));
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
            'ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR' => 'required|exists:proveedor,NOMBRE_PROVEEDOR',
            'NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR' => 'required|exists:producto,NOM_PRODUCTO',
            'CANTIDAD' => 'required|numeric',
            'PRECIO' => 'required|numeric',
            'FECHA_PEDIDO' => 'required|date',
            'SUBTOTAL' => 'required|numeric',
            'TOTAL' => 'required|numeric',
            
        ]);

        $pedido = pedido::find($id);
        $pedido->ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR=$request->ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR;
        $pedido->NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR=$request->NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR;
        $pedido->CANTIDAD=$request->CANTIDAD;
        $pedido->PRECIO=$request->PRECIO;
        $pedido->FECHA_PEDIDO=$request->FECHA_PEDIDO;
        $pedido->SUBTOTAL=$request->SUBTOTAL;
        $pedido->TOTAL=$request->TOTAL;
        $pedido->save();
        return redirect()->route('pedido.index')
        ->with('success', '¡EXITOSO! El pedido se  ha actualizado correctamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();
        return redirect()
               ->route('pedido.index')
               ->with('danger','¡EXITOSO! El pedido se ha eliminado correctamente.');
    }

    Public function make_pedido_notification($pedido)
    {
        event(new PedidoEvent($pedido));

      // $adminProveedorUsers = User::role(['Admin', 'Proveedor'])
         //>whereNotIn('ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR', [$pedido->ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR])
            // ->get();

         //foreach ($adminProveedorUsers as $user) {
            // $user->notify(new Pedidos($pedido));
        // }  
    }
}
