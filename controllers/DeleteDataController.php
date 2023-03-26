<?php
require_once '../models/DataModel.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $model = new DataModel();

    $data = $model->getDataById($id);

    $model->deleteData($id);
    
    header("Location: ../views/data.php");
    exit();
}
