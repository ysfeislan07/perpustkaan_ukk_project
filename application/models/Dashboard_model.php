<?php

class Dashboard_model extends CI_Model 
{
    public function countBook()
    {
        return $this->db->count_all('book');
    }
    public function countStok() 
    {
        $query = $this->db->query('SELECT SUM(stok) AS total_stok FROM book');
        
        $row = $query->row();
        return $row->total_stok;
    }

    public function countUsers()
    {
        return $this->db->count_all('users');
    }

    public function countLoansBook()
    {
        $this->db->where('status', 'In Loans');
        return $this->db->count_all_results('loans');
    }

}