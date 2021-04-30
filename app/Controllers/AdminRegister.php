<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminRegister extends BaseController
{
    public function index()
    {
        return view('admin/register');
    }


    public function process()
    {
        if (!$this->validate([
            'admin_name' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter'
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[admin.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'email' => [
                'rules' => 'required|min_length[5]|max_length[50]|is_unique[admin.email]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 5 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                    'is_unique' => 'Email sudah digunakan sebelumnya'
                ]
            ],
            'phone_number' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 5 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'address' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 5 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $admin = new AdminModel();
        $admin->insert([
            'admin_name' => $this->request->getVar('admin_name'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'email' => $this->request->getVar('email'),
            'phone_number' => $this->request->getVar('phone_number'),
            'address' => $this->request->getVar('address')
        ]);
        return redirect()->to('/login');
    }
}
