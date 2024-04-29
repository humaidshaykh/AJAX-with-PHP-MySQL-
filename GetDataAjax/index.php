<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
</head>

<body>
    <button id="btn" >Get Data</button>
    <h1 id="content"></h1>

    <script>
        let btn = document.getElementById("btn");
        let cnt = document.getElementById("content");
        
        btn.addEventListener('click', runAjax);

        function runAjax() {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'myfile.txt', true);

            xhr.onreadystatechange = function () {

                if(this.readyState == 3){
                    console.log("processing");
                    btn.setAttribute("disabled", true);
                    cnt.innerHTML = "processing";

                }else if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    btn.removeAttribute("disabled");
                    cnt.innerHTML = this.responseText;
                    xhr.onreadystatechange = null;
                } else if (this.readyState == 4 && this.status != 200) {
                    console.log("Error: " + this.status);
                    btn.removeAttribute("disabled");
                    xhr.onreadystatechange = null;
                }
            }

            xhr.send();
        }

    </script>
</body>

</html>
