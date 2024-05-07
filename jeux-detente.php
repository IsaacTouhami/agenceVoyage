<?php
session_start(); // Start the session to store the score and current question index

// Define the quiz questions and answers for "Pays et Capitale"
$quizzes = array(
    array(
        'question' => "Quelle est la capitale de la France?",
        'answers' => array("Paris", "Londres", "Madrid", "Rome"),
        'correct_answer' => "Paris"
    ),
    array(
        'question' => "Quelle est la capitale de l'Espagne?",
        'answers' => array("Paris", "Londres", "Madrid", "Rome"),
        'correct_answer' => "Madrid"
    ),
    array(
        'question' => "Quelle est la capitale de l'Italie?",
        'answers' => array("Paris", "Londres", "Madrid", "Rome"),
        'correct_answer' => "Rome"
    )
);

// Define the quiz questions and answers for "Pays et Devise"
$quizzes_currency = array(
    array(
        'question' => "Quelle est la devise de la France?",
        'answers' => array("Euro", "Dollar", "Livre Sterling"),
        'correct_answer' => "Euro"
    ),
    array(
        'question' => "Quelle est la devise de l'Espagne?",
        'answers' => array("Euro", "Dollar", "Peso"),
        'correct_answer' => "Euro"
    ),
    array(
        'question' => "Quelle est la devise de l'Italie?",
        'answers' => array("Euro", "Dollar", "Lire"),
        'correct_answer' => "Euro"
    )
);

// Define the quiz questions and answers for "Devinez le pays"
$quizzes_guess_country = array(
    array(
        'question' => "Devinez le pays:",
        'image' => "img/cairo.jpg",
        'correct_answer' => "Egypt"
    ),
    array(
        'question' => "Devinez le pays:",
        'image' => "img/paris.jpg",
        'correct_answer' => "France"
    ),
    array(
        'question' => "Devinez le pays:",
        'image' => "img/pW3OGKV-leaning-tower-of-pisa-wallpaper.jpg",
        'correct_answer' => "Italie"
    )
);

// Function to display a quiz question for "Pays et Capitale"
function displayQuestion($index) {
    global $quizzes;
    echo '<div class="quiz">
        <h2>Question ' . ($index + 1) . '</h2>
        <p>' . $quizzes[$index]['question'] . '</p>
        <div class="answers">';
    foreach ($quizzes[$index]['answers'] as $answer) {
        echo '<button type="submit" name="answer" value="' . $answer . '">' . $answer . '</button>';
    }
    echo '</div></div>';
}

// Function to display a quiz question for "Pays et Devise"
function displayQuestionCurrency($index) {
    global $quizzes_currency;
    echo '<div class="quiz">
        <h2>Question ' . ($index + 1) . '</h2>
        <p>' . $quizzes_currency[$index]['question'] . '</p>
        <div class="answers">';
    foreach ($quizzes_currency[$index]['answers'] as $answer) {
        echo '<button type="submit" name="answer_currency" value="' . $answer . '">' . $answer . '</button>';
    }
    echo '</div></div>';
}

// Function to display a quiz question for "Devinez le pays"
function displayQuestionGuessCountry($index) {
  global $quizzes_guess_country;
  // Check if the question has been answered
  if (!isset($_SESSION['answered_guess_country'][$index])) {
      echo '<div class="quiz">
          <h2>Question ' . ($index + 1) . '</h2>
          <p>' . $quizzes_guess_country[$index]['question'] . '</p>
          <img src="' . $quizzes_guess_country[$index]['image'] . '" alt="Country Image" />
          <input type="text" name="answer_guess_country" placeholder="Entrez le nom du pays">
          </div>';
        
}
}

// Function to calculate and display the score
function displayScore() {
    global $quizzes, $quizzes_currency, $quizzes_guess_country;
    $score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
    $total_questions = count($quizzes) + count($quizzes_currency) + count($quizzes_guess_country);
    echo "<p>Score: $score / $total_questions</p>";
}

// Function to reset the quiz
function resetQuiz() {
    unset($_SESSION['score']);
    unset($_SESSION['question_index']);
    unset($_SESSION['answered_guess_country']); // Reset for the "Devinez le pays" quiz
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle play again button click
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['play_again'])) {
    resetQuiz();
}

?>

<!DOCTYPE html>    gap: 20px;
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="jeux.css" />
    <link href="assets/fontawesome-free-6.5.1-web/css/all.css" rel="stylesheet" />
    <link href="assets/fontawesome-free-6.5.1-web/css/brands.css" rel="stylesheet" />
    <link href="assets/fontawesome-free-6.5.1-web/css/solid.css" rel="stylesheet" />
    <title>Quiz Time!</title>
</head>
<body>
<div id="top"></div>
<header>
    <h1 class="pageTitle"><img src="img/Saferr.png" alt="" />Saferr!</h1>
    <nav>
        <a href="index.php"> <i class="fas fa-home"></i>Accueil</a>
        <a href="organiser-voyage.html"><i class="fas fa-plane"></i> Organiser un voyage</a>
        <a href="jeux-detente.php"><i class="fas fa-gamepad"></i> Jeu et détente</a>
    </nav>
</header>

<section class="jeux">
    <h1>Quiz Time!</h1>

    <?php
    // Check if there's a question index in the session, if not, set it to 0
    $question_index = isset($_SESSION['question_index']) ? $_SESSION['question_index'] : 0;

    if ($question_index < count($quizzes)) {
        // Display the current question for "Pays et Capitale"
        echo '<form method="post">';
        displayQuestion($question_index);
        echo '</form>';
    } else if ($question_index < count($quizzes) + count($quizzes_currency)) {
        // Display the current question for "Pays et Devise"
        echo '<form method="post">';
        displayQuestionCurrency($question_index - count($quizzes)); // Adjust index to match the currency array
        echo '</form>';
    } else {
        // Display the current question for "Devinez le pays"
        echo '<form method="post">';
        displayQuestionGuessCountry($question_index - count($quizzes) - count($quizzes_currency));
        echo '</form>';
    }
    // Display the score
    displayScore();

    // button to start over here
    echo '<form method="post"><button type="submit" name="play_again">Play Again</button></form>';

    ?>
</section>

<footer>
    <div class="contactWrapper">
        <h3>contact us</h3>
        <div class="social">
            <a href=""><i class="fa-brands fa-facebook-f"></i> </a>
            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
        </div>
    </div>
    <h1>&copy; 2024 Agence de Voyages <br />Touhami Ishak, Tous droits réservés.</h1>
    <a class="topButton" href="#top"><i class="fas fa-arrow-up"></i></a>
</footer>

<?php
// Handle form submission for "Pays et Capitale"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer'])) {
    global $quizzes;
    // Check if the answer is correct
    $selected_answer = $_POST['answer'];
    if ($selected_answer == $quizzes[$question_index]['correct_answer']) {
        // Increment the score if the answer is correct
        $_SESSION['score'] = isset($_SESSION['score']) ? $_SESSION['score'] + 1 : 1;
    }
    // Move to the next question
    $_SESSION['question_index'] = $question_index + 1;
    // Redirect to refresh the page and display the next question or the score
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle form submission for "Pays et Devise"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer_currency'])) {
    global $quizzes_currency;
    // Check if the answer is correct
    $selected_answer = $_POST['answer_currency'];
    if ($selected_answer == $quizzes_currency[$question_index - count($quizzes)]['correct_answer']) {
        // Increment the score if the answer is correct
        $_SESSION['score'] = isset($_SESSION['score']) ? $_SESSION['score'] + 1 : 1;
    }
    // Move to the next question
    $_SESSION['question_index'] = $question_index + 1;
    // Redirect to refresh the page and display the next question or the score
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle form submission for "Devinez le pays"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer_guess_country']) && !isset($_SESSION['answered_guess_country'][$question_index - count($quizzes) - count($quizzes_currency)])) {
    global $quizzes_guess_country;
    // Check if the answer is correct
    $selected_answer = $_POST['answer_guess_country'];
    if ($selected_answer == $quizzes_guess_country[$question_index - count($quizzes) - count($quizzes_currency)]['correct_answer']) {
        // Increment the score if the answer is correct
        $_SESSION['score'] = isset($_SESSION['score']) ? $_SESSION['score'] + 1 : 1;
    }
    // Mark the question as answered
    $_SESSION['answered_guess_country'][$question_index - count($quizzes) - count($quizzes_currency)] = true;
    // Move to the next question
    if (count($_SESSION['answered_guess_country']) < count($quizzes_guess_country)) {
        $_SESSION['question_index'] = $question_index + 1;
    }
    // Redirect to refresh the page and display the next question or the score
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

</body>
</html>
