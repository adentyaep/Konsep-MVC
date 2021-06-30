<?php 
    $id=$_POST['id_mobil'];
    $data['mbl'] = $this->model('Mobil_model')->getAllMobilById($id);
    echo json_encode($data['mbl']);
?>