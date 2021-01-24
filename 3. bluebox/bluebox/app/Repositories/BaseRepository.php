<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

class BaseRepository {

    protected $model;

    // POBRANIE WSZYSTICH REKORDÓW Z BAZY
    public function getAll($columns = array('*')) {
        return $this->model->get($columns);
    }

    // TWORZENIE REKORDU W BAZIE ($noweDane)
    public function create($data) {
        return $this->model->create($data);
    }

    // AKTUALIZACJA REKORDU W BAZIE PO ID ($noweDane, $id)
    public function update($data, $id) {
        return $this->model->where("id",'=',$id)->update($data);
    }

    // USUWANIE REKORDU W BAZIE PO ID ($id)
    public function delete($id) {
        return $this->model->destroy($id);
    }

    // ZNAJDUWANIE REKORDU W BAZIE PO ID ($id)
    public function find($id) {
        return $this->model->find($id);
    }

}
