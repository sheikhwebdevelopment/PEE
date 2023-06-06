<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patients;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    // public function __construct()
    // {
    //     // $this->middleware('auth')->except('home');
        
    // }


    public function home (){
        return view('home');        
    }

    

    public function patients()
    {
        $patients = Patients::paginate(10);
        return view('dashboardpages.Patients', compact('patients'));
    }

    public function Afficher(Patients $patient)
    {
        return view('Patients.AfficherPat', compact('patient'));
    }

    

    public function Ajouter()
    {
        return view('Patients.Ajouter');
    }

    public function supprimer(Patients $patient)
    {
        $patient->delete();
        return redirect()
            ->route('patientspage')
            ->with('success', 'Patient a été bien supprimé ');
    }

    public function modifier(Patients $patient)
    {
        return view('Patients.Modifier', compact('patient'));
    }

    public function update(PatientRequest $request, Patients $patient)
    {
        $formFields = $request->validated();

        //  Stocker les fichiers dans la base de donnée
        $patient->fill($formFields)->save();
        return to_route('patients.modifier', $patient->id)->with('success', 'Le Patient a été bien modifié ');
    }

    public function store(PatientRequest $request)
    {
        // Validation des données par PatientRequest :
        $formFields = $request->validated();

        // Insertion des données dans la table patients :

        Patients::create($formFields);

        return redirect()
            ->route('patientspage')
            ->with('success', 'Patient ajouté avec succès.');
    }
}
