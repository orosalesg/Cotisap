<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error en el servidor</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/cotisap/logosap.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>


    <div class="row" style="padding-top:5%;padding-bottom:5%;">
        <div class="col-md-4"></div>
    
        <div class="col-md-4" style="align-content:center;text-align:center;">

            <img src="{{ asset('assets/img/error/sadface.png') }}" alt="sadface" height="350" width="350">

            <h1>500</h1>

            <p>
                Error en el servidor. Contacte a soporte <a href="mailto:soporte@mbr.mx">soporte@mbr.mx</a>
            </p>

            <span><a href="javascript:history.back()">Regresar</a></span>
        </div>
    
        <div class="col-md-4"></div>
    </div>

</body>
</html>