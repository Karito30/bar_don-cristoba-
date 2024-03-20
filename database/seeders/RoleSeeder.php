<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Empleado']);
        $role3 = Role::create(['name' => 'Proveedor']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$role1, $role2, $role3]);
        //**venta */
        Permission::create(['name' => 'venta.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'venta.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'venta.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'venta.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'venta.excel_venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'venta.pdf'])->syncRoles([$role1]);

         //**proveedor */
         Permission::create(['name' => 'proveedor.index'])->syncRoles([$role1]);
         Permission::create(['name' => 'proveedor.create'])->syncRoles([$role1]);
         Permission::create(['name' => 'proveedor.edit'])->syncRoles([$role1]);
         Permission::create(['name' => 'proveedor.destroy'])->syncRoles([$role1]);
         Permission::create(['name' => 'proveedor.excel_proveedor'])->syncRoles([$role1]);
         Permission::create(['name' => 'proveedor.pdf'])->syncRoles([$role1]);

          //**producto */
          Permission::create(['name' => 'producto.index'])->syncRoles([$role1, $role2]);
          Permission::create(['name' => 'producto.create'])->syncRoles([$role1, $role2]);
          Permission::create(['name' => 'producto.edit'])->syncRoles([$role1]);
          Permission::create(['name' => 'producto.destroy'])->syncRoles([$role1]);
          Permission::create(['name' => 'producto.excel_producto'])->syncRoles([$role1]);
          Permission::create(['name' => 'producto.pdf'])->syncRoles([$role1]);

           //**pedido */
           Permission::create(['name' => 'pedido.index'])->syncRoles([$role1,$role3]);
           Permission::create(['name' => 'pedido.create'])->syncRoles([$role1]);
           Permission::create(['name' => 'pedido.edit'])->syncRoles([$role1]);
           Permission::create(['name' => 'pedido.destroy'])->syncRoles([$role1]);
           Permission::create(['name' => 'pedido.excel_pedido'])->syncRoles([$role1]);
           Permission::create(['name' => 'pedido.pdf'])->syncRoles([$role1]);

           //**empleado */
           Permission::create(['name' => 'empleado.index'])->syncRoles([$role1]);
           Permission::create(['name' => 'empleado.create'])->syncRoles([$role1]);
           Permission::create(['name' => 'empleado.edit'])->syncRoles([$role1]);
           Permission::create(['name' => 'empleado.destroy'])->syncRoles([$role1]);
           Permission::create(['name' => 'empleado.excel_empleado'])->syncRoles([$role1]);
           Permission::create(['name' => 'empleado.pdf'])->syncRoles([$role1]);
 

    
    }
}
