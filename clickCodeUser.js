
$(document).ready(function () {
    $('button').click(function () {
        $('#fill').empty();
    });
    $('button[id=formUser]').click(function () {
        var buttonVal = $(this).val();
        var form = "";
        if (buttonVal === 'addUser') {
            form += "<label for='email'>Email: </label><input type='email' id='email'/><br>";
            form += "<label for='firstName'>Firstname: </label><input type='text' id='firstName'/><br>";
            form += "<label for='lastName'>Lastname: </label><input type='text' id='lastName'/><br>";
            form += "<label for='password'>Password: </label><input type='password' id='password'/><br>";

            form += '<button value="saveUser" onclick="saveUser()" id="save">Save</button>';
        } else if (buttonVal === 'getUser') {
            form += "<label for='email'>Email: </label><input type='email' id='email'/><br>";
            form += '<button value="getUser" onclick="getUser()" id="getUser">Retrieve user</button>';
        } else if (buttonVal === 'deleteUser') {
            form += "<label for='email'>Email: </label><input type='email' id='email'/><br>";
            form += '<button value="deleteUser" onclick="deleteUser()" id="deleteUser">Delete user</button>';
        } else if (buttonVal === 'updateUser') {
            form += "<label for='email'>Email: </label><input type='email' id='email'/><br>";
            form += '<button value="prepareUpdate" onclick="prepareUpdate()" id="prepareUpdate">Retrieve user to update</button>';
        }
        $('#fill').append(form);
    });
    $('#close').click(function () {
        $('#fill').empty();
    });


});

function getUsers() {
    var ajaxurl = 'userCode.php', data = {'action': 'getUsers'};
    $.post(ajaxurl, data, function (response) {
        $('#fill').append(response);
    });
}

function saveUser() {
    var info = '{ \
                "email":"' + $("#email").val() + '",\
                "firstName":"' + $("#firstName").val() + '",\
                "lastName":"' + $("#lastName").val() + '",\
                "password":"' + $("#password").val() + '",\
                "role":"USER",\
                "costs": [ ]\
                }';
    var ajaxurl = 'userCode.php', data = {'action': 'saveUser', 'info': info};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append('<h3>' + response + '<h3>');
    });
}

function getUser() {
    var info = '{ \
                "email":"' + $("#email").val() + '"\
                }';
    var ajaxurl = 'userCode.php', data = {'action': 'getUser', 'info': info};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append('<h3>' + response + '<h3>');
    });
}

function prepareUpdate() {
    var info = '{ \
                "email":"' + $("#email").val() + '"\
                }';
    var ajaxurl = 'userCode.php', data = {'action': 'prepareUpdate', 'info': info};
    $.post(ajaxurl, data, function (response) {
        obj = JSON.parse(response)
        var form = "";
        form += "<input type='hidden' id='email' value='" + obj['email'] + "' /><br>";
        form += "<label for='firstName'>Firstname: </label><input type='text' id='firstName' value='" + obj['firstName'] + "' /><br>";
        form += "<label for='lastName'>Lastname: </label><input type='text' id='lastName' value='" + obj['lastName'] + "' /><br>";
        form += "<label for='password'>Password: </label><input type='password' id='password' required /><br>";

        form += '<button value="updateUser" onclick="updateUser()" id="update">Update</button>';
        $('#fill').empty();
        $('#fill').append(form);
    });
}

function deleteUser() {
    var buttonVal = $('#deleteUser').val();
    var info = '{ \
                "email":"' + $("#email").val() + '"\
                }';
    var ajaxurl = 'userCode.php', data = {'action': buttonVal, 'info': info};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append('<h3>' + response + '<h3>');
    });
}

function saveUser() {
    var info = '{ \
                "email":"' + $("#email").val() + '",\
                "firstName":"' + $("#firstName").val() + '",\
                "lastName":"' + $("#lastName").val() + '",\
                "password":"' + $("#password").val() + '",\
                "role":"USER",\
                "costs": [ ]\
                }';
    var ajaxurl = 'userCode.php', data = {'action': 'saveUser', 'info': info};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append('<h3>' + response + '<h3>');
    });
}

function updateUser() {
    var info = '{ \
                "email":"' + $("#email").val() + '",\
                "firstName":"' + $("#firstName").val() + '",\
                "lastName":"' + $("#lastName").val() + '",\
                "password":"' + $("#password").val() + '",\
                "role":"USER",\
                "costs": [ ]\
                }';
    var ajaxurl = 'userCode.php', data = {'action': 'updateUser', 'info': info};
    $.post(ajaxurl, data, function (response) {
        $('#fill').empty();
        $('#fill').append('<h3>' + response + '<h3>');
    });
}