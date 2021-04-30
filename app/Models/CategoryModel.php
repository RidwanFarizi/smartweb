<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = "category";
    protected $primaryKey = 'id_category';
    protected $useSoftDeletes = true;

    protected $deletedField  = 'deleteDate';

    public function getCategory($id_category = false)
    {
        if ($id_category === false) {
            return $this->table('category')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('category')
                ->where('id_category', $id_category)
                ->get()
                ->getRowArray();
        }
    }


    public function category_insert($data)
    {
        return $this->db->table($this->table)->insert($data);
    }


    // public function update_produk($data, $id)
    // {
    //     return $this->db->table($this->table)->update($data, ['id' => $id]);
    // }


    public function category_delete($id_category)
    {
        return $this->db->table($this->table)->delete(['id_category' => $id_category]);
    }

    // public function delete_produk($where)
    // {
    //     // update
    //     $data = ['deleteDate' => date('Y-m-d H:i:s')];
    //     $this->db->table($this->table)->update($data, $where);

    //     // check if updated data excist
    //     return true;
    // }
}
