<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialisation;
use App\Repositories\SpecialisationRepository;    // odwołanie się do SpecialisationRepository.php
use Illuminate\Support\Facades\Auth as FacadesAuth; // fasada logowania i zabezpieczania middleware

class SpecialisationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(SpecialisationRepository $specialisationRepo) {              // WYŚWIETLANIE LISTY SPECJALIZACJI

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        $specialisations = $specialisationRepo->getAll();

        return view('specialisations.list', ["specialisations"=>$specialisations,
                                     "footerYear" => date('Y'),
                                     "title" => "Moduł specjalizacje"
                                     ]);
    }

    public function create() {

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        return view('specialisations.create', ["footerYear" => date('Y')]);
    }

    public function store(Request $request) {

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        $specialisation = new specialisation;                 // tworzymy nowy obiekt
        $specialisation->name = $request->input('name');      // pobierz z formularza name
        $specialisation->save();                              // zapisz w bazie

        // return redirect()->action('${App\Http\Controllers\SpecialisationController@index}');
        return redirect()->action('App\Http\Controllers\SpecialisationController@index');    // header location
    }
}
