<?php

class History_model extends CI_Model 
{
    public function getLoansHistory($users_id)
    {
        $this->db->select('rate_book.*, book.*, users.*');
        $this->db->from('rate_book');
        $this->db->join('book', 'book.book_id = rate_book.book_id');
        $this->db->join('users', 'users.users_id = rate_book.users_id');

        $this->db->where('rate_book.users_id', $users_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getHistoryLoans()
    {
        $this->db->select('loans.*, book.*, users.*');
        $this->db->from('loans');
        $this->db->join('book', 'book.book_id = loans.book_id');
        $this->db->join('users', 'users.users_id = loans.users_id');
        $this->db->where('loans.status !=', 'In Progress', 'Accepted');
        $this->db->order_by('loans.status', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getHistoryToday() {
        $this->db->select('loans.*, book.*, users.*');
        $this->db->from('loans');
        $this->db->join('book', 'book.book_id = loans.book_id');
        $this->db->join('users', 'users.users_id = loans.users_id');
        $this->db->where('loans.loan_date', date('Y-m-d'));
        $this->db->order_by('loans.status', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getHistoryWeekly() {
        $this->db->select('loans.*, book.*, users.*');
        $this->db->from('loans');
        $this->db->join('book', 'book.book_id = loans.book_id');
        $this->db->join('users', 'users.users_id = loans.users_id');
        $this->db->where('loans.loan_date >=', date('Y-m-d', strtotime('-7 days')));
        $this->db->order_by('loans.status', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getHistoryMonthly() {
        $this->db->select('loans.*, book.*, users.*');
        $this->db->from('loans');
        $this->db->join('book', 'book.book_id = loans.book_id');
        $this->db->join('users', 'users.users_id = loans.users_id');
        $this->db->where('loans.loan_date >=', date('Y-m-d', strtotime('-30 days')));
        $this->db->order_by('loans.status', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function getData()
    {
        $this->db->where('loans.status !=', 'In Progress', 'Accepted');
        return $this->db->count_all_results('loans');
    }

    public function getDataToday()
    {
        $this->db->where('loan_date', date("Y-m-d"));
        return $this->db->count_all_results('loans');
    }
    public function getDataWeekly()
    {
        $weekly = date('Y-m-d', strtotime('-7 days'));
        $this->db->where('loan_date >=', $weekly);
        return $this->db->count_all_results('loans');
    }

    public function getDataMonthly()
    {
        $monthly = date('Y-m-d', strtotime('-30 days'));
        $this->db->where('loan_date >=', $monthly);
        return $this->db->count_all_results('loans');
    }

}
