<?php

namespace App\Models;

use CodeIgniter\Model;

class DiecastModel extends Model
{
    protected $table = 'diecast';
    protected $useTimestamps = true;
    protected $allowedFields = ['produk', 'slug', 'nama', 'kategori', 'sampul'];

    public function getDiecast($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
