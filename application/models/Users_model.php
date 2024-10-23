<?php

class Users_model extends CI_Model 
{
    public function getCollections($users_id)
    {
        $this->db->select('personal_collections.*, book.*, users.*');
        $this->db->from('personal_collections');
        $this->db->join('book', 'book.book_id = personal_collections.book_id');
        $this->db->join('users', 'users.users_id = personal_collections.users_id');

        $this->db->where('personal_collections.users_id', $users_id);
        $query = $this->db->get();
        return $query->result();
    }

}
