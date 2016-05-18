
$(document).ready(function () {
    $('button[id=formCost]').click(function () {
        var buttonVal = $(this).val();
        var form = "";
        if (buttonVal === 'addCost') {
            form += "<label for='ID'>ID: </label><input type='number' id='ID'/><br>";
            form += "<label for='owner'>Owner(email): </label><input type='email' id='owner'/><br>";
            form += "<label for='price'>Price: </label><input type='number' id='price'/><br>";
            form += "<label for='location'>Location: </label><input type='text' id='location'/><br>";
            form += "<label for='description'>Description: </label><input type='text' id='description'/><br>";
            form += "<label for='category'>Category: </label><select id='category'>\
                    <option value='DRINKS'>Drinks</option>\
                    <option value='FREETIME'>Freetime</option>\
                    <option value='FOOD'>Food</option>\\n\
                    </select>\
                    <br>";
            form += '<button value="saveUser" onclick="saveCost()" id="save">Save</button>';
        } else if (buttonVal === 'deleteCost') {
            form += "<label for='ID'>ID: </label><input type='number' id='ID'/><br>";
            form += '<button value="deleteCost" onclick="deleteCost()" id="deleteCost">Delete cost</button>';
        } else if (buttonVal === 'updateCost') {
            form += "<label for='ID'>ID: </label><input type='number' id='ID'/><br>";
            form += '<button value="prepareCostUpdate" onclick="prepareCostUpdate()" id="prepareUpdate">Retrieve cost to update</button>';
        } else if (buttonVal === 'getCostsByEmail') {
            form += "<label for='email'>Email: </label><input type='email' id='email'/><br>";
            form += '<button value="getCostsByEmail" onclick="getCostsByEmail()" id="getCostsByEmail">Retrieve cost</button>';
        } else if (buttonVal === 'getCostByID') {
            form += "<label for='ID'>ID: </label><input type='number' id='ID'/><br>";
            form += '<button value="getCostByID" onclick="getCostByID()" id="getCostByID">Retrieve cost</button>';
        }
        $('#fill').append(form);
    });
});

function getCosts() {
    var ajaxurl = 'costCode.php', data = {'action': 'getCosts'};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append(response);
    });
}

function saveCost() {
    var info = '{ \
                "id":"' + $("#ID").val() + '",\
                "location":"' + $("#location").val() + '",\
                "description":"' + $("#description").val() + '",\
                "category":"' + $("#category").val() + '",\
                "owner":{"email":"' + $("#owner").val() + '"},\
                "price":"' + $("#price").val() + '"\
                }';
    var ajaxurl = 'costCode.php', data = {'action': 'saveCost', 'info': info};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append('<h3>' + response + '<h3>');
    });
}

function prepareCostUpdate() {
    var info = '{ \
                "id":"' + $("#ID").val() + '"\
                }';
    var ajaxurl = 'costCode.php', data = {'action': 'prepareUpdate', 'info': info};
    $.post(ajaxurl, data, function (response) {
        if(response===''){
            $('#fill').append("<br>Wrong id given");
            return;
        }
        obj = JSON.parse(response);
        var form = "";
        form += "<input type='hidden' id='ID' value='"+obj['id']+"' /><br>";
        form += "<input type='hidden' id='owner' value='"+obj['owner']+"' /><br>";
        form += "<label for='price'>Price: </label><input type='number' id='price' value='"+obj['price']+"' /><br>";
        form += "<label for='location'>Location: </label><input type='text' id='location' value='"+obj['location']+"' /><br>";
        form += "<label for='description'>Description: </label><input type='text' id='description' value='"+obj['description']+"' /><br>";
        form += "<label for='category'>Category: </label><select id='category'  selected='"+obj['category']+"' >\
                    <option value='DRINKS'>Drinks</option>\
                    <option value='FREETIME'>Freetime</option>\
                    <option value='FOOD'>Food</option>\\n\
                    </select>\
                    <br>";

        form += '<button value="updateCost" onclick="updateCost()" id="update">Update</button>';
        $('#fill').empty();
        $('#fill').append(form);
    });
}

function updateCost() {
    var info = '{ \
                "id":"' + $("#ID").val() + '",\
                "location":"' + $("#location").val() + '",\
                "description":"' + $("#description").val() + '",\
                "category":"' + $("#category").val() + '",\
                "owner":{"email":"' + $("#owner").val() + '"},\
                "price":"' + $("#price").val() + '"\
                }';
    var ajaxurl = 'costCode.php', data = {'action': 'updateCost', 'info': info};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append('<h3>' + response + '<h3>');
    });
}

function deleteCost(){
    var buttonVal = $('#deleteCost').val();
    var info = '{ \
                "id":"' + $("#ID").val() + '"\
                }';
    var ajaxurl = 'costCode.php', data = {'action': buttonVal, 'info': info};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append('<h3>' + response + '<h3>');
    });
}

function getCostsByEmail(){
    var info = '{ \
                "email":"' + $("#email").val() + '"\
                }';
    var ajaxurl = 'costCode.php', data = {'action': 'getCostByEmail', 'info': info};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append(response);
    });
}

function getCostByID(){
    var info = '{ \
                "id":"' + $("#ID").val() + '"\
                }';
    var ajaxurl = 'costCode.php', data = {'action': 'getCostById', 'info': info};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append(response);
    });
}