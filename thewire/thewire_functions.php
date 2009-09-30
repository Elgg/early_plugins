<?php

	/**
	 * A function to pull out @mentions on the new wire
	 **/
	
	function get_entities_from_mentions($entity_type = "", $entity_subtype = "", $name = "", $value = "", $owner_guid = 0, $group_guid = 0, $limit = 10, $offset = 0, $order_by = "asc", $count = false, $timelower = 0, $timeupper = 0, $username)
	{
		global $CONFIG;
		
		$entity_type = sanitise_string($entity_type);
		$entity_subtype = get_subtype_id($entity_type, $entity_subtype);
		$timelower = (int) $timelower;
		$timeupper = (int) $timeupper;
		
		if(!empty($username))
			$username = "@$username";
		
		if ($name)
		{
			$name = get_metastring_id($name);
		
			if ($name === false)
				$name = 0;
		}
		if ($value != "") $value = get_metastring_id($value);
		if (is_array($owner_guid)) {
			if (sizeof($owner_guid) > 0) {
				foreach($owner_guid as $key => $val) {
					$owner_guid[$key] = (int) $val;
				}
			} else {
				$owner_guid = 0;
			}
		} else {
			$owner_guid = (int)$owner_guid;
		}
		$group_guid = (int)$group_guid;
		
		$limit = (int)$limit;
		$offset = (int)$offset;
		if($order_by == 'asc')
		    $order_by = "maxtime asc";
		    
		if($order_by == 'desc')
		    $order_by = "maxtime desc";
		
		$where = array();
		
		if ($entity_type != "")
			$where[] = "e.type='$entity_type'";
			
		if ($entity_subtype != "")
			$where[] = "e.subtype='$entity_subtype'";
		
		if ($owner_guid != 0 && !is_array($owner_guid)) {
			$where[] = "a.owner_guid=$owner_guid";
		} else {
			if (is_array($owner_guid))
				$where[] = "a.owner_guid in (" . implode(",",$owner_guid) . ")";
		}
		
		if (($group_guid != 0) && ($entity_type=='object'))
			$where[] = "e.container_guid = $group_guid";
			
		if ($name !== "")
			$where[] = "a.name_id='$name'";
			
		if ($value != "")
			$where[] = "a.value_id='$value'";

		if ($timelower)
			$where[] = "a.time_created >= {$timelower}";
		if ($timeupper)
			$where[] = "a.time_created <= {$timeupper}";
		
		if ($count) {
			$query = "SELECT count(distinct e.guid) as total ";
		} else {
			$query = "SELECT e.*, max(a.time_created) as maxtime ";			
		}
		$query .= "from {$CONFIG->dbprefix}annotations a JOIN {$CONFIG->dbprefix}entities e on e.guid = a.entity_guid ";
		$query .= "JOIN {$CONFIG->dbprefix}objects_entity o on o.guid = e.guid ";
		$query .= "JOIN {$CONFIG->dbprefix}metastrings m on a.value_id = m.id";
		$query .= " where";
		    
		foreach ($where as $w)
			$query .= " $w and ";
		$query .= get_access_sql_suffix("a"); // Add access controls
		$query .= ' and ' . get_access_sql_suffix("e"); // Add access controls
		$query .= " AND m.string LIKE '%$username%' ";
		$query .= " OR o.description LIKE '%$username%' ";
		if ($count) {
			$row = get_data_row($query);
			return $row->total;
		} else {
			$query .= " group by a.entity_guid order by $order_by limit $offset,$limit"; // Add order and limit
			return get_data($query, "entity_row_to_elggstar");
		}    
	}
	
?>