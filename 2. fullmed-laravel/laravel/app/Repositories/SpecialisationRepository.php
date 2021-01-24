<?php

namespace App\Repositories;

use App\Models\Specialisation;

class SpecialisationRepository extends BaseRepository {

    public function __construct(Specialisation $model) {
        $this->model = $model;
    }

}
