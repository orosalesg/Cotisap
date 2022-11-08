<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container bg-light">
        <div class="row justify-content-center h-100 bg-white shadow-lg">
            <div class="col-md-12">
                <h3>Buenas tardes</h3><br>
                <p>
                    {{$cuerpo}}
                </p>
                <a href="https://account.cotisap.com/"><input type="button" class="btn btn-primary text-white font-weight-bolder" value="Ir a cotisap"></a>
            </div>
        </div>
    </div>    
</body>
</html>