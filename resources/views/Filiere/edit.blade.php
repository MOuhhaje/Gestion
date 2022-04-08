@extends('Filiere.layout')
@section('title', 'Modiffier Filliere')
@section('content')
<form action="{{  route('Filiere.update' , $filiere->ID_F) }}" method="post" class="row text-center">
    @method('put')
    @csrf
    <div class="text-center">
        <h1 class="text-primary ">Modiffier Filiere</h1>
    </div>
    <div class="text-center" style="padding-left: 30%;padding-right: 30%; ">
        <div  class="form-floating mb-3 text-center">
            <input style="border: none;border-bottom: 2px solid #0275d8;" type="text"  
            class="form-control text-center" id="floatingInput" name="Nom" placeholder="nom" value="{{ $filiere->Nom }}" required >
            <label  for="floatingInput" class="text-center" >Nom de filliere</label>
        </div>
        <div  class="form-floating mb-3 text-center">
            <input style="border: none;border-bottom: 2px solid #0275d8;" type="text"  
            class="form-control text-center" id="floatingInput" name="Capacite" placeholder="capacite" value="{{ $filiere->Capacite }}" required>
            <label for="floatingInput"  class="text-center" >Capacite de filliere</label>
        </div>
        <div class="form-floating mb-3 " style="text-align: center;">
            <input type="submit" value="Modiffier"  class="btn btn-outline-primary  btn-lg" style=" width: 50%; transition-duration: 0.5s;">
        </div>
    </div>
   
</form>
@endsection