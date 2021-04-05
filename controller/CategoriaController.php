<?php 

# ESTABLECEMOS QUE ES UNA APLICACION DE TIPO JSON DE
header('Content-Type: application/json');

require_once __DIR__.'/../config/conexion.php';
require_once __DIR__.'/../models/Categoria.php';

$body = json_decode(file_get_contents("php://input"), true);

$categoria = new Categoria();

switch ($_GET['op']) {
    case 'GetAll':
        $datos = $categoria->get_categoria();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $categoria->get_categoria_x_id($body['cat_id']);
        echo json_encode($datos);        
        break;

    case 'Insert':
        $datos = $categoria->insert_categoria($body['cat_nom'], $body['cat_obs']);
        echo json_encode($datos);        
        break;
 
    case 'Update':
        $datos = $categoria->update_categoria($body['cat_nom'], $body['cat_obs'], $body['est'], $body['cat_id']);
        echo json_encode($datos);        
        break;
 
    case 'Delete':
        $datos = $categoria->delete_update_categoria($body['cat_id']);
        echo json_encode($datos);        
        break;


    default:
        
        break;
}
