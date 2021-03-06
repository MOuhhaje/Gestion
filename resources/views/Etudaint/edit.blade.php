@extends('Etudaint.layout')

@section('title', 'Modiffier Etudaint')
@section('content')

<form action="{{  route('Etudaint.update' , $etudaint->ID_Etudaint) }}" method="post" class="row">
    @method('put')
    @csrf
    <div class="text-center">
        <h1 class="text-primary">Modiffier Etudiant</h1>
    </div>
    <div class="text-center " style="padding-left: 30%;padding-right: 30%; ">
        <div class="form-group form-floating mb-3 text-center">
            <input  type="text"  name="Nom" placeholder="Nom" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput"
                value="{{ $etudaint->Nom }}" required >
            <label for="floatingInput" class="text-center">Nom</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <input type="text" name="Prenom"placeholder="Entrer Prenom"class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput"
                value="{{ $etudaint->Prenom }}" required>
            <label for="floatingInput" class="text-center">Prenom</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <input type="text" title="CIN" name="CIN"placeholder="Entrer CIN" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" 
                value="{{ $etudaint->CIN }}"required>
            <label for="floatingInput" class="text-center">CIN</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <input type="text" title="Email" name="Email" placeholder="Entrer Email" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" 
                value="{{ $etudaint->Email }}" disabled>
            <label for="floatingInput" class="text-center">Email</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <input type="text" title="Adresse" name="Adresse" placeholder="Entrer Adresse" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" 
                value="{{ $etudaint->Adresse }}"required>
            <label for="floatingInput" class="text-center">Adresse</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <input type="text" title="Apogee" name="Apogee"placeholder="Entrer Apogee" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" 
                value="{{ $etudaint->Apogee}}" required>
            <label for="floatingInput" class="text-center">Apogee</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <select name="F_ID" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" required>
                <option >--Select--</option>
                @foreach ($filiere as $item)
                <option value="{{$item->ID_F  }}" {{ ($item->ID_F == $etudaint->F_ID) ? 'selected' : ''  }}>{{ $item->Nom }}</option> 
                @endforeach
            </select>
            <label for="floatingInput" class="text-center">Filliere</label>
        </div>
        <div class="form-group form-floating mb-3 text-center">
            <select name="Niveau" class="form-control text-center"
                style="border: none;border-bottom: 2px solid #0275d8;" id="floatingInput" required>
                <option >--Select--</option>
                <option value="1??r ann??e" {{ ('1??r ann??e' == $etudaint->Niveau) ? 'selected' : ''  }}>1??r ann??e</option>
                <option value="2??me ann??e"  {{ ('2??me ann??e' == $etudaint->Niveau) ? 'selected' : ''  }}>2??me ann??e</option>
            </select>
            <label for="floatingInput" class="text-center">Niveau</label>
        </div>
        <br>
        <div class="text-center"> 
            <input type="submit" value="Modiffier" class="btn btn-outline-primary " style=" width: 50%;">
        </div>
    </div>
    
    
</form>
@endsection