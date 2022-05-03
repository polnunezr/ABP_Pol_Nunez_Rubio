@extends("plantillas.index")

@section("title","Politecnics ABP - Curs")

@section("container")

@include("partials.mensajes")

<div class="row rowCards">
    <div class="col">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title"><strong>Curs</strong></h5>
                @if ($insert === true)
                <form action="{{action([App\Http\Controllers\CursController::class,"store"])}}" method="POST">
                @else
                <form action="{{action([App\Http\Controllers\CursController::class,"update"],["cur" => $curs->id])}}" method="POST">
                    @method("PUT")
                @endif
                    @csrf
                    <div class="row form-row" style="margin-top: 30px">
                    <div class="col col-1 d-flex justify-content-center align-items-center">
                        <label for="inputSiglesCreate">Sigles</label>
                    </div>
                    <div class="col col-11">
                        <input class="form-control" type="text" id="inputSiglesCreate" name="inputSiglesCreate"
                        @if ($insert === false)
                            placeholder="{{ $curs->sigles }}"
                        @endif
                        @if(old("inputSiglesCreate") !== "")
                            value="{{old("inputSiglesCreate")  }}"
                        @endif
                        required>
                        </div>
                    </div>

                    <div class="row form-row" style="margin-top: 30px">
                        <div class="col col-1 d-flex justify-content-center align-items-center">
                        <label for="inputNomCreate">Nom</label>
                        </div>
                        <div class="col col-11">
                        <input class="form-control" type="text" id="inputNomCreate" name="inputNomCreate"
                        @if ($insert === false)
                            placeholder="{{ $curs->nom }}"
                        @endif
                        @if(old("inputNomCreate") !== "")
                            value="{{old("inputNomCreate")  }}"
                        @endif
                        required>
                        </div>
                    </div>

                    <div class="row form-row" style="margin-top: 30px">
                        <div class="col col-1 d-flex justify-content-center align-items-center">
                        <label for="selectCiclesCreate">Cicles</label>
                        </div>
                        <div class="col col-11">
                            <select class="form-select" id="selectCiclesCreate" name="selectCiclesCreate">
                                @if ($insert === true)
                                    @foreach ($cicles as $cicle)
                                        <option>{{ $cicle->nom }}</option>
                                    @endforeach
                                @else
                                    @foreach ($cicles as $cicle)
                                        <option
                                        @if ($cicle->nom === $curs->cicle->nom))
                                            selected
                                        @endif
                                        >{{ $cicle->nom }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>

                    <div class="row form-row" style="margin-top: 30px">
                        <div class="col col-1 d-flex justify-content-center align-items-center">
                        <label for="checkBoxCreate">Actiu</label>
                        </div>
                        <div class="col col-11">
                            <input class="form-check-input" type="checkbox" value="actiu" id="checkBoxCreate" name="checkBoxCreate"
                            @if ($insert === false)
                                @if ($curs->actiu == true)
                                    checked
                                @endif
                            @endif
                            @if (old("checkBoxCreate") === "actiu")
                                checked
                            @endif
                            >
                        </div>
                    </div>
                    <div class="row form-row" style="margin-top: 30px">
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-solid fa-check"></i>&nbsp;&nbsp;Aceptar</button>
                                <a href="{{ action([App\Http\Controllers\CursController::class,"index"]) }}">
                                    <button type="button" class="btn btn-secondary" style="margin-left: 6px">
                                        <i class="fa fa-solid fa-xmark"></i>&nbsp;&nbsp;Cancel·lar</button>
                                </a>

                        </div>

                    </div>
                </form>

              </div>
            </div>
        </div>
    </div>
</div>


@endsection
