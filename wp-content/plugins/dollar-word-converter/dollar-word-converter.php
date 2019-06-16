<?php
/*
  Plugin Name: Dollar to Word Converter
  Plugin URI: 
  Description: Dollar to Word Conversion
  Version: 1.0
  Author: Monali Hirapara
  */
register_activation_hook( __FILE__, 'dw_create_table' );

function dw_create_table() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE cheque_data (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            payee_name varchar(55) NOT NULL,
            amount varchar(55) NOT NULL,
            amount_word varchar(55) NOT NULL,
            UNIQUE KEY id (id)
        ) $charset_collate;";

        if ( ! function_exists('dbDelta') ) {
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        }

        dbDelta( $sql );
    }


add_action('init', 'dw_register_scripts');

function dw_register_scripts() {
	wp_enqueue_script('jquery.num2words', plugin_dir_url(__FILE__) . 'jquery.num2words.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'jqueryfile', 'http://code.jquery.com/jquery-1.12.0.min.js', array(), '1.0' );
 }
add_action( 'wp_head', 'dw_header_scripts' );

function dw_header_scripts(){
  ?>
  <script>
	jQuery(document).ready(function() {
	  jQuery('#amount').focus();
	  jQuery('#demo').num2words();
   
	}); 
  </script>
  <?php
}
function chequeForm() {
	global $wpdb;
	echo '<h1>Cheque Form</h1>';
	echo '<div id="demo" class="container">';
	
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
    echo 'Name <br />';
    echo '<input type="text" name="payee_name" value="" size="40" class="form-control" placeholder="Enter Payee Name"/>';
    echo '</p>';
	 echo '<p>';
    echo 'Amount <br />';
    echo '<input type="text" id="num" name="amount" value="" size="40" class="form-control" placeholder="$"/>';
    echo '</p>';
    echo '<p>';
	echo 'Amount In Words <br />';
    echo '<input type="text" name="amount_word" id="amount_word" value="" size="40" class="form-control" placeholder="Amount in Word"/>';
    echo '</p>';	
	echo '<input id="trans" type="submit" value="Convert to words" class="btn btn-danger"><br/>';
	echo '</form>';
	echo '</div>';
	

	if(!empty($_POST['amount_word'])){
		$table = 'cheque_data';
		$data = array('payee_name' => $_POST["payee_name"], 'amount' => $_POST["amount"], 'amount_word' => $_POST["amount_word"]);
		//$format = array('%s','%d');
		$wpdb->insert($table,$data);
		$my_id = $wpdb->insert_id;
		$table = 'cheque_data';
		$querystr = "SELECT * FROM cheque_data";
	}
	
	$querystr = "SELECT * FROM cheque_data";
	$results = $wpdb->get_results($querystr); 
	
	echo '<h1>Cheque List</h1>';
	echo '<table class="table table-hover">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Payee Name</th>
			  <th scope="col">Amount</th>
			  <th scope="col">Amount in Word</th>
			</tr>
		  </thead>
		  <tbody>';
		  foreach($results as $data){
			echo '<tr>
			  <th scope="row">'.$data->id.'</th>
			  <td>'.$data->payee_name.'</td>
			  <td>'.$data->amount.'</td>
			  <td>'.$data->amount_word.'</td>
			</tr>';
		  }
			echo '</tbody>
		</table>';
}


add_shortcode("my_shortcode", "chequeForm");

?>
