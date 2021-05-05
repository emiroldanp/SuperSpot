<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class LoginTests extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

     //dudas asesoría
     /*
        - tengo que checar credenciales en base de datos o puedo usar dummy data
        - como jalo la informacion de la base de datos
     */

     public function user_can_create_account()
     {
         //llenar formulario
         //ir a base de datos y verificar que se haya creado
         //regresar resultado
     }

    public function user_can_login_with_valid_credentials()
    {
        //ir a base de datos por usuario y contraseña
        //llenar campos
        //verificar que se pueda acceder (cambio de view)
    }

    public function user_cannot_login_with_invalid_credentials()
    {
        //ir a base de datos por usuario y contraseña
        //llenar campos
        //verificar que no se pueda acceder (no haya cambio de view)
        //mensaje de error
    }

    public function user_can_leave_comment()
    {
        //agregar comentario
        //ver en base de datos que se haya creado

    }

    public function user_can_give_like()
    {
       //dar like o dislike
       //ver en base de datos que se haya agregado correctamente
    }

}
