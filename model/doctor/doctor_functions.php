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

function get_doctor($doctor_pps) {
    global $db;
    $query = 'SELECT * FROM doctors WHERE pps_num = :doctor_pps';
    $statement = $db->prepare($query);
    $statement->bindValue(":doctor_pps", $doctor_pps);
    $statement->execute();
    $record_list = $statement->fetch();
    $statement->closeCursor();
    return $record_list;
}

function get_hospital($doctor_pps) {
    global $db;
    $query = 'SELECT h.name AS hospital_name,h.id AS hospital_id, a.town_city, c.name as county_name, a.county_id FROM (((hospitals as h INNER JOIN doctors as d ON d.hospital_id = h.id)INNER JOIN addresses as a ON h.address_id = a.id)INNER JOIN counties as c ON a.county_id = c.id) WHERE pps_num = :doctor_pps';
    $statement = $db->prepare($query);
    $statement->bindValue(":doctor_pps", $doctor_pps);
    $statement->execute();
    $record_list = $statement->fetch();
    $statement->closeCursor();
    return $record_list;
}

function get_additional_info_by_pps($doctor_pps) {
    global $db;
    $query = 'SELECT d.university, d.course, d.conferal_date, d.registration_num, d.registration_date, s.speciality_name, d.speciality_date
                FROM (doctors as d
                    INNER JOIN speciality as s ON d.speciality_id = s.id)
                    WHERE d.pps_num = :doctor_pps';
    $statement = $db->prepare($query);
    $statement->bindValue(":doctor_pps", $doctor_pps);
    $statement->execute();
    $record_list = $statement->fetch();
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

function get_patient_pastrecords_by_pps($patient_pps) {
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

function get_schedule($doctor_pps) {
    global $db;
    $query = 'SELECT date,time FROM schedules WHERE doctor_id = (SELECT id FROM doctors WHERE pps_num = :doctor_pps)';
    $statement = $db->prepare($query);
    $statement->bindValue(":doctor_pps", $doctor_pps);
    $statement->execute();
    $list = $statement->fetchAll();
    $statement->closeCursor();
    return $list;
}

?>
