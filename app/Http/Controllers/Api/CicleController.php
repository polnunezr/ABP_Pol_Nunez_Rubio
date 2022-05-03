<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\Cicle;
use App\Http\Controllers\Controller;
use App\Http\Resources\CicleResource;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cicles = Cicle::all();

        return CicleResource::collection($cicles);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cicle = new Cicle();

        $cicle->sigles = $request->input('sigles');
        $cicle->nom = $request->input('nom');
        $cicle->descripcio = $request->input('descripcio');

        $cicle->actiu = ($request->input('actiu') == 'actiu');
        try {
            $cicle->save();
            $response = (new CicleResource($cicle))
                        ->response()
                        ->setStatusCode(400);
        }
        catch(QueryException $ex)
        {
         $mensaje = Utilitat::errorMessage($ex);
        $response = \response()
                    ->json(['error' => $mensaje],400);
        }
        return $response;

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cicle  $cicle
     * @return \Illuminate\Http\Response
     */
    public function show(Cicle $cicle)
    {
        return new CicleResource($cicle);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cicle  $cicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cicle $cicle)
    {

        $cicle->sigles = $request->input('sigles');
        $cicle->nom = $request->input('nom');
        $cicle->descripcio = $request->input('descripcio');

        $cicle->actiu = ($request->input('actiu') == 'actiu');
        try {
            $cicle->save();
            $response = (new CicleResource($cicle))
                        ->response()
                        ->setStatusCode(400);
        }
        catch(QueryException $ex)
        {
         $mensaje = Utilitat::errorMessage($ex);
        $response = \response()
                    ->json(['error' => $mensaje],400);
        }
        return $response;

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cicle  $cicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cicle $cicle)
    {
        try {
            $cicle->delete();
            $response = \response()
                        ->json(['missatge' => "Registre esborrat correctament"],200);
        }
        catch(QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
                        ->json(['error' => $mensaje],400);
        }
        return $response;
        //
    }
}
