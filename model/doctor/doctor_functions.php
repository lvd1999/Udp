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

function get_hospital_by_countyId($county_id) {
    global $db;
    $query = 'SELECT h.name
                FROM ((hospitals as h
                    INNER JOIN addresses as a ON h.address_id = a.id)
                    INNER JOIN counties as c ON a.county_id = c.id)
                        WHERE c.id = :county_id;';
    $statement = $db->prepare($query);
    $statement->bindValue(":county_id", $county_id);
    $statement->execute();
    $hospitals = $statement->fetchAll();
    $statement->closeCursor();
    return $hospitals;
}

?>