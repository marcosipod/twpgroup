<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Product;
use DB;
use Illuminate\Database\Eloquent\Builder;

class InvoiceController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        // Listar todos los registros
        $invoices = Invoice::all();

        // Obtener precio total de la factura.
        $invoices1 = Invoice::leftJoin('products', 'products.invoice_id', '=', 'invoices.id')
            ->groupBy(['invoices.id', 'invoice_id'])
            ->selectRaw('invoices.id, SUM(price * quantity) as totales')
            ->get();
    
        // Obtener todos id de las facturas que tengan productos con cantidad mayor a 100.
        $invoices2 = Invoice::whereHas('products', function (Builder $query) {
            $query->where('quantity', '>', 100);
        })->select(['invoices.id'])->get();

        // Obtener todos los nombres de los productos cuyo valor final sea superior a $1.000.000 CLP.
        $invoices3 = Product::select(['name','price', 'quantity'])
            ->groupBy(['name', 'price', 'quantity'])
            ->havingRaw('(price * quantity) > ?', [1000000])
            ->get();

        return view('products.index', compact('invoices', 'invoices1', 'invoices2', 'invoices3'));
    }
}
