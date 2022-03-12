<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarGrupoRequest;
use App\Http\Requests\GuardarGrupoRequest;
use App\Http\Resources\GroupResourse;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  GroupResourse::collection(Group::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarGrupoRequest $request)
    {

         return new GroupResourse(Group::create($request -> all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return new GroupResourse($group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarGrupoRequest $request, Group $group)
    {
           $group->update($request -> all());

            // return response()->json([
            // 'res' => true,
            //     'msg' => "Usuario actualizado"
            // ], 200);

            return new GroupResourse($group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return new GroupResourse($group);
    }
}
