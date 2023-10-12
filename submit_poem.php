header("Access-Control-Allow-Origin: *"); // Allows any origin. Be more specific (e.g., http://your-frontend-domain.com) in a production environment
header("Access-Control-Allow-Headers: *"); // Allows any headers
header("Content-Type: text/plain"); // Set content type

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve values from the POST request
    $name = $_POST["name"];
    $poemType = $_POST["poemType"];
    $title = $_POST["title"];
    $poemText = $_POST["poemText"];

    // Use these values to construct the email message
    $to = "ajg2204@hsutx.edu"; 
    $subject = "New Poem Submission from $name";
    $message = "Name: $name\n\nPoem Type: $poemType\n\nTitle: $title\n\n$poemText";
    $headers = "From: tsergeant@hsutx.edu"; 

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.";
    }
}
