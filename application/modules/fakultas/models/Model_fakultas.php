<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_fakultas extends CI_Model
{
    public function count_fakultas()
    {
        return $this->db->count_all_results('fakultas');
    }
    public function get_all_fakultas()
    {
        return $this->db->get('fakultas')->result();
    }
}