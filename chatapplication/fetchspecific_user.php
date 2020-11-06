<?php

//fetch_user.php

include('database_connection.php');
$user_id = $_GET['user_id'];
session_start();

$query = "SELECT * FROM users WHERE user_id = 10";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table">
';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span class="badge badge-pill badge-success">Online</span>';
	}
	$output .= '
	<tr>
		<td><strong>'.$row['user_name'].'</strong> '.$status.' <div class="badge badge-pill badge-warning">'.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' </div> '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td><button type="button" class="btn btn-outline-info btn-sm start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['user_name'].'">Start Chat</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>