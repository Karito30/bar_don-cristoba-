<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class Notifications1Controller extends Controller
{
    public function mark_all_Notifications1(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->route('venta.index');
     }  
    
     public function mark_a_Notification($notification_id, $ventas_id){
       auth()->user()->unreadNotifications->when($notification_id , function($query) use 
       ($notification_id){
           return $query->where('id',$notification_id);
       })->markAsRead();
    
       $venta = Venta::find($ventas_id);
       return redirect()->route('venta.index', $venta);
     }  
}
