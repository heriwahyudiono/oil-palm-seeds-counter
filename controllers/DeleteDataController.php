<?php
require_once '../models/DataModel.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $model = new DataModel();

    $data = $model->getDataById($id);

    $model->deleteData($id);
    
    $model->closeConnection();

    header("Location: ../views/data.php");
}
