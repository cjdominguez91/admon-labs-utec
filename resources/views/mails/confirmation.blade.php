<!DOCTYPE html>
<html lang="es">
<head>
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div style="background-color: #f2f2f2; padding: 60px; font-family: 'Roboto', 'Serif', 'Sans Serif', 'Arial'">
        <div style="width:600px; height:530px; background-color:#fff; margin: auto;">
            <img src="https://lh3.googleusercontent.com/pw/ACtC-3e4GAvdinPd56L0DNIfVT8QsNxa4lOm5TwiA7ad5y3U93FSpvWhMK165S1_mUaAERcn9-N6yZVXoQ9rXI7nfXgm3_OhUzhb2-ByPaBrYYdqa6kisfwfbsqNPzet6OwaunzQDbb9vG834-9HXHJnBRrd=w600-h135-no?authuser=0" alt="">
            <div class="mail" style="padding: 20px 40px;">
                <h5 style="font-weight: normal;">Administracion de Laboratorios UTEC</h5>
                <hr>
            <b>Hola {{$datamsg['nombre']}}</b>!
            <p style="line-height: 25px">Tu cuenta de acceso ha sido creada exitosamente, ingresa las siguientes credenciales para cambiar la contraseña temporal y activar tu cuenta.</p>
            <ul>
                <li>Usuario: {{$datamsg['email']}}</li>
                <li>contraseña: {{$datamsg['clave']}}</li>
            </ul>
            </div>
            
            <div style="display:flex; justify-content: center; margin-bottom: 40px; "><a href="http://127.0.0.1:8000/home" style=" text-decoration: none; display:inline; padding:6px 40px; color: #5A1533; margin:auto; border: 2px solid #5A1533; border-radius: 20px; font-weight: bold;">Ingresar</a></div>
            <hr>
            <footer style="text-align:center; color: #BDBDBD; font-size: 12px;"><span>UTEC - San Salvador, El Salvador, C.A.</span></footer>
        </div>
        
    </div>
</body>
</html>