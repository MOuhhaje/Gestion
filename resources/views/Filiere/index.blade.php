@extends('Filiere.layout')
@section('title', 'Liste Fillieres')
@section('content')
<h1>Fillieres</h1>
<div>
    <div style="display: inline">
        <i class="bi bi-search" style="border: none;border-bottom: 2px solid #0275d8; color:#0275d8; font-size: 120%;padding-bottom: 7px;
        margin-right: -5.25px;"></i>
        <form action="" method="get" style="display: inline">
            <input type="text" clas s=""  placeholder="Search..." id="search" style="border: none;border-bottom: 2px solid #0275d8;">
        </form>
    </div>
    <a  href="{{ route('Filiere.create')}}" title="Nouveau Filliere" class="float-end" >
    <button class="btn btn-success">
        Ajouter
        <i class="bi bi-plus-lg"></i>
    </button>
    </a>
    <table class="table table-striped table-light table-hover text-center">
        <thead class="bg-dark ">
            <tr>
                <th>#</th>
                <th>Nom de filliere</th>
                <th>Capacite</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filiere as $item)
                <tr>
                    <td>{{ $item->ID_F }}</td>
                    <td>{{ $item->Nom}}</td>
                    <td>{{ $item->Capacite }}</td>
                    <td colspan="3">
                        <div class="d-flex justify-content-center">
                            <a  href="Filiere/show/{{$item->ID_F}}" style="transition-duration: 0.5s" title="Afficher"> 
                                <button class="btn btn-warning">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            </a>
                            <a  href="{{  route('Filiere.edit' , $item->ID_F) }}" style="transition-duration: 0.5s" title="Modiffier">
                                <button class="btn btn-info">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </a>
                            <a  href="Filiere/delete/{{$item->ID_F}}" style="transition-duration: 0.5s" title="Supprimer">
                                <button class="btn btn-danger">
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