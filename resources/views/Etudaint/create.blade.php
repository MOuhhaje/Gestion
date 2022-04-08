@extends('Etudaint.layout')

@section('title', 'Ajouter Etudaint')
@section('content')

<form action="{{ route('Etudaint.store') }}" method="post" class="row">
    @csrf
    <div class="text-center">
        <h1 class="text-primary">Ajouter Etudiant</h1>
    </div>
    <div class="text-center " style="padding-left: 30%;padding-right: 30%; ">
        <div class="form-group form-floating mb-3 text-center">
            <input  type="text"  name="Nom" placeholder="Nom" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" required >
            <label for="floatingInput" class="text-center">Nom</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <input type="text" name="Prenom"placeholder="Entrer Prenom"class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" required>
            <label for="floatingInput" class="text-center">Prenom</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <input type="text" title="CIN" name="CIN"placeholder="Entrer CIN" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" required>
            <label for="floatingInput" class="text-center">CIN</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <input type="text" title="Email" name="Email" placeholder="Entrer Email" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" required>
            <label for="floatingInput" class="text-center">Email</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <input type="text" title="Adresse" name="Adresse" placeholder="Entrer Adresse" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" required>
            <label for="floatingInput" class="text-center">Adresse</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <input type="text" title="Apogee" name="Apogee"placeholder="Entrer Apogee" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" required>
            <label for="floatingInput" class="text-center">Apogee</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <select name="F_ID" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" required>
                <option >--Select--</option>
                @foreach ($filiere as $item)
                <option value="{{$item->ID_F  }}">{{ $item->Nom }}</option> 
                @endforeach
            </select>
            <label for="floatingInput" class="text-center">Filliere</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <select name="Niveau" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" required>
                <option >--Select--</option>
                <option value="1èr année">1èr année</option>
                <option value="2ème année">2ème année</option>
            </select>
            <label for="floatingInput" class="text-center">Niveau</label>
        </div>
        <br>
        <div class="text-center"> 
            <input type="submit" value="Save" class="btn btn-outline-primary " style=" width: 50%;">
        </div>
    </div>
    
    
</form>
@endsection