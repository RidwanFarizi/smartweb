<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'id_seller', 'name', 'id_category', 'type', 'size', 'description', 'image', 'ob', 'inc'
    ];


    public function join2table()
    {
        $result = $this->table('product')
            ->select()
            ->join('category', 'category.id_category = product.id_category')
            ->findAll();
        return $result;
    }
    public function category()
    {
        $query = $this->query('SELECT * FROM category GROUP BY category_name');
        $result = $query->getResultArray();
        return $result;
    }

    public function getProduct()
    {
        $result = $this->table('product')
            ->select()
            ->findAll();
        return $result;
    }


    public function insert_product()
    {
        $query = $this->query('SELECT * FROM product');
        $result = $query->getResultArray();
        return $result;
    }

    public function get_uploads()
    {
        return $this->findAll();
    }
    public function insert_gambar($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function search($keyword)
    {

        return $this->like('name', $keyword, 'both')->orLike('jenis', $keyword, 'both')->findAll();
    }

    public function update_product($data)
    {
        // update
        $this->db->table($this->table)->update($data);
        // check if updated data excist
        if ($this->where($data)->first()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_product($id)
    {
        // update
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}
