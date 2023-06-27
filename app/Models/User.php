<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'name', 'email', 'password', 'created_at', 'updated_at' ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [ 'beforeInsert' ];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [ 'beforeUpdate' ];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    /**
     * @param array $data
     * @return array
     */
    protected function beforeInsert( array $data ):array
    {
        $data   =   $this->passwordHash( $data );
        $data[ 'data' ][ 'created_at' ] =   date( 'Y-m-d H:i:s' );
        return $data;
    }

    /**
     * @param array $data
     * @return array
     */
    protected function beforeUpdate( array $data ):array
    {
        $data   =   $this->passwordHash( $data );
        $data[ 'data' ][ 'updated_at' ] =   date( 'Y-m-d H:i:s' );
        return $data;
    }

    protected function passwordHash( array $data )
    {
        if ( isset( $data[ 'data' ][ 'password' ] ) ):
                $data[ 'data' ][ 'password' ]   =   password_hash( $data[ 'data' ][ 'password' ], PASSWORD_DEFAULT );
            endif;

            return $data;
    }

}
