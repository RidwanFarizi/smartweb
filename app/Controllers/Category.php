<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoryModel;

class Category extends Controller
{

    public function __construct()
    {

        // Mendeklarasikan class ProductModel menggunakan $this->product
        $this->category = new CategoryModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }


    public function index()
    {
        $data['category'] = $this->category->getcategory();
        echo view('product/index_category', $data);
    }


    public function create_category()
    {
        return view('product/create_category');
    }


    public function category_save()
    {
        // Mengambil value dari form dengan method POST
        $category_name = $this->request->getPost('category_name');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'category_name' => $category_name
        ];

        /* 
    Membuat variabel simpan yang isinya merupakan memanggil function 
    insert_product dan membawa parameter data 
    */
        $simpan = $this->category->category_insert($data);

        // Jika simpan berhasil, maka ...
        if ($simpan) {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created category successfully');
            // Redirect halaman ke product
            return redirect()->to(base_url('category'));
        }
    }


    public function category_delete($id_category)
    {
        $model = new CategoryModel();
        $hapus = $model->category_delete($id_category);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Category successfully');
            return redirect()->to(base_url('category'));
        }
    }

    // public function delete($kode_kategori)
    // {
    //     // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
    //     $hapus = $this->kategori->delete_kategori(['kode_kaegori' => $kode_kategori]);

    //     // Jika berhasil melakukan hapus
    //     if ($hapus) {
    //         // Deklarasikan session flashdata dengan tipe warning
    //         session()->setFlashdata('warning', 'Deleted product successfully');
    //         // Redirect ke halaman product
    //         return redirect()->to(base_url('kategori'));
    //     }
    // }
}
