<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository {

    public function __construct(User $model) {
        $this->model = $model;
    }

    public function getAllDoctors() {
        return $this->model->where('type', 'doctor')->orderBy('name', 'asc')->get();         // ODWOŁANIE SIĘ DO ELOQUENTA
        // return DB::table('users')->where('type', '=', 'doctor')->get();                   // QUERY BUILDER, dopuszczalne kombinacje jak w SQL, np. OR, AND, JOIN itp...
    }

    public function getAllPatients() {
        return $this->model->where('type', 'patient')->orderBy('name', 'asc')->get();        // ODWOŁANIE SIĘ DO ELOQUENTA
        // return DB::table('users')->where('type', '=', 'patient')->get();                  // QUERY BUILDER, dopuszczalne kombinacje jak w SQL, np. OR, AND, JOIN itp...
    }

    public function getDoctorsStatistics() {
        return DB::table('users')->select(DB::raw('count(*) as user_count, status'))->where('type', 'doctor')->groupBy('status')->get();
        // ------------------------pobierz liczbę użytkowników pasujących i ich status, gdzie typ to doktor i pogrupowane po statusie

    }

    public function getDoctorsBySpecialisation($id) {
        return $this->model->where('type', 'doctor')->whereHas('specialisations',
        function($q) use ($id)
        {
            $q->where('specialisations.id', $id);
        })->orderBy('name', 'asc')->get();
    }
}
