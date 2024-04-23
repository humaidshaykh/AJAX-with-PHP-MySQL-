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
            xhr.open('GET', 'mydata.json', true);

            xhr.onreadystatechange = function () {


                if (this.readyState == 4 && this.status == 200) {

                    let data =JSON.parse(this.responseText);
                    // console.log(data);
                    // cnt.innerHTML = data.user;

                    // if one data is retrive__________________
                    // let el = `
                    // <ul>
                    // <li>${data.user}</li>
                    // <li>${data.age}</li>
                    // <li>${data.subject}</li>
                    // </ul>
                    // `
                    // cnt.innerHTML = el;
                    
                    
                    // if data is greater than one then we retrive this through forEach loop________________                    
                    let el = '';
                    data.forEach(element => {
                        el += `
                    <ul>
                    <li>${element.user}</li>
                    <li>${element.age}</li>
                    <li>${element.subject}</li>
                    </ul>
                    `;
                    });

                    cnt.innerHTML = el;





                } else if (this.readyState == 4 && this.status != 200) {

                    console.log("Error: " + this.status);
                    xhr.onreadystatechange = null;
                }
            }

            xhr.send();
        }

    </script>
</body>

</html>