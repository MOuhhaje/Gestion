<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">    
    <title>@yield('title')</title>
        <style>
            a{
                text-decoration: none;
                display: inline-flex;
                transition-duration: 0.5s;
            }
            a:hover{
                color:black;
                transform: scale(1.1);
            }

            input:hover{
                transform: scale(1.1);
            }
            input:focus-visible {
                outline-offset: 0px;
            }
            :focus-visible {
                outline:white auto 0;
                outline-color: white;
                outline-style: auto;
                outline-width: 0;
            }

            #search{
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                font-weight: 400;
                transform-origin: left;
                width: 20%;
                transition-duration: 0.5s;    
            }
            #search:hover{
                width: 40%;
                transform: scale(1,1);
                transform-origin: left;
            }
            #search:focus{
                width: 40%;
            }
            #search:focus-visible{
                width: 40%;
            }

            button{
                transition-duration: 0.5s;
            }
            button:hover{
                transform: scale(1.1);
            }
            
            th{
                background-color:#d3eaf2 !important;
            }
            tr{
                text-align: center;
            }

        </style>
</head>
<body>
    <header>
        <div class="w3-sidebar w3-bar-block" style="display:none;z-index:5" id="mySidebar">
            <button class="w3-bar-item w3-button w3-xxlarge" onclick="w3_close()">&times;</button>
            <a href="/Gestion/public/Home" class="w3-bar-item w3-button">Home</a>
            <a href="{{ route('Filiere.index') }}" class="w3-bar-item w3-button">Liste Fillieres</a>
            <a href="{{ route('Etudaint.index') }}" class="w3-bar-item w3-button">Liste Etudiants</a>
            <a href="{{ route('Filiere.create') }}" class="w3-bar-item w3-button">Ajouter un filliere</a>
            <a href="{{ route('Etudaint.create') }}" class="w3-bar-item w3-button">Ajouter un etudiant</a>

        </div>
        <div class="w3-overlay" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
        <button class="w3-button w3-white w3-xxlarge" onclick="w3_open()">&#9776;</button>
        <script>
            function w3_open() {
              document.getElementById("mySidebar").style.display = "block";
              document.getElementById("myOverlay").style.display = "block";
            }
            
            function w3_close() {
              document.getElementById("mySidebar").style.display = "none";
              document.getElementById("myOverlay").style.display = "none";
            }
        </script>
    </header>
    <div class="container">
        <br>
        <div class="row justify-content-md-center">
            @yield('content')
        </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>