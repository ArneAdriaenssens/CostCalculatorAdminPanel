<?php

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'getCosts':
            getCosts();
            break;
        case 'saveCost':
            saveCost();
            break;
        case 'prepareUpdate':
            prepareCostUpdate();
            break;
        case 'updateCost':
            updateCost();
            break;
        case 'deleteCost':
            deleteCost();
            break;
        case 'getCostByEmail';
            getCostByEmail();
            break;
        case 'getCostById';
            getCostById();
            break;
    }
}

function getCosts() {
    $response = file_get_contents("http://193.191.187.14:10318/CostCalculatorRest/cost/allCosts");
    $responseJson = json_decode($response, true);
    $amount = count($responseJson);
    if ($amount === 0) {
        echo 'There are no costs available';
        return;
    }
    for ($x = 0; $x < $amount; $x++) {
        echo '<div>ID: ' . $responseJson[$x]['id'] . '<br>';
        echo 'Price: ' . $responseJson[$x]['price'] . '<br>';
        echo 'Owner: ' . $responseJson[$x]['owner'] . '<br>';
        echo 'Location: ' . $responseJson[$x]['location'] . '<br>';
        echo 'Description: ' . $responseJson[$x]['description'] . '<br>';
        echo 'Category: ' . $responseJson[$x]['category'] . '</br>';
        echo '</br>';
        echo '<p id=break><-----------------></p>';
        echo '</div></br></br>';
    }
}

function saveCost() {
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/cost/save';
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
        echo "Cost succesfully added";
    } else {
        echo "Something went wrong, check the given data!";
    }
}

function prepareCostUpdate(){
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/cost/getCostById';
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

function updateCost() {
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/cost/updateCost';
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
        echo "Cost succesfully updated";
    } else {
        echo "Something went wrong, check the given data!";
    }
}

function deleteCost(){
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/cost/deleteCost';
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
        echo "Cost succesfully deleted";
    } else {
        echo "Something went wrong, check the given data!";
    }
}

function getCostByEmail(){
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/cost/byEmail';
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
    $responseJson = json_decode($result, true);
    $amount = count($responseJson);
    if ($amount === 0) {
        echo 'There are no costs available with that email';
        return;
    }
    for ($x = 0; $x < $amount; $x++) {
        echo '<div>ID: ' . $responseJson[$x]['id'] . '<br>';
        echo 'Price: ' . $responseJson[$x]['price'] . '<br>';
        echo 'Owner: ' . $responseJson[$x]['owner'] . '<br>';
        echo 'Location: ' . $responseJson[$x]['location'] . '<br>';
        echo 'Description: ' . $responseJson[$x]['description'] . '<br>';
        echo 'Category: ' . $responseJson[$x]['category'] . '</div>';
        echo '</br>';
        echo '<p id=break><-----------------></p>';
        echo '</div></br></br>';
    }
}

function getCostById(){
    $data = $_POST['info'];
    $url= 'http://193.191.187.14:10318/CostCalculatorRest/cost/getCostById';
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
    $responseJson = json_decode($result, true);
    $amount = count($responseJson);
    if ($amount === 0) {
        echo 'There is no cost with this id available';
        return;
    }
        echo '<div>ID: ' . $responseJson['id'] . '<br>';
        echo 'Price: ' . $responseJson['price'] . '<br>';
        echo 'Owner: ' . $responseJson['owner'] . '<br>';
        echo 'Location: ' . $responseJson['location'] . '<br>';
        echo 'Description: ' . $responseJson['description'] . '<br>';
        echo 'Category: ' . $responseJson['category'];
        echo '</div>';
}