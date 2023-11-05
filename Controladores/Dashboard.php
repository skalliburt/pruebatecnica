<?php

class Dashboard extends Controlador{
    public function __construct(){
        Auth::noAuth();
        parent::__construct();
    }

    public function index(){
        $tipoDoc = DashboardModelo::tipoDoc();
        $proceso = DashboardModelo::proceso();
        $listaDocumentos = DashboardModelo::listaDocumentos();

        $data['tipoDoc'] = $tipoDoc;
        $data['proceso'] = $proceso;
        $data['listaDocumentos'] = $listaDocumentos;
        $data['function_js'] = 'Dashboard.js';
        $this->vistas->getVistas($this,'index',$data);
    }

    public function buscarCodigo(){
        $array = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $concatenaSeleccion = $_POST['concatenaSeleccion'];
            $ultimoregistro = DashboardModelo::ultimoregistro($concatenaSeleccion);
            if(empty($ultimoregistro[0]['ultimo_consecutivo'])){
                $array = ['asignar' => $concatenaSeleccion.'-1'];
            }else{
               $sumaResgistro = $ultimoregistro[0]['ultimo_consecutivo']+1;
               $array = ['asignar' => $concatenaSeleccion.'-'.$sumaResgistro];
            }
        }
        echo json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function registrar(){
        $array = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $DOC_NOMBRE = $_POST['DOC_NOMBRE'];
            $DOC_CODIGO = $_POST['DOC_CODIGO'];
            $DOC_CONTENIDO = $_POST['DOC_CONTENIDO'];
            $DOC_ID_TIPO = $_POST['DOC_ID_TIPO'];
            $DOC_ID_PROCESO = $_POST['DOC_ID_PROCESO'];

            $data = [
                'DOC_NOMBRE'   => $DOC_NOMBRE,
                'DOC_CODIGO'   => $DOC_CODIGO,
                'DOC_CONTENIDO'   => $DOC_CONTENIDO,
                'DOC_ID_TIPO'   => $DOC_ID_TIPO,
                'DOC_ID_PROCESO'   => $DOC_ID_PROCESO,
                
            ];
            
            $idInsert = DashboardModelo::insert('DOC_DOCUMENTO', $data);

            $data = ['status' => true, 'msg' => 'Registro guardado']; 
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function eliminar(){
        $array = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['data'];

            $data = [
                'DOC_ID' => $id
            ];

            $idDelete = DashboardModelo::delete('DOC_DOCUMENTO',$data);
            if($idDelete == 1){
                $data = ['status' => true, 'msg' => 'Se ha eliminado el registro.']; 
            }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function buscarDocumento(){
        $array = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['data'];
            
            $dataDoc = DashboardModelo::buscarDocumento($id);
            
            $data = $dataDoc[0];
            
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function actualizarDocumento(){
        $array = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            print_r($_POST);
        }
    }
    
}