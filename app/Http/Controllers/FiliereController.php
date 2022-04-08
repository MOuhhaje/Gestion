<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Etudaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function etuHTML($id){

        $filiere=DB::table('filieres')->where('ID_F', $id)->first();
        $etudaints=DB::select('select * from etudaints where F_ID = ? order by Niveau', [$id]);
        $output='
                <h3 align="center">'.$filiere->Nom.'</h3>
                <table width="100%" style="border-collapse: collapse; border: 0px; font-size: 14px  ">
                    <tr>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="15%">Nom</th>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="10%">Prenom</th>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="10%">CIN</th>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="13%">Apogee</th>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="17%">Ville</th>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="17%">Email</th>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="18%">Annee</th>

                    </tr>';  
        foreach($etudaints as $etudaint){
            $output .= '
                     <tr>
                        <td style="border: 0.5px solid; padding:5px;">'.$etudaint->Nom.'</td>
                        <td style="border: 0.5px solid; padding:5px;">'.$etudaint->Prenom.'</td>
                        <td style="border: 0.5px solid; padding:5px;">'.$etudaint->CIN.'</td>
                        <td style="border: 0.5px solid; padding:5px;">'.$etudaint->Apogee.'</td>
                        <td style="border: 0.5px solid; padding:5px;">'.$etudaint->Adresse.'</td>
                        <td style="border: 0.5px solid; padding:5px;">'.$etudaint->Email.'</td>
                        <td style="border: 0.5px solid; padding:5px;">'.$etudaint->Niveau.'</td>
                     </tr>
                     ';
        }
        $output .= '</table>';
        return $output;
    
    }
    public function pdf($id){

        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->etuHTML($id));
        return $pdf->stream();
    }


    public function index()
    {   
        $filiere=Filiere::all();
        return view('Filiere.index',compact('filiere'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filiere=Filiere::all();
        return view('Filiere.create',compact('filiere'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $reqt)
    {
        $filiere=new Filiere();
        $filiere->Nom=$reqt->Nom;
        $filiere->Capacite=$reqt->Capacite;
        $filiere->save();
        return redirect('ListeFiliere');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filiere=DB::table('filieres')->where('ID_F', $id)->first();
        $etudaint=DB::select('select * from etudaints where F_ID = ?', [$id]);
        return view('Filiere.class',compact('etudaint','filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filiere=DB::table('filieres')->where('ID_F', $id)->first();
        return view('Filiere.edit',compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$id)
    {
        $nom=$req->Nom;
        $capacite=$req->Capacite;
        $filiere=DB::table('filieres')->where('ID_F', $id)->update(['Nom' =>$nom, 'Capacite'=>$capacite ]);
        return redirect('ListeFiliere');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from Filieres where ID_F = ?',[$id]);
        return redirect('ListeFiliere');
    }
}
