<?php

namespace App\Http\Controllers\Api;
use App\Clases\Utilitat;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Models\Curs;
use Illuminate\Http\Request;
use App\Http\Resources\CursResource;
use App\Models\Cicle;


class CursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curs = Curs::all();
        return CursResource::collection($curs);
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
        $curs = new Curs();
        $curs->sigles = $request->input("inputSiglesCreate");
        $curs->nom = $request->input("inputNomCreate");
        $curs->cicles_id = 1;

        try {
            $curs->save();

            $response = (new CursResource($curs))
                        ->response()
                        ->setStatusCode(201);
        }
        catch(QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
                        ->json(["error" => $mensaje], 400);
        }



        return $response;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curs  $curs
     * @return \Illuminate\Http\Response
     */
    public function show(Curs $cur)
    {
        return  new CursResource($cur);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curs  $curs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curs $cur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curs  $curs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curs $cur)
    {

        $cur->delete();

        //
    }
}
