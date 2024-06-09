<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Replace 'your_email@example.com' with your actual email address
$receiving_email_address = 'roshini.pagadala@gmail.com';

// Include the PHP Email Form library file
if (file_exists($php_email_form = '/Users/roshinipagadala/Downloads/Arsha/assets/vendor/php-email-form/php-email-form.php')) {
    require_once($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

$contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'roshini.pagadala@gmail.com',
    'password' => 'Roshu1998*',
    'port' => '587',
    'encryption' => 'tls' // Add this line for TLS encryption
);

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>
