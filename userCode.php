<?php

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'saveUser':
            saveUser();
            break;
        case 'getUser':
            getUser();
            break;
        case 'deleteUser':
            deleteUser();
            break;
        case 'getUsers':
            getUsers();
            break;
        case 'prepareUpdate':
            prepareUpdate();
            break;
        case 'updateUser':
            updateUser();
            break;
    }
}

function getUsers() {
    $response = file_get_contents("http://193.191.187.14:10318/CostCalculatorRest/user/getAll");
    $responseJson = json_decode($response, true);

    $amount = count($responseJson);

    if ($amount === 0) {
        echo 'There are no users available';
    }
    for ($x = 0; $x < $amount; $x++) {
        echo '<div>Email: ' . $responseJson[$x]['email'] . '<br>';
        echo 'Firstname: ' . $responseJson[$x]['firstName'] . '<br>';
        echo 'Lastname: ' . $responseJson[$x]['lastName'] . '<br>Costs:';
        $costs = $responseJson[$x]['costs'];
        $amount2 = count($costs);
        for ($w = 0; $w < $amount2; $w++) {
            echo '<p>';
            echo 'Cost ID: ' . $costs[$w]['id'] . '<br>';
            echo 'Cost owner: ' . $costs[$w]['owner'] . '<br>';
            echo 'Cost location: ' . $costs[$w]['location'] . '<br>';
            echo ' <br>';
            echo '</p>';
        }
        echo '<br></br></div>';
        echo '<p id=break><-----------------></p></br></br>';
    }
}

function saveUser() {
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/user';
    $ch = curl_init($url);
# Setup request to send json via POST.
    $payload = $data;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Send request.
    curl_exec($ch);
    $header = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
# Print response.
    if ($header == 200) {
        echo "User succesfully added";
    } else {
        echo "Something went wrong, check the given data!";
    }
}

function getUser(){
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/user/getByEmail';
    $ch = curl_init($url);
# Setup request to send json via POST.
    $payload = $data;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Send request.
    $result = curl_exec($ch);
    $header = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
# Print response.
    if ($header == 200) {
        $responseJson = json_decode($result, true);
        echo '<div>Email: ' . $responseJson['email'] . '<br>';
        echo 'Firstname: ' . $responseJson['firstName'] . '<br>';
        echo 'Lastname: ' . $responseJson['lastName'] . '<br>Costs:';
        $costs = $responseJson['costs'];
        $amount = count($costs);
        for ($w = 0; $w < $amount; $w++) {
            echo '<p style=margin-left:50px;>';
            echo 'Cost ID: ' . $costs[$w]['id'] . '<br>';
            echo 'Cost owner: ' . $costs[$w]['owner'] . '<br>';
            echo 'Cost location: ' . $costs[$w]['location'] . '<br>';
            echo ' <br>';
            echo '</p>';
        }
        echo '</div>';
    } else {
        echo "Something went wrong, check the given data!";
    }
}


function deleteUser() {
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/user/deleteUser';
    $ch = curl_init($url);
# Setup request to send json via POST.
    $payload = $data;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Send request.
    curl_exec($ch);
    $header = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
# Print response.
    if ($header == 200) {
        echo "User succesfully deleted";
    } else {
        echo "Something went wrong, check the given data!";
    }
}

function prepareUpdate(){
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/user/getByEmail';
    $ch = curl_init($url);
# Setup request to send json via POST.
    $payload = $data;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Send request.
    $result = curl_exec($ch);
    curl_close($ch);
# Print response.
    echo $result;
}

function updateUser(){
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/user/updateUser';
    $ch = curl_init($url);
# Setup request to send json via POST.
    $payload = $data;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Send request.
    curl_exec($ch);
    $header = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
# Print response.
    if ($header == 200) {
        echo "User succesfully updated";
    } else {
        echo "Something went wrong, check the given data!";
    }
}