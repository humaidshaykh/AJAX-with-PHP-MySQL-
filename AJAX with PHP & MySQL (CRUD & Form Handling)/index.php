<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .form-group button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="container">
        <h2>Login</h2>
        <form>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <button type="button" id="btn-submit">Login</button>
            </div>
        </form>
    </div>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>
    </div>





    <script>
        let btn = document.getElementById("btn-submit");
        let tbody = document.getElementById("tbody");
        let uname = document.getElementById("username");
        let pass = document.getElementById("password");

        btn.addEventListener('click', insertData);

        function insertData() {
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'crud.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

            if (xhr.readyState == 3) {
                //loader code
            }
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    let data = Number(this.responseText);
                    if (data == 1) {
                        selectData();
                        alert("Data Inserted");
                    } else {
                        alert("Data Not Inserted");
                    }
                }
            }
            xhr.send("username=" + uname.value + "&pass=" + pass.value + "&insertData");
            uname.value = '';
            pass.value = '';
        }

        function selectData() {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'crud.php?selectData', true);

            xhr.onreadystatechange = function () {
                if (this.readyState == 0) {
                    alert("server not respond");
                } else {
                    tbody.innerHTML = this.responseText;
                }
            }
            xhr.send();
        }

        window.onload = selectData();

    </script>
</body>

</html>