<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {                               // KLASA Z PODSTAWOWYMI OPERACJAMI NA BAZIE DANYCH

    protected $model;

    public function getAll($columns = array('*')) {              // pobieranie wszystkich danych
        return $this->model->get($columns);
    }

    public function create($data) {                              // tworzenie danych
        return $this->model->create($data);
    }

    public function update($data, $id) {                         // aktualizacja danych po danym id
        return $this->model->where("id", '=',$id)->update($data);
    }

    public function delete($id) {                                // usuwanie danych po danym id
        return $this->model->destroy($id);
    }

    public function find($id) {                                  // znajdywanie danych
        return $this->model->find($id);
    }

}
