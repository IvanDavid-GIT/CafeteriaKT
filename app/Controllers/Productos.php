<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto;

class Productos extends Controller
{
    public function index()
    {
        $producto = new Producto();
        
        $datos['productos'] = $producto->orderBy('id', 'ASC')->findAll();

        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');

        return view('productos/index', $datos);
    }

    public function create()
    {
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');

        return view('productos/create', $datos);
    }

    public function store()
    {
        $producto = new Producto();

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'referencia' => 'required|min_length[3]',
            'precio' => 'required',
            'peso' => 'required',
            'categoria' => 'required|min_length[3]',
            'stock' => 'required',
            'fecha' => 'required'
        ]);
        if (!$validacion) {
            $sesion = session();
            $sesion->setFlashdata('mensaje', 'Error, revise la información');
            return redirect()->back()->withInput();
        } else {
            $datos = [
                'nombre' => $this->request->getVar('nombre'),
                'referencia' => $this->request->getVar('referencia'),
                'precio' => $this->request->getVar('precio'),
                'peso' => $this->request->getVar('peso'),
                'categoria' => $this->request->getVar('categoria'),
                'stock' => $this->request->getVar('stock'),
                'fecha' => $this->request->getVar('fecha'),
            ];
            $producto->insert($datos);
        }


        return $this->response->redirect(site_url('/index'));
    }

    public function delete($id = null)
    {
        $producto = new Producto();

        $producto->where('id', $id)->delete($id);

        return $this->response->redirect(site_url('/index'));
    }

    public function edit($id = null)
    {
        $producto = new Producto();
        $datos['producto'] = $producto->where('id', $id)->first();


        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');


        return view('productos/edit', $datos);
    }

    public function update()
    {
        $producto = new Producto();

        $datos = [
            'nombre' => $this->request->getVar('nombre'),
            'referencia' => $this->request->getVar('referencia'),
            'precio' => $this->request->getVar('precio'),
            'peso' => $this->request->getVar('peso'),
            'categoria' => $this->request->getVar('categoria'),
            'stock' => $this->request->getVar('stock'),
            'fecha' => $this->request->getVar('fecha'),
        ];
        $id = $this->request->getVar('id');

        $validacion = $this->validate(
            [
                'nombre' => 'required|min_length[3]',
                'referencia' => 'required|min_length[3]',
                'precio' => 'required',
                'peso' => 'required',
                'categoria' => 'required|min_length[3]',
                'stock' => 'required',
                'fecha' => 'required'

            ]
        );

        if (!$validacion) {
            $sesion = session();
            $sesion->setFlashdata('mensaje', 'Error, revise la información');
            return redirect()->back()->withInput();
        }
        $producto->update($id, $datos);

        return $this->response->redirect(site_url('/index'));
    }
}
