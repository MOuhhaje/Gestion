@extends('Filiere.layout')
@section('title', 'Ajouter Filliere')
@section('content')
<form action="{{ route('Filiere.store') }}" method="post" class="row text-center">
    @csrf
    <div class="text-center">
        <h1 class="text-primary ">Ajouter Filiere</h1>
    </div>
    <div class="text-center" style="padding-left: 30%;padding-right: 30%; ">
        <div  class="form-floating mb-3 text-center">
            <input style="border: none;border-bottom: 2px solid #0275d8;" type="text"  
            class="form-control text-center" id="floatingInput" name="Nom" placeholder="nom" required >
            <label  for="floatingInput" class="text-center" >Nom de filliere</label>
        </div>
        <div  class="form-floating mb-3 text-center">
            <input style="border: none;border-bottom: 2px solid #0275d8;" type="text"  
            class="form-control text-center" id="floatingInput" name="Capacite" placeholder="capacite" required>
            <label for="floatingInput"  class="text-center" >Capacite de filliere</label>
        </div>
        <div class="form-floating mb-3 " style="text-align: center;">
            <input type="submit" value="Save"  class="btn btn-outline-primary  btn-lg" style=" width: 50%;">
        </div>
    </div>
   
</form>
@endsection