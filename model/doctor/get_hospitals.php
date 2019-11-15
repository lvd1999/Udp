<?php

$connect = mysqli_connect("localhost", "root", "", "drbook");
$output = '';
$assocArray["data"] = "";
$assocArray['success'] = false;
if (isset($_POST["county_id"])) {
    if ($_POST["county_id"] != '') {

        try {

            $sql = "SELECT h.id, h.name
                        FROM ((hospitals as h
                            INNER JOIN addresses as a ON h.address_id = a.id)
                            INNER JOIN counties as c ON a.county_id = c.id)
                                WHERE c.id = '". $_POST["county_id"] ."'";
            $result = mysqli_query($connect, $sql);
            $assocArray["data"] = $result;

            $assocArray['success'] = true;
            $assocArray["output"] = '<select name="hospital" id="hospital">';
            while ($r = mysqli_fetch_array($result)) {
//        
//                $array[] = $r;
//                 $assocArray["output"] .= '<option value="'.$r['id'] ;
                $assocArray["output"] = $assocArray["output"] . '<option value="' . $r['id'] . '">'. $r['name'] .'</option>';
            }

//            $assocArray["output"] += '</select>';
//            $assocArray["data"] = $array;
        } catch (Exception $e) {
            $error_message .= $e->getMessage();
        }
    }


//    echo $output;
}
echo json_encode($assocArray);
