<?php

class Book_model extends CI_Model 
{
    public function getBook()
    {
        $this->db->select('book.*, book_categories.*, categories.*');
        $this->db->from('book');
        $this->db->join('book_categories', 'book.book_id = book_categories.book_id');
        $this->db->join('categories', 'book_categories.categories_id = categories.categories_id');
    
        $query = $this->db->get();
        return $query->result();
    }

    public function getBookSortir($sortir)
    {
        $this->db->select('book.*, book_categories.*, categories.*');
        $this->db->from('book');
        $this->db->join('book_categories', 'book.book_id = book_categories.book_id');
        $this->db->join('categories', 'book_categories.categories_id = categories.categories_id');
        $this->db->where('categories.name_categories', $sortir);
    
        $query = $this->db->get();
        return $query->result();
    }
}