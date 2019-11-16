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

function get_patient($patient_pps) {
    global $db;
    $query = 'SELECT * FROM patients WHERE pps_num = :patient_pps';
    $statement = $db->prepare($query);
    $statement->bindValue(":patient_pps", $patient_pps);
    $statement->execute();
    $record_list = $statement->fetch();
    $statement->closeCursor();
    return $record_list;
}

function get_address($patient_pps) {
    global $db;
    $query = 'SELECT a.id, a.street_address, a.town_city, a.county_id, a.postcode, c.name AS county_name FROM ((addresses as a INNER JOIN patients as p ON p.address_id = a.id)INNER JOIN counties as c ON a.county_id = c.id) WHERE pps_num = :patient_pps';
    $statement = $db->prepare($query);
    $statement->bindValue(":patient_pps", $patient_pps);
    $statement->execute();
    $record_list = $statement->fetch();
    $statement->closeCursor();
    return $record_list;
}

function get_counties() {
    global $db;
    $query = 'SELECT * FROM counties;';
    $statement = $db->prepare($query);
    $statement->execute();
    $counties = $statement->fetchAll();
    $statement->closeCursor();
    return $counties;
}

//function update_address($patient_pps, $firstname, $lastname, $birthdate, $gender, $contact, $email) {
//    global $db;
//    $query = "UPDATE patients SET p_first_name='$firstname', p_last_name='$lastname',  birthdate='$birthdate', gender='$gender', contact_mobile='$contact', email='$email' WHERE pps_num='" . $patient_pps . "'";
//    $statement = $db->prepare($query);
//    $statement->bindValue(":patient_pps", $patient_pps);
//    $statement->execute();
//    $record_list = $statement->fetch();
//    $statement->closeCursor();
//    return $record_list;
//}
?>