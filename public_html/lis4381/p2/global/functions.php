<?php
  //get all petstores
function get_all_petstores()
{
	//make db available inside fcn
	global $db;

	//get all petstores 
	$query = "SELECT * FROM petstore ORDER BY pst_id";

	try
	{
		$statement = $db->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}

	catch (PDOException $e)
	{
		$error = $e->getMessage();
		display_db_error($error);
	}
}

  //get individual petstore
function get_petstore($pst_id)
{
	//mak db available
	global $db;

	//find all data assoc with ID
	$query = "SELECT * FROM petstore WHERE pst_id = :pst_id_p";
	try
	{
		$statement = $db->prepare($query);
		$statement->bindParam(':pst_id_p', $pst_id);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}

	catch (PDOException $e)
	{
		$error = $e->getMessage();
		display_db_error($error);
	}
}


  //add petstore
function add_petstore
(
	$pst_name_v,
	$pst_street_v,
	$pst_city_v,
	$pst_state_v,
	$pst_zip_v,
	$pst_phone_v,
	$pst_email_v,
	$pst_url_v,
	$pst_ytd_sales_v,
	$pst_notes_v
) 

{
	//make db avail inside fcn
	global $db;

	$query = 
		"INSERT INTO petstore
		(pst_name, pst_street, pst_city, pst_state, pst_zip, pst_phone, pst_email, pst_url, pst_ytd_sales, pst_notes)
		VALUES 
		(:pst_name_p, :pst_street_p, :pst_city_p, :pst_state_p, :pst_zip_p, :pst_phone_p, :pst_email_p, :pst_url_p, :pst_ytd_sales_p, :pst_notes_p)";

//exit($query);

	try
		{
			$statement = $db->prepare($query);
			$statement->bindParam(':pst_name_p', $pst_name_v);
			$statement->bindParam(':pst_street_p', $pst_street_v);
			$statement->bindParam(':pst_city_p', $pst_city_v);
			$statement->bindParam(':pst_state_p', $pst_state_v);
			$statement->bindParam(':pst_zip_p', $pst_zip_v);
			$statement->bindParam(':pst_phone_p', $pst_phone_v);
			$statement->bindParam(':pst_email_p', $pst_email_v);
			$statement->bindParam(':pst_url_p', $pst_url_v);
			$statement->bindParam(':pst_ytd_sales_p', $pst_ytd_sales_v);
			$statement->bindParam(':pst_notes_p', $pst_notes_v);
			$statement->execute();
			$statement->closeCursor();

			$last_auto_increment_id = $db->lastInsertId();

			//test
			//exit($last_auto_increment_id);
		}

		catch (PDOException $e)
			{
				$error = $e->getMessage();
				display_db_error($error);
			}

}

  //edit petstore
function edit_petstore
(
	$pst_name_v,
	$pst_street_v,
	$pst_city_v,
	$pst_state_v,
	$pst_zip_v,
	$pst_phone_v,
	$pst_email_v,
	$pst_url_v,
	$pst_ytd_sales_v,
	$pst_notes_v
) 
{	
	global $db;

	//named placeholders
	$query = 
		"UPDATE petstore
		SET
		pst_name = :pst_name_p,
		pst_street = :pst_street_p,
		pst_city = :pst_city_p,
		pst_state = :pst_state_p,
		pst_zip = :pst_zip_p,
		pst_phone = :pst_phone_p,
		pst_email = :pst_email_p,
		pst_url = :pst_url_p,
		pst_ytd_sales = :pst_ytd_sales_p,
		pst_notes = :pst_notes_p
		WHERE pst_id = :pst_id_p";

		//exit($query);

//exit($query);

		try
			{
				$statement = $db->prepare($query);
				$statement->bindParam(':pst_id_p', $pst_id_v);
				$statement->bindParam(':pst_name_p', $pst_name_v);
				$statement->bindParam(':pst_street_p', $pst_street_v);
				$statement->bindParam(':pst_city_p', $pst_city_v);
				$statement->bindParam(':pst_state_p', $pst_state_v);
				$statement->bindParam(':pst_zip_p', $pst_zip_v);
				$statement->bindParam(':pst_phone_p', $pst_phone_v);
				$statement->bindParam(':pst_email_p', $pst_email_v);
				$statement->bindParam(':pst_url_p', $pst_url_v);
				$statement->bindParam(':pst_ytd_sales_p', $pst_ytd_sales_v);
				$statement->bindParam(':pst_notes_p', $pst_notes_v);
				$row_count = $statement->execute();
				$statement->closeCursor();

				//testing
				//exit($row_count);
			}

			catch (PDOException $e)
				{
					$error = $e->getMessage();
					display_db_error($error);
				}
}

  //delete petstore
function delete_petstore($pst_id_v) 
{
	global $db;

	$query = 
	"DELETE FROM petstore
	WHERE pst_id = :pst_id_p";

	try
	{
		$statement = $db->prepare($query);
		$statement->bindParam(':pst_id_p', $pst_id_v);
		$row_count = $statement->execute();
		$statement->closeCursor();

		//testing
		//exit($row_count);
	}

	catch (PDOException $e)
	{
		$error = $e->getMessage();
		display_db_error($error);
	}
}
?>
