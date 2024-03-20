<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;


class NotificationsController extends Controller
{
    public function mark_all_Notifications(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->route('pedido.index');
 }  

 public function mark_a_Notification($notification_id, $pedido_id){
   auth()->user()->unreadNotifications->when($notification_id , function($query) use 
   ($notification_id){
       return $query->where('id',$notification_id);
   })->markAsRead();

   $pedido = Pedido::find($pedido_id);
   return redirect()->route('pedido.index', $pedido);
 }  




}

 