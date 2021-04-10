<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_jawaban extends CI_Model
{
    public function count_jawaban()
    {
        return $this->db->count_all_results('jawaban');
    }
    public function get_all_jawaban()
    {
        return $this->db->get('jawaban')->result();
    }
}