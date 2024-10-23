<?php

class Loans_model extends CI_Model 
{
    public function getLoansByUsers($users_id)
    {
        $this->db->select('loans.*, book.*, users.*');
        $this->db->from('loans');
        $this->db->join('book', 'book.book_id = loans.book_id');
        $this->db->join('users', 'users.users_id = loans.users_id OR users.users_id = loans.author_id');

        $this->db->where('loans.users_id', $users_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getLoans()
    {
        $this->db->select('loans.*, book.*, users.*');
        $this->db->from('loans');
        $this->db->join('book', 'book.book_id = loans.book_id');
        $this->db->join('users', 'users.users_id = loans.users_id OR users.users_id = loans.author_id');

        $this->db->order_by('loans.confirm_rate','ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function getLoansSortir($loans)
    {
        $this->db->select('loans.*, book.*, users.*');
        $this->db->from('loans');
        $this->db->join('book', 'book.book_id = loans.book_id');
        $this->db->join('users', 'users.users_id = loans.users_id OR users.users_id = loans.author_id');
        $this->db->where('loans.status', $loans);

        $this->db->order_by('loans.confirm_rate','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function minStok($book_id, $qty) {
        $this->db->set('stok', 'stok - ' . (int)$qty, false);
        $this->db->where('book_id', $book_id);
        return $this->db->update('book');
    }

    public function loansAcc($users_id) 
    {
        $this->db->select('COUNT(loans.book_id) as accepted');
        $this->db->from('loans');
        $this->db->join('book', 'book.book_id = loans.book_id');
        $this->db->join('users', 'users.users_id = loans.users_id');
        $this->db->where('loans.users_id', $users_id);
        $this->db->where('loans.status', 'Accepted');
        
        $query = $this->db->get();
        $result = $query->row();
        
        return $result->accepted;
    }

    public function loansInProgress($users_id) 
    {
        $this->db->select('COUNT(loans.book_id) as in_loans');
        $this->db->from('loans');
        $this->db->join('book', 'book.book_id = loans.book_id');
        $this->db->join('users', 'users.users_id = loans.users_id');
        $this->db->where('loans.users_id', $users_id);
        $this->db->where('loans.status', 'In Loans');
        
        $query = $this->db->get();
        $result = $query->row();
        
        return $result->in_loans;
    }
}
