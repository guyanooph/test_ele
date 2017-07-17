<?php namespace App\Repositories;

use House;

class DbHouseRepository implements HouseRepositoryInterface {
    
    public function selectAll()
    {
        return House::all();
    }

    public function find($id)
    {
        return House::find($id);
    }
}
