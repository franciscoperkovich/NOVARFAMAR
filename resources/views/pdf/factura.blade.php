<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $venta->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #28a745;
            padding-bottom: 15px;
        }
        .header h1 {
            color: #28a745;
            margin: 0;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .datos {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .datos-cliente, .datos-factura {
            width: 48%;
        }
        .datos-factura {
            text-align: right;
        }
        h4 {
            color: #28a745;
            border-bottom: 1px solid #28a745;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        thead {
            background-color: #28a745;
            color: white;
        }
        thead th {
            padding: 10px;
            text-align: left;
        }
        tbody td {
            padding: 8px 10px;
            border-bottom: 1px solid #ddd;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #999;
            font-size: 12px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>NovaFarmar</h1>
        <p>Farmacia y Productos de Salud</p>
        <p>Tel: (0362) 000-0000 | Email: contacto@novafarmar.com</p>
    </div>

    <div class="datos">
        <div class="datos-cliente">
            <h4>Datos del Cliente</h4>
            <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
        </div>
        <div class="datos-factura">
            <h4>Datos de la Factura</h4>
            <p><strong>Nº Factura:</strong> #{{ str_pad($venta->id, 6, '0', STR_PAD_LEFT) }}</p>
            <p><strong>Fecha:</strong> {{ $venta->created_at->timezone('America/Argentina/Buenos_Aires')->format('d/m/Y H:i') }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($venta->estado) }}</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalles as $detalle)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detalle->producto->nombre }}</td>
                <td>{{ $detalle->cantidad }}</td>
                <td>${{ number_format($detalle->precio_unitario, 2) }}</td>
                <td>${{ number_format($detalle->cantidad * $detalle->precio_unitario, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Total: ${{ number_format($venta->total, 2) }}
    </div>

    <div class="footer">
        <p>Gracias por su compra en NovaFarmar</p>
        <p>Este documento es válido como comprobante de compra</p>
    </div>

</body>
</html> 