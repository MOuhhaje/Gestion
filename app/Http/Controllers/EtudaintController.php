<?php

namespace App\Http\Controllers;

use App\Models\Etudaint;
use Illuminate\Http\Request;
use App\Models\Filiere;
use Illuminate\Support\Facades\DB;
use \stdClass;

class EtudaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function etuHTML(){
        $filiere=DB::select('select * from filieres');
        $etudaints=DB::select('select * from etudaints order by F_ID,Niveau');
        $output='
                <h3 align="center">Liste Globale</h3>
                <table width="100%" style="border-collapse: collapse; border: 0px; font-size: 14px  ">
                    <tr>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="15%">Nom</th>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="10%">Prenom</th>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="10%">CIN</th>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="10%">Apogee</th>
                        <th style="border: 0.5px solid; padding:5px; background-color:#d3eaf2 !important;" width="13%">Filiere</th>
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
                        <td style="border: 0.5px solid; padding:5px;">';
                        foreach($filiere as $fil) {
                           if($fil->ID_F==$etudaint->F_ID){
                               $var=$fil->Nom;
                           }
                        }
            $output .=$var.'</td>
                        <td style="border: 0.5px solid; padding:5px;">'.$etudaint->Adresse.'</td>
                        <td style="border: 0.5px solid; padding:5px;">'.$etudaint->Email.'</td>
                        <td style="border: 0.5px solid; padding:5px;">'.$etudaint->Niveau.'</td>
                     </tr>
                     ';
        }
        $output .= '</table>';
        return $output;
    }
    public function pdf(){
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->etuHTML());
        return $pdf->stream();
    }

    public function index(){
        $etudaint = DB::table('etudaints')->orderBy('Nom')->simplePaginate(6);
       // $etudaint=Etudaint::all();
        $filiere=Filiere::all();
        return view('Etudaint.index',compact('etudaint','filiere'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $filiere=Filiere::all();
        return view('Etudaint.create',compact('filiere'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req){
        $etudaint=new Etudaint();
        $etudaint->Nom=$req->Nom;
        $etudaint->Prenom=$req->Prenom;
        $etudaint->CIN=$req->CIN;
        $etudaint->Email=$req->Email;
        $etudaint->Adresse=$req->Adresse;
        $etudaint->Apogee=$req->Apogee;
        $etudaint->F_ID=$req->F_ID;
        $etudaint->Niveau=$req->Niveau;
        $etudaint->save();
        return redirect('ListeEtudaint');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudaint  $etudaint
     * @return \Illuminate\Http\Response
     */
    public function etuHTMLE($id){
        $etudaint=DB::table('etudaints')->where('ID_Etudaint', $id)->first();     
        $filiere=DB::table('filieres')->where('ID_F',$etudaint->F_ID)->first();
       // $filiere=DB::select('select * from filieres where ID_F = :id', ['id'=>$etudaint->F_ID]);
        $jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        $mois = array(1=>'Janvier','Février','Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Août','Septembre','Octobre','Novembre','Décembre');
        $today= mktime(0, 0, 0,date('n'),date('j'),date('Y') );;
        $outetudaint='<table width="100%" border="0"  style="font-size: 18px;">
                        <tbody >
                            <tr>
                                <td height="50" colspan="3" align="center" style="text-align:center;">
                                    <h2>Formulaire d`étudiant</h2>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td  width="45%" height="40">Le nom et le prénom de l`étudiant</td>
                                <td  width="10%" height="40">:</td>
                                <td  width="45%" height="40">'.$etudaint->Nom.'&nbsp;&nbsp;'.$etudaint->Prenom.'</td>
                            </tr>
                            <tr >
                                <td  width="45%" height="40">Numéro de la carte d`identité nationale</td>
                                <td  width="10%" height="40">:</td>
                                <td  width="45%" height="40">'.$etudaint->CIN.'</td>
                            </tr>
                            <tr >
                                <td  width="45%" height="40"> Code Apogee de l`étudiant</td>
                                <td  width="10%" height="40">:</td>
                                <td  width="45%" height="40">'.$etudaint->Apogee.'</td>
                            </tr>
                            <tr >
                                <td  width="45%" height="40"> Adresse de l`étudiant</td>
                                <td  width="10%" height="40">:</td>
                                <td  width="45%" height="40">'.$etudaint->Adresse.'</td>
                            </tr>
                            <tr>
                                <td height="40" colspan="3" >
                                Cette etudiant est régulièrement inscrit à l`Ecole Supérieure de Technologie Kenitra pour l`année universitaire '.(date('Y')-1).'/'.date('Y').'
                                </td>
                            </tr>

                            <tr>
                                <td height="40" colspan="3" >
                                    Diplom : DUT '.$filiere->Nom.'
                                </td>
                            </tr>
                            <tr>
                                <td height="40" colspan="3"  >
                                Année : '.$etudaint->Niveau.' DUT '.$filiere->Nom.'
                                </td>
                            </tr>
                            <tr>
                                <td height="40" colspan="3"  >
                                <br>
                                </td>
                            </tr>
                            <tr >
                                <td  width="50%" height="80"></td>
                                <td  width="0%" height="80"></td>
                                <td  width="50%" height="80" align="center" style="font-size:12; ">
                                    Fait à kénitra, le '.$jours[date('w',$today)].' '.date('j').' '.$mois[date('n',$today)].' '.date('Y').'
                                    <br>Le Directeur
                                </td>
                            </tr>
                        </tbody>
                    </table>
        ';
        return $outetudaint;

    }
    public function show($id){
        $pdfe=\App::make('dompdf.wrapper');
        $pdfe->loadHTML($this->etuHTMLE($id));
        return $pdfe->stream();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudaint  $etudaint
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $filiere=Filiere::all();
        $etudaint=DB::table('etudaints')->where('ID_Etudaint', $id)->first();
        return view('Etudaint.edit',compact('etudaint','filiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudaint  $etudaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id){
            DB::table('Etudaints')->where('ID_Etudaint', $id)->update([
            'Nom' =>$req->Nom,
            'Prenom'=>$req->Prenom,
            'Adresse'=>$req->Adresse,
            //'Email'->$Email,
            'CIN'=>$req->CIN,
            'Apogee'=>$req->Apogee,
            'F_ID'=>$req->F_ID,
            'Niveau'=>$req->Niveau
            ]);
            
        return redirect('ListeEtudaint');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudaint  $etudaint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from Etudaints where ID_Etudaint = ?',[$id]);
        return redirect('ListeEtudaint');
    }
}
