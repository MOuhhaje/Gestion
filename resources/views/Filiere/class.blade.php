@extends('Filiere.layout')
@section('title', 'Classe '.$filiere->Nom)
@section('content')
<h1>{{ $filiere->Nom }}</h1>
<div>
   
</div>
</div>
<div>
    <i class="bi bi-search" style="border: none;border-bottom: 2px solid #0275d8; color:#0275d8; font-size: 120%;padding-bottom: 7.35px;
    margin-right: -5.25px;"></i>
    <input type="text" class="" id="search" name="search" placeholder="Search..." style="border: none;border-bottom: 2px solid #0275d8; float:">
    <div class="float-end">
        <a href="/Gestion/public/Filiere/pdf/{{$filiere->ID_F}}"style="transition-duration: 0.5s" >
            <button class="btn btn-secondary">
                Liste PDF
                <i class="bi bi-file-earmark-pdf"></i>
            </button>
        </a>
        <a  href="{{ route('Etudaint.create')}}" title="Nouveau Etudaint" class="float-end">
            <button class="btn btn-success">
                Ajouter
                <i class="bi bi-plus-lg"></i>
            </button>
        </a>
    </div>
    <table class="table table-striped table-light table-hover text-center" style="font-size: 14px">
        <thead class="bg-dark ">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Annee</th>
               <!-- <th>Filliere</th>-->
                <th>Apogee</th>
                <th>CIN</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudaint as $item)
                <tr>
                    <td>{{ $item->Nom }}</td>
                    <td>{{  $item->Prenom}}</td>
                    <td>{{ $item->Niveau }}</td>
                   <!-- <td>
                   
                    </td>-->
                    <td>{{ $item->Apogee }}</td>
                    <td>{{ $item->CIN }}</td>
                    <td>{{ $item->Adresse }}</td>
                    <td>{{ $item->Email }}</td>
                    <td colspan="3">
                        <div class="d-flex justify-content-end">
                            <a  href="Etudaint/show/{{route('Etudaint.show',$item->ID_Etudaint)}}" 
                                style="transition-duration: 0.5s" title="Afficher">
                                <button class="btn btn-warning">
                                    <i class="bi bi-eye-fill d-flex"></i>
                                </button>
                            </a>
                            <a  href="{{  route('Etudaint.edit' , $item->ID_Etudaint) }}" style="transition-duration: 0.5s" title="Modiffier">
                                <button class="btn btn-info d-flex" style="align-content: center">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </a>
                            <a  href="Etudaint/delete/{{$item->ID_Etudaint}}" style="transition-duration: 0.5s" title="Supprimer">
                                <button class="btn btn-danger d-flex">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </a>
                            
                        </div>
                    </td>
                </tr>
             @endforeach 
        </tbody>
    </table>
</div>
@endsection