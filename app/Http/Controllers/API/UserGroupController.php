<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarUsuarioGrupoRequest;
use App\Http\Resources\UserGroupResourse;
use App\Models\UserGroup;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          return  UserGroupResourse::collection(UserGroup::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarUsuarioGrupoRequest $request)
    {

            $user_id = $request->user_id;
            $group_id = $request->group_id;
            $status = $request->status;


              $user = DB::table("user_groups")
                            ->where([
                                "user_groups.user_id" => $user_id,
                                "user_groups.group_id" => $group_id
                            ])
                            ->get();

                if($user->count() > 0){

                    return response()->json([
                        'res' => false,
                            'msg' => "Error: Registro ya existe"
                        ], 400);
                }


         return new UserGroupResourse(UserGroup::create($request -> all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserGroup $user)
    {
        // $user = UserGroup::all();

        //  return response()->json([
        //     'res' => true,
        //         'data' => $id
        //     ], 200);

        return new UserGroupResourse($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function usersForGroup($idUsuario, $idGrupo)
    {
            $user = UserGroup::where([
                "user_id" => $idUsuario,
                "group_id" => $idGrupo
            ])->get();

         return response()->json([
            'res' => true,
                'data' => $user
            ], 200);
    }


       public function actualizarGrupoUsuario(GuardarUsuarioGrupoRequest $request)
    {
             $user_id = $request->user_id;
            $group_id = $request->group_id;
            $status = $request->status;


            $affected = DB::table('user_groups')
                 ->where([
                                "user_groups.user_id" => $user_id,
                                "user_groups.group_id" => $group_id
                            ])
              ->update(['status' => $status]);

              if($affected > 0){

                     return response()->json([
                        'res' => true,
                        'data' => $affected
                    ]) ;

              }else{
                    return response()->json([
                        'res' => false,
                        'msg' => 'No se realizo ningun cambio'
                    ]) ;
              }

    }


    public function getStatusUserGroup(Request $request){
            $user_id = $request->user_id;
            $group_id = $request->group_id;

              $user = DB::table("user_groups")
                            ->where([
                                "user_groups.user_id" => $user_id,
                                "user_groups.group_id" => $group_id
                            ])
                            ->get();

                return response()->json([
                        'data' => $user
                ]) ;


    }

    public function userGroupsActives($idGrupo)
    {

             $user = DB::table("users")
                            ->select([
                                "users.id",
                                "users.name",
                                "users.lastname",
                                "users.numberAccount",
                                "users.status as status_user",
                                "users.image",
                                "users.imageCover",
                                "users.email",
                                "user_groups.status as status_user_in_group"
                            ])
                            ->join('user_groups', 'users.id', '=', 'user_groups.user_id')
                            ->where([
                                "user_groups.group_id" => $idGrupo,
                                "user_groups.status" => "1"
                            ])
                            ->get();

                return response()->json([
                        'data' => $user
                ]) ;

    }

    public function userGroupsInvitated($idUser)
    {

             $user = DB::table("groups")
                            ->select([
                                "groups.id",
                                "groups.title",
                                "groups.description",
                                "groups.image",
                                "groups.status as group_status",
                                "groups.user_id_created",
                                "groups.image",
                                "user_groups.status as status_user_group"
                            ])
                            ->join('user_groups', 'groups.id', '=', 'user_groups.group_id')
                            ->where([
                                "user_groups.user_id" => $idUser,
                                "user_groups.status" => "0"
                            ])
                            ->get();

                return response()->json([
                        'data' => $user
                ]) ;

    }


    public function temp(GuardarUsuarioGrupoRequest $request)
    {
        //https://es.stackoverflow.com/questions/235950/actualizar-datos-de-la-base-de-datos-laravel

            // $user = UserGroup::where([
            //     "user_id" => $idUsuario,
            //     "group_id" => $idGrupo
            // ])->get();

            // return response()->json([
            // 'res' => true,
            //     'data' => [
            //         "User id" => $request->user_id,
            //         "Group id" => $request->group_id,
            //         "status" => $request->status
            //     ]
            // ], 200);

            $user_id = $request->user_id;
            $group_id = $request->group_id;
            $status = $request->status;


            //  $user = UserGroup::where([
            //     "user_id" => $user_id,
            //     "group_id" => $group_id,
            //     "status" => $status
            // ])->get();

             $user = DB::table("users")
                            ->join('user_groups', 'users.id', '=', 'user_groups.user_id')
                            ->join('groups', 'groups.id', '=', 'user_groups.group_id')
                            ->where([
                                "user_groups.user_id" => $user_id,
                                "user_groups.group_id" => $group_id
                            ])
                            ->get();

                return response()->json([
                        'data' => $user
                ]) ;

    }








}
