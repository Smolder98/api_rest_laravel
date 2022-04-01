<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarUsuarioRequest;
use App\Http\Requests\GuardarUsuarioRequest;
use App\Http\Resources\UserResourse;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recuperar todos los registros
        return  UserResourse::collection(Users::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarUsuarioRequest $request)
    {
        //guardar datos del usuario

        // return response()->json([
        //     'res' => true,
        //     'msg' => 'Usuario registrado'
        // ], 200);

        //forma para enviar mas atributos
        // return (new UserResourse(Users::create($request -> all()))) -> additional(['msg' => "Mensaja"]);

        return new UserResourse(Users::create($request -> all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Users $user)
    {
        //Metodo para retornar un usuario
        // return response()->json([
        //     'res' => true,
        //     'user' => $user
        // ], 200);

        //Para nosotros manejar la respuesta
        // return (new UserResourse($user))
        //                 -> response()
        //                 ->setStatusCode(200);



        return new UserResourse($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarUsuarioRequest $request, Users $user)
    {
        //Metodo para actualizar usuario

            $user->update($request -> all());

            // return response()->json([
            // 'res' => true,
            //     'msg' => "Usuario actualizado"
            // ], 200);

            return new UserResourse($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        //Metodo para eliminar usuario

        $user -> delete();

        // return response()->json([
        //     'res' => true,
        //         'msg' => "Usuario eliminado"
        //     ], 200);

        return new UserResourse($user);
    }


    public function userGroups($id)
    {
        $user = users::with("groups")
                        ->where('id', $id)
                        ->first();

         return response()->json([
            'res' => true,
                'data' => $user
            ], 200);

    }

    public function userGroupsCreates($id)
    {
        $user = users::with("groupsCreates")->where('id', $id)->first();

         return response()->json([
            'res' => true,
                'data' => $user
            ], 200);
    }

    public function userNotasCreates($id)
    {
        $user = users::with("notasCreates")->where('id', $id)->first();

         return response()->json([
            'res' => true,
                'data' => $user
            ], 200);
    }



      public function findUserForCorreo($correo)
    {
            $user = Users::where([
                "email" => $correo
            ])->get();

         return response()->json([
            'res' => true,
                'data' => $user
            ], 200);
    }


}
