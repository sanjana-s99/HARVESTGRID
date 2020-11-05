<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM users 
WHERE user_id != '".$_SESSION['user_id']."'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
	<tr>
		<th width="70%">Username</td>
		<th width="18%">Crop Type</td>
		<th width="12%">Action</td>
	</tr>
';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span class="badge badge-pill badge-success"> </span>';
	}
	$output .= '
	<tr>
		<td>'.$row['user_name'].' '.$status.' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.$row['user_crop'].'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['user_name'].'">Start Chat</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>