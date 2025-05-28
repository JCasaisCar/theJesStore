<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Log;
use App\Models\DiscountCode;
use App\Models\Newsletter;

class AdminController extends Controller
{
    public function index()
{
    $totalProductos = Product::count();
    $productosActivos = Product::where('active', true)->count();
    $stockBajo = Product::where('stock', '<', 5)->count();
    $totalCategorias = Category::count();

    
    $pedidosPendientes = Order::where('status', 'pendiente')->count();
    $totalVentas = Order::where('status', 'completado')->sum('total');
    $totalPedidos = Order::count();

    $totalUsuarios = User::count();
    $totalClientes = User::where('role', 'user')->count(); // 👈 Añadir esta línea
    $nuevosUsuarios = User::whereDate('created_at', '>=', now()->subMonth())->count();

    $totalContactos = Contact::count();

    
    $ultimosContactos = ContactMessage::with('user')->latest()->paginate(3);

    $pedidosEnPreparacion = Order::where('tracking', 'preparation')->count();

    $ultimosPedidos = Order::with(['user', 'details.product'])->latest()->paginate(5);

    $totalPedidos = Order::count();

    $productosInactivos = Product::where('active', false)->count();
    
    $productosConStockBajo = Product::orderBy('stock', 'asc')
                                    ->limit(5)
                                    ->get();


    $cuponesActivos = DiscountCode::where('is_active', true)->count();
    $cuponesInactivos = DiscountCode::where('is_active', false)->count();

    $newsletterCount = Newsletter::count();

    return view('admin', compact(
        'totalProductos',
        'productosActivos',
        'productosInactivos',
        'stockBajo',
        'totalCategorias',
        'totalPedidos',
        'pedidosPendientes',
        'totalVentas',
        'totalUsuarios',
        'totalClientes',
        'nuevosUsuarios',
        'totalContactos',
        'ultimosPedidos',
        'ultimosContactos',
        'pedidosEnPreparacion',
        'ultimosPedidos',
        'totalPedidos',
        'totalVentas',
        'productosConStockBajo',
        'cuponesActivos',
        'cuponesInactivos', 
        'newsletterCount'
    ));
}

public function updateOrder(Request $request, $id)
{
    Log::info('Datos recibidos', $request->all());

    $order = Order::findOrFail($id);

    $data = [];

    if ($request->has('status')) {
        $data['status'] = $request->status;
    }

    if ($request->has('tracking')) {
        $data['tracking'] = $request->tracking;
    }

    if (empty($data)) {
        return response()->json(['message' => __('sin_cambios_enviados')], 422);
    }

    $order->update($data);

    return response()->json(['message' => __('pedido_actualizado')]);
}

public function getAllOrders()
{
    $pedidos = Order::latest()->get();
    return response()->json($pedidos);
}






    public function mensuales()
    {
        $mesActual = Carbon::now();
        $inicio = $mesActual->copy()->startOfMonth();
        $fin = $mesActual->copy()->endOfMonth();
        
        $ventas = Order::selectRaw('DATE(created_at) as fecha, SUM(total) as total')
            ->where('status', 'completado')
            ->whereBetween('created_at', [$inicio, $fin])
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();
        
        $labels = [];
        $values = [];
        
        for ($dia = 1; $dia <= $fin->day; $dia++) {
            $fecha = $inicio->copy()->addDays($dia - 1);
            $labels[] = $dia; 
            $values[] = 0;   
        }
        
        foreach ($ventas as $venta) {
            $diaDelMes = Carbon::parse($venta->fecha)->day;
            $values[$diaDelMes - 1] = (float) $venta->total;
        }
        
        return response()->json([
            'labels' => $labels,
            'values' => $values
        ]);
    }
    
   
    public function trimestrales()
    {
        $fechaActual = Carbon::now();
        $inicioTrimestre = $fechaActual->copy()->startOfQuarter();
        $finTrimestre = $fechaActual->copy()->endOfQuarter();
        
        $ventas = Order::selectRaw('MONTH(created_at) as mes, SUM(total) as total')
            ->where('status', 'completado') 
            ->whereBetween('created_at', [$inicioTrimestre, $finTrimestre])
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
        
        $mesesDelTrimestre = [
            $inicioTrimestre->month,
            $inicioTrimestre->copy()->addMonth()->month,
            $inicioTrimestre->copy()->addMonths(2)->month
        ];
        
        $nombresMeses = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];
        
        $labels = [];
        $values = [];
        
        foreach ($mesesDelTrimestre as $mes) {
            $labels[] = $nombresMeses[$mes];
            $values[] = 0;
        }
        
        foreach ($ventas as $venta) {
            $indiceMes = array_search($venta->mes, $mesesDelTrimestre);
            if ($indiceMes !== false) {
                $values[$indiceMes] = (float) $venta->total;
            }
        }
        
        return response()->json([
            'labels' => $labels,
            'values' => $values
        ]);
    }
    
    
    public function anuales()
    {
        $añoActual = Carbon::now()->year;
        $inicio = Carbon::createFromDate($añoActual, 1, 1)->startOfDay();
        $fin = Carbon::createFromDate($añoActual, 12, 31)->endOfDay();
        
        $ventas = Order::selectRaw('MONTH(created_at) as mes, SUM(total) as total')
            ->where('status', 'completado') 
            ->whereBetween('created_at', [$inicio, $fin])
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
        
        $nombresMeses = [
            'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
        ];
        
        $labels = $nombresMeses;
        $values = array_fill(0, 12, 0);
        
        foreach ($ventas as $venta) {
            $indiceMes = $venta->mes - 1;
            $values[$indiceMes] = (float) $venta->total;
        }
        
        return response()->json([
            'labels' => $labels,
            'values' => $values
        ]);
    }

}
