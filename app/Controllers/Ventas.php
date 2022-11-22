<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Venta;
use App\Models\Producto;

class Ventas extends Controller
{
    public function index()
    {
        /* $db = \Config\Database::connect();
        $builder = $db->table('ventas');
        $builder->select('*');
        $query = $builder->get();
        $ventas = $query->getResultArray();
        $datos = array('ventas' => $ventas); */

        $venta = new Venta();

        $datos['ventas'] = $venta->orderBy('id', 'ASC')->findAll();

        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');

        return view('ventas/index', $datos);
    }

    public function create()
    {
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');

        return view('ventas/create', $datos);
    }

    public function store()
    {
        $venta = new Venta();

        $validacion = $this->validate([
            'idProducto' => 'required',
            'cantidad' => 'required',
        ]);
        if (!$validacion) {
            $sesion = session();
            $sesion->setFlashdata('mensaje', 'Error, revise la información');
            return redirect()->back()->withInput();
        } else {
            $datos = [
                'idProducto' => $this->request->getVar('idProducto'),
                'cantidad' => $this->request->getVar('cantidad'),
            ];
            $venta->insert($datos);
        }


        return $this->response->redirect(site_url('ventas/index'));
    }
}
