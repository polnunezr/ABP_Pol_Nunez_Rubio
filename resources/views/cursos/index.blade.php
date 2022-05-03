@extends("plantillas.index")

@section("title","index")

@section("container")
    <div class="row rowCards">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>Buscar</strong></h5>
                        <form class="" action="{{ action([App\Http\Controllers\CursController::class,"index"]) }}" method="GET">
                            @csrf
                            <div class="row form-row">
                                <div class="col col-1 d-flex justify-content-center align-items-center">
                                    <label for="cicleSelect">Cicle</label>
                                </div>
                                <div class="col col-9">
                                    <select class="form-select" id="cicleSelect" name="cicleSelect">
                                        <option
                                        @if(old("cicleSelect") === "" || old("cicleSelect") === "Tots els cicles")
                                            selected
                                            @endif
                                            >Tots els cicles</option>
                                        @foreach ($cicles as $cicle)
                                            <option
                                            @if(old("cicleSelect") === $cicle->nom)
                                            selected
                                            @endif
                                            >{{ $cicle->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col col-1 mt-2 d-flex justify-content-end">
                                    <div class="form-check">
                                        <label class="form-check-label" for="actiuCheckBox">
                                            Actiu
                                        </label>
                                        @if(old("actiuCheckBox") == "actiu")
                                            <input class="form-check-input" type="checkbox" value="actiu" id="actiuCheckBox" name="actiuCheckBox" checked>
                                        @else
                                            <input class="form-check-input" type="checkbox" value="actiu" id="actiuCheckBox" name="actiuCheckBox">
                                        @endif

                                    </div>
                                </div>
                                <div class="col col-1 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>


                        </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row rowCards">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>Cursos</strong></h5>
                    @if (count($cursos) === 0)
                    <div class="alert alert-light" role="alert">
                        No hi ha cap curs, per la cerca realitzada
                      </div>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">Sigles</th>
                                  <th scope="col">Nom</th>
                                  <th scope="col">Cicle</th>
                                  <th scope="col">Actiu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $curs)
                                <tr>
                                    <td scope="row">{{ $curs->sigles }}</td>
                                    <td>{{ $curs->nom }}</td>
                                    <td>{{ $curs->cicle->nom }}</td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                Actiu
                                            </label>
                                            @if ($curs->actiu == true)
                                                <input class="form-check-input" type="checkbox" disabled checked>
                                            @else
                                                <input class="form-check-input" type="checkbox" disabled>
                                            @endif

                                        </div>
                                    </td>
                                    <td>
                                        <div class="row form-row">
                                            <div class="col col-6 d-flex justify-content-end">
                                                <form action="{{ action([App\Http\Controllers\CursController::class,"edit"],["cur" => $curs->id]) }}"
                                                    method="GET">
                                                    <button type="submit" class="btn btn-secondary btn-sm ">
                                                        <i class="far fa-edit "></i>&nbsp;&nbsp;Editar
                                                    </button>
                                                </form>

                                            </div>
                                            <div class="col col-6 d-flex justify-content-end">
                                                <button type="button" class="btn btn-danger btn-sm ml-1 trashButtons"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-sigles="{{ $curs->sigles }}"
                                                    data-action=
                                                    "{{ action([App\Http\Controllers\CursController::class,'destroy'],["cur" => $curs->id]) }}">
                                                    <i class="far fa-trash-alt"></i>&nbsp;&nbsp;Esborrar
                                                </button>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($cursos) !== 0)
                        {{ $cursos->links() }}
                        @endif
                    @endif


                </div>
            </div>
        </div>


    </div>
    <div class="row" style="height: 100px">
        <div class="col d-flex justify-content-end align-items-end">
            <a href="{{ action([App\Http\Controllers\CursController::class,"create"]) }}">
                <button type="button" class="btn btn-primary" style="margin-right: 30px">
                    <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Nou Curs</button>
            </a>

        </div>
    </div>




    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Esborrar Curs</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p id="pModalBody"></p>
            </div>
            <div class="modal-footer">
                <form id="formModal" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fa fa-x"></i> &nbsp;Tancar</button>
                    <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i>&nbsp;Esborrar</button>
                </form>

            </div>
          </div>
        </div>
      </div>

@endsection
