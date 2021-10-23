<?php

namespace App\Http\Controllers\Paginas_principal;

use App\Http\Controllers\Controller;
use App\Models\Inicio;
use App\Models\Mensaje_administrador;
use Illuminate\Http\Request;


class PaginasPrincipalController extends Controller
{
    /*----------------------------------------------------------------------------------------------------------------*/
    /*---------------------Metodos para que el administrador haga su modificaciones ----------------------------------*/

    public function indexInfoGeneralAdministrador(){

        $inicio=Incio::all();

    }

    public function editarInfoGneral(){


    }

    public function guardarInfoGeneral(){


    }

    /*-------------------------Creacion de post administrador---------------------------------------------------------*/
    public function lista_post(){



    }

    public function crear_post(){


    }

    public function guardar_post(Request $request){


    }

    public function editar_post($id){


    }

    public function actualizar_post(Request $request, $id){


    }

    public function eliminar_post($id){


    }
    /*----------------------------------------------------------------------------------------------------------------*/
    public function indexSecretaria(){


    }
    /*----------------------------------------------------------------------------------------------------------------*/

    public function indexDoctor(){



    }
    /*----------------------------------------------------------------------------------------------------------------*/

    public function indexPaciente(){



    }

}
