<?php

require_once('../../model/database.php');
session_start();

if ($_POST) {
    $string = $_POST['string'];
    if (strpos($string, "completed") !== false) {
        $index = strpos($string, "completed");
        $id = substr($string,0,$index);
        $status = substr($string,$index);
        
        $query1 = "SELECT * FROM upcoming_appointments WHERE id = :id";
        $statement2 = $db->prepare($query1);
        $statement2->bindValue(':id', $id);
        $statement2->execute();
        $list = $statement2->fetch();
        $statement2->closeCursor();
        
        $patient_id = $list['patient_id'];
        $doctor_id = $list['doctor_id'];
        $time = $list['time'];
        
        
        
        $query = "INSERT INTO past_records (id, patient_id, doctor_id,time, status) VALUES 
                    (:id, :patient_id, :doctor_id, :time, :status)";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':patient_id', $patient_id);
        $statement->bindValue(':doctor_id', $doctor_id);
        $statement->bindValue(':time', $time);
        $statement->bindValue(':status', $status);
        $statement->execute();
        $statement->closeCursor();
        
        $query = "DELETE FROM upcoming_appointments WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
        
        echo 'success';
    }
    
    else
    {
        exit();
    }

} else {
    // so you can access the error message in jQuery
    echo json_encode(array('errror' => TRUE, 'message' => 'a problem occured'));
    exit;
}
?>