<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class LoginTests extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests if the user is created
     *
     * @return void
     */
     public function test_user_creation()
     {
         $user = new User();
         $user->name = "Carlos";
         $user->email = "carlos@gmail.com";
         $user->password = "12345";
         $user->save();

         $storedUser = User::find($user->id);

         $this->assertTrue($storedUser->name == $user->name);
     }

    public function user_can_login_with_valid_credentials()
    {
        $user = new User();
        $user->name = "Carlos";
        $user->email = "carlos@gmail.com";
        $user->password = "12345";
        $user->save();

         $storedUser = User::find($user->id);
         $storedPassword = User::find($storedUser->password);
         $storedEmail = User::find($storedUser->email);

         $this->assertTrue($storedUser->email == $storedEmail && $storedUser->password == $storedPassword);
    }

    public function user_cannot_login_with_invalid_credentials()
    {
        //ir a base de datos por usuario y contraseña
        //llenar campos
        //verificar que no se pueda acceder (no haya cambio de view)
        //mensaje de error
        $user = new User();
        $user->name = "Carlos";
        $user->email = "carlos@gmail.com";
        $user->password = "12345";
        $user->save();

         $storedUser = User::find($user->id);
         $storedPassword = User::find($storedUser->password);
         $storedEmail = User::find($storedUser->email);

         $this->assertTrue($storedUser->email != $storedEmail || $storedUser->password != $storedPassword);
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
