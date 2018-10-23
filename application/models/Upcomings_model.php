<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Upcomings_model extends CI_Model {

    /**
     * @vars
     */
    private $_db;


    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // define primary table
        $this->_db = 'upcomings';
    }


   

    /**
     * Get list of non-deleted users
     *
     * @param  int $limit
     * @param  int $offset
     * @param  array $filters
     * @param  string $sort
     * @param  string $dir
     * @return array|boolean
     */
    function get_all_by_section($id=0 )
    {
        $sort = 'sort'; $dir = 'DESC';
        // start building query
        $sql = "
            SELECT SQL_CALC_FOUND_ROWS *
            FROM {$this->_db}
            WHERE section_id = $id
        ";

       

        // continue building query
        $sql .= " ORDER BY {$sort} {$dir}";

    

        // execute query
        $query = $this->db->query($sql);

        // define results
        if ($query->num_rows() > 0)
        {
            $results['results'] = $query->result_array();
        }
        else
        {
            $results['results'] = NULL;
        }

        // get total count
        $sql = "SELECT FOUND_ROWS() AS total";
        $query = $this->db->query($sql);
        $results['total'] = $query->row()->total;

        // return results
        return $results;
    }

    function get_by_id($id=0 )
    {
        $sort = 'sort'; $dir = 'DESC';
        // start building query
        $sql = "
            SELECT SQL_CALC_FOUND_ROWS *
            FROM {$this->_db}
            WHERE id = $id
        ";

       

   
        // execute query
        $query = $this->db->query($sql);

        // define results
        if ($query->num_rows() > 0)
        {
            $results['results'] = $query->row();
        }
        else
        {
            $results['results'] = NULL;
        }

        // get total count
     

        // return results
        return $results;
    }


}
