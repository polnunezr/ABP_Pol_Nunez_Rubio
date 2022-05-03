<?php

namespace App\Http\Controllers;

use App\Clases\Utilitat;
use App\Models\Cicle;
use App\Models\Curs;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $optionSelect = $request->input("cicleSelect");
        $actiu = $request->input("actiuCheckBox");

        $cursos = [];

        if(($optionSelect == "Tots els cicles" && $actiu != "actiu") || !isset($optionSelect)) {
            $cursos = Curs::orderBy("nom")->paginate(6)->withQueryString();
        }
        else if($optionSelect == "Tots els cicles" && $actiu == "actiu") {
            $cursos = Curs::where("actiu","=",true)->orderBy("nom")->paginate(6)->withQueryString();
            // $cursos->cicle->nom
        }
        else {
            $cicle = Cicle::where("nom","=",$optionSelect)->get();
            $cicleId = $cicle[0]->id;

            if($actiu == "actiu") {
                $cursos = Curs::where("actiu","=",true)->where("cicles_id","=",$cicleId)->orderBy("nom")->paginate(6)->withQueryString();
            }
            else {
                $cursos = Curs::where("cicles_id","=",$cicleId)->orderBy("nom")->paginate(6)->withQueryString();
            }
        }

        $request->flash($request->input());

        $cicles = Cicle::where("actiu","=",true)->orderBy("nom")->get();
        return view("cursos.index",compact("cursos","cicles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insert = true;
        $cicles = Cicle::where("actiu","=",true)->orderBy("nom")->get();
        return view("cursos.curs",compact("insert","cicles"));
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

        $nomCicle = $request->input("selectCiclesCreate");
        $cicle = Cicle::where("nom","=",$nomCicle)->get();
        $cicleId = $cicle[0]->id;

        $curs->cicles_id = $cicleId;

        $actiu = $request->input("checkBoxCreate");

        if($actiu == "actiu") {
            $curs->actiu = true;
        }
        else {
            $curs->actiu = false;
        }

        $response = "";

        try {
            $curs->save();
            $response = redirect()->action([CursController::class,"index"]);
        }
        catch(QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            session()->flash("error",$mensaje);
            $response = redirect()->action([CursController::class,"create"])->withInput();
        }



        return $response;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curs  $curs
     * @return \Illuminate\Http\Response
     */
    public function show(Curs $curs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curs  $curs
     * @return \Illuminate\Http\Response
     */
    public function edit($curs_id)
    {
        $curs = Curs::find($curs_id);
        $insert = false;
        $cicles = Cicle::where("actiu","=",true)->orderBy("nom")->get();
        return view("cursos.curs",compact("insert","cicles","curs"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curs  $curs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $curs_id)
    {
        $curs = Curs::find($curs_id);

        $curs->sigles = $request->input("inputSiglesCreate");
        $curs->nom = $request->input("inputNomCreate");

        $nomCicle = $request->input("selectCiclesCreate");
        $cicle = Cicle::where("nom","=",$nomCicle)->get();
        $cicleId = $cicle[0]->id;

        $curs->cicles_id = $cicleId;

        $actiu = $request->input("checkBoxCreate");

        if($actiu == "actiu") {
            $curs->actiu = true;
        }
        else {
            $curs->actiu = false;
        }

        $response = "";

        try {
            $curs->save();
            $response = redirect()->action([CursController::class,"index"]);
        }
        catch(QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            session()->flash("error",$mensaje);
            $response = redirect()->action([CursController::class,"edit"],["cur" => $curs->id])->withInput();
        }



        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curs  $curs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$curs_id)
    {
        $curs = Curs::find($curs_id);

        $curs->delete();

        return redirect()->action([CursController::class,"index"]);
    }
}
