<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Pedido_Producto;
use App\Models\Productos;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function getProductos(Request $request)
    {

        if (Auth::check()) {

            $id = $request->input('id');
            $precio = $request->input('precio');
            $nombre = $request->input('nombre');
            $tipo_producto = $request->input('tipo_producto');
            $deposito_producto = $request->input('deposito_producto');

            //armamos el filtro segun lo que venga
            $query = Productos::query();

            if ($id != '') {
                $query->where('id', $id);
            }

            if ($precio > 0) {
                $query->where('precio', $precio);
            }

            if ($nombre != '') {
                $query->where('nombre', $nombre);
            }

            if ($tipo_producto > 0) {
                $query->where('tipo_producto', $tipo_producto);
            }

            if ($deposito_producto > 0) {
                $query->where('deposito_producto', $deposito_producto);
            }

            // Realizar el JOIN con la tabla 'tipificadores'
            $query->join('tipificadores as t1', 'productos.tipo_producto', '=', 't1.id')
                ->join('tipificadores as t2', 'productos.deposito_producto', '=', 't2.id')
                ->select('productos.*', 't1.nombre as tipo_nombre', 't2.nombre as deposito_nombre');

            $query->orderBy('id', 'asc');

            $productos = $query->get();

            return view('productos.lstprod', ['productos' => $productos]);
        }

        return redirect("login")->with('error', 'no tienes permisos');
    }

    public function newProducto(Request $request)
    {

        if (Auth::check()) {

            $request->validate([
                'nombre' => 'required',
                'precio' => 'required'
            ]);

            $data = $request->all();

            if (isset($data['id'])) {

                $check = $this->update($data);
                return redirect()->back();
            } else {

                $check = $this->create($data);

                return redirect("dashboard")->withSuccess('producto creado!');
            }
        }

        return redirect("login")->with('error', 'no tienes permisos');
    }

    public function create(array $data)
    {

        return Productos::create([
            'nombre' => $data['nombre'],
            'observacion' => $data['observacion'],
            'precio' => $data['precio'],
            'tipo_producto' => $data['tipo_producto'],
            'deposito_producto' => $data['deposito_producto']
        ]);
    }

    public function update(array $data)
    {
        return Productos::where('id', $data['id'])->update([
            'nombre' => $data['nombre'],
            'observacion' => $data['observacion'],
            'precio' => $data['precio'],
            'tipo_producto' => $data['tipo_producto'],
            'deposito_producto' => $data['deposito_producto']
        ]);
    }

    public function deleteProducto(Request $request)
    {
        if (Auth::check()) {

            $id = $request->input('id');

            if (!$id) {
                return redirect("dashboard")->with('error', 'Debes pasar el ID');
            }

            Productos::where('id', $id)->delete();

            return redirect()->back();
        }

        return redirect("login")->with('error', 'no tienes permisos');
    }

    public function getProductosApi(Request $request)
    {

        $id = $request->input('id');
        $precio = $request->input('precio');
        $nombre = $request->input('nombre');
        $tipo_producto = $request->input('tipo_producto');

        //armamos el filtro segun lo que venga
        $query = Productos::query();

        if ($id != '') {
            $query->where('productos.id', $id);
        }

        if ($precio > 0) {
            $query->where('precio', $precio);
        }

        if ($nombre != '') {
            $query->where('nombre', $nombre);
        }

        if ($tipo_producto > 0) {
            $query->where('tipo_producto', $tipo_producto);
        }

        // Realizar el JOIN con la tabla 'tipificadores'
        $query->join('tipificadores', 'productos.tipo_producto', '=', 'tipificadores.id')
            ->select('productos.*', 'tipificadores.nombre as tipo_nombre');

        $productos = $query->get();

        return response()->json(
            $productos,
            200
        );
    }

    public function getProductosPedido(Request $request)
    {

        if (Auth::check()) {

            $id = $request->input('id');
            $precio = $request->input('precio');
            $nombre = $request->input('nombre');
            $tipo_producto = $request->input('tipo_producto');
            $deposito_producto = $request->input('deposito_producto');

            //armamos el filtro segun lo que venga
            $query = Productos::query();

            if ($id != '') {
                $query->where('id', $id);
            }

            if ($precio > 0) {
                $query->where('precio', $precio);
            }

            if ($nombre != '') {
                $query->where('nombre', $nombre);
            }

            if ($tipo_producto > 0) {
                $query->where('tipo_producto', $tipo_producto);
            }

            if ($deposito_producto > 0) {
                $query->where('deposito_producto', $deposito_producto);
            }

            // Realizar el JOIN con la tabla 'tipificadores'
            $query->join('tipificadores as t1', 'productos.tipo_producto', '=', 't1.id')
                ->join('tipificadores as t2', 'productos.deposito_producto', '=', 't2.id')
                ->select('productos.*', 't1.nombre as tipo_nombre', 't2.nombre as deposito_nombre');

            $query->orderBy('id', 'asc');

            $productos = $query->get();

            return view('productos.lstprod_pedido', ['productos' => $productos]);
        }

        return redirect("login")->with('error', 'no tienes permisos');
    }

    public function newPedido(Request $request)
    {
        $prod = $request->input('productos', []);
        $cant = $request->input('cantidad', []);

        $pedido = Pedido::create([
            'nombre_usuario' => $request->input('nombre_usuario')
        ]);

        foreach ($prod as $key => $p) {
            $pedido->producto()->create([
                'producto_id' => $p,
                'cantidad' => $cant[$key],
            ]);
        }

        return redirect()->back();
    }

    public function updatePedido(Request $request)
    {

        $prod = $request->input('productos', []);
        $cant = $request->input('cantidad', []);
        $id = $request->input('id');

        if ($id != '') {

            $pedido = Pedido::findOrFail($id);

            $pedido->update([
                'nombre_usuario' => $request->input('nombre_usuario')
            ]);

            $pedido->producto()->delete();

            foreach ($prod as $key => $p) {
                $pedido->producto()->create([
                    'producto_id' => $p,
                    'cantidad' => $cant[$key],
                ]);
            }
        } else {

            $prod = $request->input('productos', []);
            $cant = $request->input('cantidad', []);

            $pedido = Pedido::create([
                'nombre_usuario' => $request->input('nombre_usuario')
            ]);

            foreach ($prod as $key => $p) {
                $pedido->producto()->create([
                    'producto_id' => $p,
                    'cantidad' => $cant[$key],
                ]);
            }
        }

        return redirect()->back();
    }

    public function deletePedido(Request $request)
    {

        $id = $request->input('id');

        $pedido = Pedido::findOrFail($id);

        $pedido->producto()->delete();

        $pedido->delete();

        return redirect()->back();
    }

    public function getPedidos()
    {

        // $query = Pedido_Producto::query();

        // $query->join('productos', 'pedido_producto.producto_id', '=', 'productos.id');
        // $query->join('pedidos', 'pedido_producto.pedido_id', '=', 'pedidos.id');

        // $pedidos = $query->get();

        $pedidos = Pedido::orderBy('id', 'asc')->get();

        return view('productos.lstpedido2', ['pedidos' => $pedidos]);
    }

    public function getPedidosAPI(Request $request)
    {

        $id = $request->input('id');

        $query = Pedido_Producto::query();

        if ($id != '') {
            $query->where('pedidos.id', $id);
        }

        $query->join('productos', 'pedido_producto.producto_id', '=', 'productos.id');
        $query->join('pedidos', 'pedido_producto.pedido_id', '=', 'pedidos.id');

        $pedidos = $query->get();

        return response()->json(
            $pedidos,
            200
        );
    }
}
