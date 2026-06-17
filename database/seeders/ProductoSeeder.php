<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        Producto::firstOrCreate(
            ['nombre' => 'Ibuprofeno 400mg'],
            ['descripcion' => 'Antiinflamatorio y analgésico, caja x 20 comprimidos', 'precio' => 2500, 'stock' => 50, 'tipo' => 'medicamento', 'activo' => true]
        );

        Producto::firstOrCreate(
            ['nombre' => 'Paracetamol 500mg'],
            ['descripcion' => 'Analgésico y antipirético, caja x 24 comprimidos', 'precio' => 1800, 'stock' => 80, 'tipo' => 'medicamento', 'activo' => true]
        );

        Producto::firstOrCreate(
            ['nombre' => 'Omeprazol 20mg'],
            ['descripcion' => 'Protector gástrico, caja x 14 cápsulas', 'precio' => 3200, 'stock' => 40, 'tipo' => 'medicamento', 'activo' => true]
        );

        Producto::firstOrCreate(
            ['nombre' => 'Shampoo Cabello Seco'],
            ['descripcion' => 'Shampoo nutritivo para cabello seco y dañado, 400ml', 'precio' => 3200, 'stock' => 40, 'tipo' => 'cuidado_personal', 'activo' => true]
        );

        Producto::firstOrCreate(
            ['nombre' => 'Crema Hidratante Corporal'],
            ['descripcion' => 'Crema hidratante con vitamina E para piel seca, 250ml', 'precio' => 2800, 'stock' => 35, 'tipo' => 'cuidado_personal', 'activo' => true]
        );
    }
}