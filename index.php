<html>
    <head>
        <title>
            Cost Admin-Home
        </title>
        <script src="./jquery-1.12.3.js"></script>
        <script src="./clickCodeUser.js"></script>
        <script src="./clickCodeCost.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
    </head>
    <body>
        <h1>CostCalculator Adminpanel</h1>
        <div id="container">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <h2>Users:</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button onclick="getUsers()" value="getUsers">Get users</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="formUser" value="addUser">Add a user</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="formUser" value="getUser">Get user by email</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="formUser" value="deleteUser">Delete a user</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="formUser" value="updateUser">Update a user</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Costs:</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button value="getCosts" onclick="getCosts()">Get costs</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="formCost" value="addCost">Add cost</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="formCost" value="getCostsByEmail">Get costs from one person</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="formCost" value="getCostByID">Get costs by id</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="formCost" value="deleteCost">Delete a cost</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="formCost" value="updateCost">Update a cost</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id="close" value="close" style=width:50px;>Close</button>
                        </td>
                    </tr>
                </tbody>        
            </table>
            <div id="fill">
            </div>
        </div>
    </body>
</html>

