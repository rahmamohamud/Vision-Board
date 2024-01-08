<?php
session_start();

// Check if 'Email' key is set in the $_SESSION array
if (!isset($_SESSION['Email'])) {
    header('Location: landing-page.php'); // Redirect to the landing page
    exit();
}

session_destroy();

// Disable back button after logging out
echo '<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    // Redirect to the landing page
    window.location.href = "landing-page.php";
</script>';
?>