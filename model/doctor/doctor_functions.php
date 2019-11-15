<?php

function get_counties() {
    global $db;
    $query = 'SELECT * FROM counties;';
    $statement = $db->prepare($query);
    $statement->execute();
    $counties = $statement->fetchAll();
    $statement->closeCursor();
    return $counties;
}

function get_upcomingrecords_by_pps($doctor_pps) {
    global $db;
    $query = 'SELECT r.id, p.pps_num, p.p_first_name, p.p_last_name, r.time, r.status
                FROM (((upcoming_appointments as r
                    INNER JOIN patients as p ON r.patient_id = p.id)
                    INNER JOIN doctors as d ON r.doctor_id = d.id)
                    INNER JOIN hospitals as h ON d.hospital_id = h.id)
                        WHERE d.pps_num = :doctor_pps;';
    $statement = $db->prepare($query);
    $statement->bindValue(":doctor_pps", $doctor_pps);
    $statement->execute();
    $record_list = $statement->fetchAll();
    $statement->closeCursor();
    return $record_list;
}

function get_pastrecords_by_pps($doctor_pps) {
    global $db;
    $query = 'SELECT r.id, p.pps_num, p.p_first_name, p.p_last_name, r.time, r.status
                FROM (((past_records as r
                    INNER JOIN patients as p ON r.patient_id = p.id)
                    INNER JOIN doctors as d ON r.doctor_id = d.id)
                    INNER JOIN hospitals as h ON d.hospital_id = h.id)
                        WHERE d.pps_num = :doctor_pps;';
    $statement = $db->prepare($query);
    $statement->bindValue(":doctor_pps", $doctor_pps);
    $statement->execute();
    $record_list = $statement->fetchAll();
    $statement->closeCursor();
    return $record_list;
}

?>