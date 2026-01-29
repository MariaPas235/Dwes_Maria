<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('client')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('orders.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_number' => 'required|unique:orders,order_number',
            'date' => 'required|date',
            'status' => 'required|in:pendiente,enviado,entregado,cancelado',
            'total' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            'client_id' => 'required|exists:clients,id'
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Pedido creado correctamente');
    }

    public function show($id)
    {
        $order = Order::with('client')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $clients = Client::all();

        return view('orders.edit', compact('order', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'order_number' => 'required|unique:orders,order_number,' . $order->id,
            'date' => 'required|date',
            'status' => 'required|in:pendiente,enviado,entregado,cancelado',
            'total' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            'client_id' => 'required|exists:clients,id'
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Pedido actualizado correctamente');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Pedido eliminado correctamente');
    }
}
