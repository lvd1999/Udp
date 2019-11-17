<?php

function get_pastrecords_by_pps($patient_pps) {
    global $db;
    $query = 'SELECT r.id, p.p_first_name, p.p_last_name, d.d_first_name, d.d_last_name, h.name, r.time, r.status
                FROM (((past_records as r
                    INNER JOIN patients as p ON r.patient_id = p.id)
                    INNER JOIN doctors as d ON r.doctor_id = d.id)
                    INNER JOIN hospitals as h ON d.hospital_id = h.id)
                        WHERE p.pps_num = :patient_pps;';
    $statement = $db->prepare($query);
    $statement->bindValue(":patient_pps", $patient_pps);
    $statement->execute();
    $record_list = $statement->fetchAll();
    $statement->closeCursor();
    return $record_list;
}

function get_upcomingrecords_by_pps($patient_pps) {
    global $db;
    $query = 'SELECT r.id, p.p_first_name, p.p_last_name, d.d_first_name, d.d_last_name, h.name, r.time, r.status
                FROM (((upcoming_appointments as r
                    INNER JOIN patients as p ON r.patient_id = p.id)
                    INNER JOIN doctors as d ON r.doctor_id = d.id)
                    INNER JOIN hospitals as h ON d.hospital_id = h.id)
                        WHERE p.pps_num = :patient_pps;';
    $statement = $db->prepare($query);
    $statement->bindValue(":patient_pps", $patient_pps);
    $statement->execute();
    $record_list = $statement->fetchAll();
    $statement->closeCursor();
    return $record_list;
}

function get_medical_info_by_pps($patient_pps) {
    global $db;
    $query = 'SELECT smoker, doner, blood_type, allergies, diseases, immunisations
                FROM patients
                    WHERE pps_num = :patient_pps';
    $statement = $db->prepare($query);
    $statement->bindValue(":patient_pps", $patient_pps);
    $statement->execute();
    $record_list = $statement->fetch();
    $statement->closeCursor();
    return $record_list;
}

?>