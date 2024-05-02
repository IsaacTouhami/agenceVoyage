
<?php
// Check if a button was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the destinations and their corresponding information
    $destinations = array(
        "Ouled_Abrahem" => array(
            array("1 personne", "2 jours", "offer_1" => "2500 DA"),
            array("3 personnes", "7 jours", "offer_2" => "9500 DA"),
            array("2 personnes", "4 jours", "offer_3" => "6000 DA"),
            array("4 personnes", "5 jours", "offer_4" => "14000 DA")
        ),
        "Tikster" => array(
            array("1 personne", "3 jours", "offer_1" => "3000 DA"),
            array("2 personnes", "5 jours", "offer_2" => "7000 DA"),
            array("3 personnes", "6 jours", "offer_3" => "10000 DA"),
            array("4 personnes", "8 jours", "offer_4" => "15000 DA")
        ),
        "Elanasser" => array(
            array("1 personne", "2 jours", "offer_1" => "2000 DA"),
            array("2 personnes", "4 jours", "offer_2" => "5000 DA"),
            array("3 personnes", "5 jours", "offer_3" => "8000 DA"),
            array("4 personnes", "7 jours", "offer_4" => "12000 DA")
        ),
        "Bordj" => array(
            array("1 personne", "3 jours", "offer_1" => "3500 DA"),
            array("2 personnes", "6 jours", "offer_2" => "8000 DA"),
            array("3 personnes", "7 jours", "offer_3" => "11000 DA"),
            array("4 personnes", "9 jours", "offer_4" => "16000 DA")
        ),
        "Ouran" => array(
            array("1 personne", "4 jours", "offer_1" => "4000 DA"),
            array("2 personnes", "7 jours", "offer_2" => "9000 DA"),
            array("3 personnes", "8 jours", "offer_3" => "13000 DA"),
            array("4 personnes", "10 jours", "offer_4" => "18000 DA")
        ),
        "Annaba" => array(
            array("1 personne", "5 jours", "offer_1" => "5000 DA"),
            array("2 personnes", "8 jours", "offer_2" => "10000 DA"),
            array("3 personnes", "9 jours", "offer_3" => "15000 DA"),
            array("4 personnes", "11 jours", "offer_4" => "20000 DA")
        ),
        "Constantine" => array(
            array("1 personne", "6 jours", "offer_1" => "6000 DA"),
            array("2 personnes", "9 jours", "offer_2" => "11000 DA"),
            array("3 personnes", "10 jours", "offer_3" => "16000 DA"),
            array("4 personnes", "12 jours", "offer_4" => "21000 DA")
        ),
        "Alger" => array(
            array("1 personne", "7 jours", "offer_1" => "7000 DA"),
            array("2 personnes", "10 jours", "offer_2" => "12000 DA"),
            array("3 personnes", "11 jours", "offer_3" => "17000 DA"),
            array("4 personnes", "13 jours", "offer_4" => "22000 DA")
        ),
        "France" => array(
            array("1 personne", "8 jours", "offer_1" => "8000 DA"),
            array("2 personnes", "11 jours", "offer_2" => "13000 DA"),
            array("3 personnes", "12 jours", "offer_3" => "18000 DA"),
            array("4 personnes", "14 jours", "offer_4" => "23000 DA")
        ),
        "Almagne" => array(
            array("1 personne", "9 jours", "offer_1" => "9000 DA"),
            array("2 personnes", "12 jours", "offer_2" => "14000 DA"),
            array("3 personnes", "13 jours", "offer_3" => "19000 DA"),
            array("4 personnes", "15 jours", "offer_4" => "24000 DA")
        ),
        "Egypt" => array(
            array("1 personne", "10 jours", "offer_1" => "10000 DA"),
            array("2 personnes", "13 jours", "offer_2" => "15000 DA"),
            array("3 personnes", "14 jours", "offer_3" => "20000 DA"),
            array("4 personnes", "16 jours", "offer_4" => "25000 DA")
        ),
        "Italie" => array(
            array("1 personne", "11 jours", "offer_1" => "11000 DA"),
            array("2 personnes", "14 jours", "offer_2" => "16000 DA"),
            array("3 personnes", "15 jours", "offer_3" => "21000 DA"),
            array("4 personnes", "17 jours", "offer_4" => "26000 DA")
        )
    );

    // Check which button was clicked and display the corresponding table
    foreach ($destinations as $destination => $offers) {
        if (isset($_POST[$destination])) {
            echo "<h2>Information pour $destination</h2>";
            echo "<table>";
            echo "<tr><th>Lieu</th><th>Nombres de personnes</th><th>Durée de voyage</th><th>Offre</th>";
            echo "</tr>";
            
            foreach ($offers as $offer) {
                echo "<tr>";
                echo "<td>$destination</td>";
                echo "<td>$offer[0]</td>";
                echo "<td>$offer[1]</td>";
                foreach ($offer as $key => $value) {
                    if ($key !== 0 && $key !== 1) {
                        echo "<td>$value</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Add your CSS styles here -->
    <style>
        /* Root*/
:root {
  --primary-color: #369acf;
  --secondary-color: rgb(255, 255, 255);
  --transition: 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
}

/*Selection*/
::selection {
  background: var(--primary-color);
  color: #0f0e0e;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: “Times New Roman”, Times, serif;
  scroll-behavior: smooth;
  color: var(--secondary-color);    
}

body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background: #0f0e0e;
  margin: 0;
  padding: 0;
  min-height: 100vh;
}
h2{
    font-size: 2rem;    
    color: var(--primary-color);
    margin: 1rem 0;
    text-shadow: 2px 2px 2px var(--primary-color);
}

        table {
            width: 100%;
            font-size: 1.5rem;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 4px solid var(--secondary-color);
        }

        table tr th {
            background-color: var(--primary-color);
            font-size: 1.6rem;
            color: #272525;
            font-weight: 900;
        }
    </style>
</head>
<body>
    <!-- Your HTML content here -->
</body>
</html>


