<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "test@emailtest.com";
    $email_subject = "Newsletter Subscription";


    function died($error) {
        // your error code can go here
        echo "There was an error with your submission";
        echo $error."<br /><br />";
        die();
    }

    // validation expected data exists
    if(
        !isset($_POST['email'])) {
        died('There was an error with your submission');       
    }

    $email_from = $_POST['email']; // required


    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Email: ".clean_string($email_from)."\n";


    function send_email_on_status_change( $post, $old_status ) {
        $email = 'user@domain.com';
        $title = sprintf(
          __( 'Post status changed for "%s"', 'nelio' ),
          $post->post_title
        );
        $body = sprintf(
          __( 'Status was changed for post #%1$d "%2$s" by %3$s.', 'nelio' ),
          $post->ID,
          $post->post_title,
          wp_get_current_user()->display_name
        );
        // ...
        $body .= sprintf(
          __( "%1$s => %2$s", 'nelio' ),
          $old_status,
          $post->post_status
        );
        // ...
        wp_mail( $email, $title, $body );
      }

?>

Thanks for signup up for the Newsletter!

<?php
}
?>