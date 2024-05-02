 <?php
session_start();

// Default username and password
$defaultUsername = "admin";
$defaultPassword = "admin";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password match the default values
    if ($username === $defaultUsername && $password === $defaultPassword) {
        // Redirect to organiser-voyage
        header("Location: organiser-voyage.html");
        exit();
    } else {
        // Increment login attempts
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 1;
        } else {
            $_SESSION['login_attempts']++;
        }
        
        // If login attempts reach 3, redirect to jeux-detente
        if ($_SESSION['login_attempts'] >= 3) { header("Location: jeux-detente.php");
          // login attempt reset 
          $_SESSION['login_attempts'] = 0;
          exit(); 
          } 
        } 
      }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <!-------------------Font Awesome link------------------------->
    <link
      href="assets/fontawesome-free-6.5.1-web/css/all.css"
      rel="stylesheet"
    />
    <link
      href="assets/fontawesome-free-6.5.1-web/css/brands.css"
      rel="stylesheet"
    />
    <link
      href="assets/fontawesome-free-6.5.1-web/css/solid.css"
      rel="stylesheet"
    />

    <!---------------------Google fonts---------------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>Agence de Voyage</title>
  </head>

  <body>
    <!----------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------->
    <!--Page head-->
    <div id="top"></div>
    <header>
      <h1 class="pageTitle"><img src="img/Saferr.png" alt="" />Saferr!</h1>
      <nav>
        <a href="index.php"> <i class="fas fa-home"></i>Accueil</a>
        <a href="organiser-voyage.html"
          ><i class="fas fa-plane"></i> Organiser un voyage</a
        >
        <a href="jeux-detente.php"
          ><i class="fas fa-gamepad"></i> Jeu et détente</a
        >
      </nav>
    </header>
    <!----------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------->
    <!--Page section-->
    <section class="home">
      <div class="intro">
        <div>
          <h1>Bienvenue sur Saferr!</h1>
          <p>
            Notre agence de voyage offre un service de qualité. Vous pouvez
            organiser votre voyage en toute sécurité et simplicité.
          </p>
        </div>
        <form method="post" action="">
          <label for="username">Nom d'utilisateur:</label>
          <input type="text" id="username" name="username" required />
          <label for="password">Mot de passe:</label>
          <input type="password" id="password" name="password" required />
          <button class="sub" type="submit">Se connecter</button>
        </form>
      </div>
      <h1 class="albumTitle">Album de Photos</h1>
      <div class="album-photos">
        <a href="https://en.wikipedia.org/wiki/Paris" target="_blank"
          ><img src="img/paris.jpg" alt="Lieu 1" />
          <span>Paris</span>
        </a>
        <a href="https://en.wikipedia.org/wiki/Cairo" target="_blank"
          ><img src="img/cairo.jpg" alt="Lieu 2" /><span>Cairo</span></a
        >
        <a
          href="https://ar.wikipedia.org/wiki/%D9%82%D8%B3%D9%86%D8%B7%D9%8A%D9%86%D8%A9"
          target="_blank"
          ><img src="img/constantine.jpg" alt="Lieu 3" />
          <span>Constantine</span></a
        >
        <a
          href="https://en.wikipedia.org/wiki/Leaning_Tower_of_Pisa"
          target="_blank"
          ><img
            src="img/pW3OGKV-leaning-tower-of-pisa-wallpaper.jpg"
            alt="Lieu 4"
          />
          <span> Pisa Tour</span>
        </a>
      </div>
    </section>
    <!----------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------->
    <!--Page footer-->
    <footer>
      <div class="contactWrapper">
        <h3>contact us</h3>
        <div class="social">
          <a href=""><i class="fab fa-facebook-f"></i> </a>
          <a href=""><i class="fab fa-x-twitter"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <h1>
        &copy; 2024 Agence de Voyages <br />
        Touhami Ishak, Tous droits réservés.
      </h1>
      <a class="topButton" href="#top"><i class="fas fa-arrow-up"></i></a>
    </footer>
  </body>
</html>
