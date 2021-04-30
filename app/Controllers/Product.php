<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;



class Product extends Controller
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

        return view('index', $data);
    }

    public function create()
    {
        $data['product'] = $this->product->category();

        return view('product/create', $data);
    }

    public function process()
    {

        if (!$this->validate(
            [
                'image' => [
                    'rules' => 'uploaded[image]'
                ]
            ]

        )) {
            $validation = \Config\Services::validation();
            return redirect()->to('/create')->withInput()->with('validation', $validation);
        }
        // dd('berhasil');
        //ambil gambar
        $fileImage = $this->request->getFile('image');

        //pindahkan file ke folder img
        $fileImage->move('img');
        //ambil nama file
        $namaImage = $fileImage->getName();

        $this->product->save([
            'id_users' => '01',
            'name' => $this->request->getVar('name'),
            'type' => $this->request->getVar('type'),
            'size' => $this->request->getVar('size'),
            'description' => $this->request->getVar('description'),
            'image' => $namaImage,
            'ob' => $this->request->getVar('ob'),
            'inc' => $this->request->getVar('inc'),
            'id_category' => $this->request->getVar('id_category')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/product');
    }


    public function save()
    {

        $this->product->save([
            'name' => $this->request->getVar('name'),
            'type' => $this->request->getVar('type'),
            'size' => $this->request->getVar('size'),
            'description' => $this->request->getVar('description'),
            'image' => $this->request->getVar('image'),
            'price' => $this->request->getVar('price'),
            'category_name' => $this->request->getVar('category_name')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/product');
    }

    public function edit($id)
    {
        // $data['product'] = $this->product->join2table();

        // return view('product/update', $data);
        // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $product = $this->product->join2table(['id' => $id]);
        $data['product'] = $product ? $product[0] : false;
        // Mengirim data ke dalam view
        return view('product/update', $data);
    }


    public function update()
    {

        // Mengambil value dari form dengan method POST
        $name = $this->request->getPost('name');
        $jenis = $this->request->getPost('jenis');
        $size = $this->request->getPost('size');
        $description = $this->request->getPost('description');
        $image = $this->request->getPost('image');
        $ob = $this->request->getPost('ob');
        $inc = $this->request->getPost('inc');
        $category_name = $this->request->getPost('category_name');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'name' => $name,
            'jenis' => $jenis,
            'size' => $size,
            'description' => $description,
            'image' => $image,
            'ob' => $ob,
            'inc' => $inc,
            'category_name' => $category_name
        ];

        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->product->update_product($data);

        // Jika berhasil melakukan ubah
        if ($ubah) {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Updated product successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('product'));
        }
    }

    public function delete($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $hapus = $this->product->delete_product(['id' => $id]);

        // Jika berhasil melakukan hapus
        if ($hapus) {
            // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted product successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('product'));
        }
    }
}
