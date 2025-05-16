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

    
    $ultimosContactos = ContactMessage::with('user')->latest()->paginate(5);

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
        return response()->json(['message' => 'No se enviaron cambios.'], 422);
    }

    $order->update($data);

    return response()->json(['message' => 'Pedido actualizado correctamente.']);
}

public function getAllOrders()
{
    $pedidos = Order::latest()->get();
    return response()->json($pedidos);
}





// Gráfico de ventas
/**
     * Devuelve los datos de ventas mensuales en formato JSON
     */
    public function mensuales()
    {
        // Obtener el mes actual
        $mesActual = Carbon::now();
        $inicio = $mesActual->copy()->startOfMonth();
        $fin = $mesActual->copy()->endOfMonth();
        
        // Obtener datos de ventas diarias del mes actual
        $ventas = Order::selectRaw('DATE(created_at) as fecha, SUM(total) as total')
            ->where('status', 'completado') // Solo pedidos completados
            ->whereBetween('created_at', [$inicio, $fin])
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();
        
        // Preparar arrays para etiquetas y valores
        $labels = [];
        $values = [];
        
        // Inicializar array con todos los días del mes (con valores en 0)
        for ($dia = 1; $dia <= $fin->day; $dia++) {
            $fecha = $inicio->copy()->addDays($dia - 1);
            $labels[] = $dia; // Solo el número del día
            $values[] = 0;    // Valor inicial 0
        }
        
        // Rellenar valores reales de ventas
        foreach ($ventas as $venta) {
            $diaDelMes = Carbon::parse($venta->fecha)->day;
            $values[$diaDelMes - 1] = (float) $venta->total;
        }
        
        return response()->json([
            'labels' => $labels,
            'values' => $values
        ]);
    }
    
    /**
     * Devuelve los datos de ventas trimestrales en formato JSON
     */
    public function trimestrales()
    {
        // Obtener el trimestre actual
        $fechaActual = Carbon::now();
        $inicioTrimestre = $fechaActual->copy()->startOfQuarter();
        $finTrimestre = $fechaActual->copy()->endOfQuarter();
        
        // Obtener datos de ventas mensuales del trimestre actual
        $ventas = Order::selectRaw('MONTH(created_at) as mes, SUM(total) as total')
            ->where('status', 'completado') // Solo pedidos completados
            ->whereBetween('created_at', [$inicioTrimestre, $finTrimestre])
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
        
        // Preparar arrays para etiquetas y valores
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
        
        // Inicializar array con los tres meses del trimestre
        foreach ($mesesDelTrimestre as $mes) {
            $labels[] = $nombresMeses[$mes];
            $values[] = 0; // Valor inicial 0
        }
        
        // Rellenar valores reales de ventas
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
    
    /**
     * Devuelve los datos de ventas anuales en formato JSON
     */
    public function anuales()
    {
        // Obtener el año actual
        $añoActual = Carbon::now()->year;
        $inicio = Carbon::createFromDate($añoActual, 1, 1)->startOfDay();
        $fin = Carbon::createFromDate($añoActual, 12, 31)->endOfDay();
        
        // Obtener datos de ventas mensuales del año actual
        $ventas = Order::selectRaw('MONTH(created_at) as mes, SUM(total) as total')
            ->where('status', 'completado') // Solo pedidos completados
            ->whereBetween('created_at', [$inicio, $fin])
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();
        
        // Preparar arrays para etiquetas y valores
        $nombresMeses = [
            'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
        ];
        
        $labels = $nombresMeses;
        $values = array_fill(0, 12, 0); // Inicializar 12 meses con valor 0
        
        // Rellenar valores reales de ventas
        foreach ($ventas as $venta) {
            $indiceMes = $venta->mes - 1; // Restamos 1 porque los arrays empiezan en 0
            $values[$indiceMes] = (float) $venta->total;
        }
        
        return response()->json([
            'labels' => $labels,
            'values' => $values
        ]);
    }

}
