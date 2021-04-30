<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\RESTful\ResourceController;

class ViewProduct extends ResourceController
{
    protected $modelName = 'App\Models\ProductModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->product = new ProductModel();
        $this->category = new CategoryModel();
        // Memanggil form helper
        helper('form');
        // Menyiapkan variabel untuk menampung upload model
        // $this->model_product = new ProductModel();
    }

    public function index()
    {

        $data['product'] = $this->product->join2table();
        return $this->respond($data);
        // return view('index', $data);
    }
}
