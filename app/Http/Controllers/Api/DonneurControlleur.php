<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDonneurRequest;
use App\Http\Requests\EditDonneurRequest;
use App\Models\DateRdv;
use App\Models\Donneur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonneurControlleur extends Controller
{ 
    public function index(Request $request) {
        
        $query = Donneur::query();
        $perpage = 5;
        $page = $request->input('page', 1);
        $search = $request->input('search');

        if($search){
            $query->whereRaw("nom LIKE '%".$search."%'");
        }

        $total = $query->count();

        $donneurs = $query->offset(($page - 1) * $perpage)->limit($perpage)->get();
        $responseData = [
    'status_code' => 200,
    'current_page' => $page,
    'last_page' => ceil($total / $perpage),
    'items' => $donneurs,
];

return view('donneur', [
    'donneurs' => $responseData,
]);


    }
    public function index_2() {
        $dates = DateRdv::with('donneur')->get();
        $nombreDonneursParDate = DB::table('date_rdvs')
        ->leftJoin('donneurs', 'date_rdvs.id', '=', 'donneurs.date_rdv_id')
        ->select('date_rdvs.id', DB::raw('count(donneurs.id) as donneurs_count'))
        ->groupBy('date_rdvs.id')
        ->get();
        return view('planing', ['dates' => $dates, 'nombreDonneursParDate' => $nombreDonneursParDate]);;
    }
    public function login(){
        return view('login');
    }
    public function store(Request $request) {
        $daterecu = $request->input('rdv');
        $date = DateRdv::where('daterdv', $daterecu)->first();
    
        $donneurData = [
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'contact' => $request->input('contact'),
            'adresse' => $request->input('adresse'),
            'groupe_sanguin' => $request->input('groupe_sanguin'),
            'rhesus' => $request->input('rhesus'),
        ];
    
        if($date){
            $donneurData['date_rdv_id'] = $date->id;
        } else {
            $nouvelleDateRdv = new DateRdv();
            $nouvelleDateRdv->daterdv = $daterecu;
            $nouvelleDateRdv->save();
            $donneurData['date_rdv_id'] = $nouvelleDateRdv->id;
        }
    
        Donneur::create($donneurData);
    
        return redirect('api/donneur');
    }
    
    public function update(EditDonneurRequest $request, Donneur $donneur) {
        $donneur->nom = $request->nom;
        $donneur->prenom = $request->prenom;
        $donneur->contact = $request->contact;
        $donneur->adresse = $request->adresse;
        $donneur->groupe_sanguin = $request->groupe_sanguin;
        $donneur->rhesus = $request->rhesus;
        $donneur->rdv = $request->rdv;
        $donneur->save();
    }
    public function delete(Donneur $donneur) {
        $donneur->delete();
        if($donneur){
            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le donneur a été supprimer',
                'data'=>$donneur
            ]);
        }else{
            return response()->json([
                'status_code' => 422,
                'status_message' => 'Donneur introuvable',
                'data'=>$donneur
            ]);
        }
    }
}
