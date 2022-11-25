<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "porfolio";


try {
    $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<html>
    <head>
        <meta charset="UFT-8">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navigation">
            <a href="#home">Home</a>
            <a href="#about_me">About Me</a>
            <a href="#contact_me">Contact Me</a>
            <div class="navigation-dropdown">
                Links
                <div class="dropdown-content">
                    <a href="https://github.com/Krasnikovs" class="socialmedia-links">Github</a>
                    <a href="https://www.facebook.com">Facebook</a>
                </div>
            </div>
        </div>
        <main>
            <section id="home">
                <div class="left-vl"></div>
                <div>
                    <h2 class="intruduction">Hello,</h2>
                    <h2 class="intruduction">I'm Gustavs Krasnikovs</h2>
                </div>
                <div class="right-vl"></div>
            </section>
            <section id="about_me">
                <div id="about-me-gallary">
                    <div class="description-gallary">
                </div>
            </section>
            <section id="contact_me">
                <form method="POST" class="input-container">
                    <div>
                        <input type="text" placeholder="Subject..." name="subject">
                        <input type="text" placeholder="Messege..." name="messege">
                    </div>
                    <button type="submit" value="Send">Send</button>
                </form>
                <?php
                    if(!empty($_POST)) {
                        $subject = $_POST["subject"];
                        $messege = $_POST["messege"];

                        if (isset($subject) && isset($messege)) {
                            $stmt = $conn->prepare('INSERT INTO contact(subject, messege) VALUES (:subject, :messege)');
                            $stmt->bindParam('subject', $subject, PDO::PARAM_STR);
                            $stmt->bindParam('messege', $messege, PDO::PARAM_STR);
                            $stmt->execute();
                        }

                        // var_dump($_POST);
                        // $sqlsave = "INSERT INTO contact (subject, messege) VALUES ('$subject' ,'$massege')";
                        // $conn->exec($sqlsave);
                    }
                ?>
            </section>
        </main>
        <!-- <footer>
            <div class="footer-navigation">
                <a href="index.html">Home</a>
                <a href="about_me.html">About Me</a>
                <a href="contact.html">Contact</a>
            </div>
            <div class="contact">
                <p>Contact:</p>
                <p>Email: ralis3333@gmail.com</p>
                <p>Phone: 20247313</p>
            </div>
        </footer> -->
    </body>
</html>