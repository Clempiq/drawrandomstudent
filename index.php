<!DOCTYPE html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "randomdraw";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];

  if ($firstname <> '' && $lastname <> '') {
    $insert ="INSERT INTO student (firstname, lastname) VALUES ('".$firstname."','".$lastname."');";
    $insertionok = $conn->query($insert);
  }


//   $randomname = "SELECT * FROM student WHERE id < 2";
//   $result2 = $conn->query($randomname);

//   echo($result2);


  $addname = "SELECT * FROM student;";
  $result = $conn->query($addname);


  $conn->close();
    
  
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Student random draw</h1>
    </header>
    <main>

        <div class="title">
            <h1>Draw a student !</h1>
        </div>

        <button id="draw">Draw</button>

        <div id="drawresult">

        </div>

        <div class="title">
            <h1>The crew</h1>
        </div>

        <div>
            <form action="http://localhost/drawstudent/" method="post">
                <div>
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname">
                </div><br>
                <div>
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname">
                </div><br>
                <div>
                    <input type="submit" value="Save !">
                </div>
            </form>
        </div>
        <br>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Speeches count</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>

                <?php

        echo('<tbody>');

        if ($result->num_rows > 0) {
     
          while($row = $result->fetch_assoc()) {
            echo ("<tr>
                    <td>".$row["firstname"]."</td>
                    <td>".$row["lastname"]."</td>
                    <td>0</td>
                    <td><button class='edit'>Edit</button></td>
                    <td><button class='remove'>Remove</button></td>
                    </tr>");
          }
        }

        ?>


            </table>
        </div>

        <div>
            <h1 class="title">List of speeches</h1>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Date</th>
                        <th>Time</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Clément</td>
                        <td>Piquenet</td>
                        <td>17/02/2022</td>
                        <td>10:33</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </main>



    <footer>
        <h3>Developer: Clément Piquenet</h3>
    </footer>

    <script>

        let draw = document.getElementById('draw');
        let drawresult = document.getElementById('drawresult')

        draw.addEventListener('click', function () {
            let myArray = ['Clément Piquenet', 'Jules Grand', 'Loic Chenuet', 'Loic Barbado', 'Nicolas Flichy', 'Mehdi Hueber', 'Jordan Anicet', 'Quentin Malavielle', 'Patrick Rabourdin', 'Daniel Thibaut', 'Kevin Piriou', 'Marc Grondin'];
            let rand = Math.floor(Math.random() * myArray.length);
            let rValue = myArray[rand];
            console.log(rValue);


            let newPara = document.createElement('p');
            newPara.textContent = "L'élève tiré au sort est ";
            drawresult.appendChild(newPara);

        });

    </script>


</body>

</html>