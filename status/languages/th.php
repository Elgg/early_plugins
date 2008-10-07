<?php

	$thai = array(
	
		/**
		 * Menu items and titles
		 */
	
			'status' => "สถานะ",
			'status:user' => "สถานะ %s",
			'status:posttitle' => "สถานะ %s : %s",
			'status:everyone' => "สถานะทั้งหมด",
			'status:strapline' => "%s",
			'status:addstatus' => "เปลี่ยนสถานะ",
		    'status:messages' => "ขอความสถานะ",
			'status:text' => "สถานะ:",
			'status:set' => "ตั้งค่า ",
			'status:clear' => "ล้างสถานะ",
			'status:delete' => "ลบสถานะ",
			'status:nostatus' => "ไม่มีสถานะ",
			'status:viewhistory' => "ดูประวัติ",
	
			'item:object:status' => 'ข้อความสถานะ',
	
	
        /**
	     * Status river
	     **/
	        
	        //generic terms to use
	        'status:river:created' => "%s อัพเดต",
	        
	        //these get inserted into the river links to take the user to the entity
	        'status:river:create' => "สถานะ",
	        
	        
	
		/**
		 * Status messages
		 */
	
			'status:posted' => "สถานะของคุณอัพเดตแล้ว",
			'status:deleted' => "ลบสถานะของคุณแล้ว",
	
		/**
		 * Error messages
		 */
	
			'status:blank' => "เสียใจด้วย; ไม่สามารถบันทึกสถานะได้",
			'status:notfound' => "เสียใจด้วย; ไม่สามารถหาขอ้ความสถานะเจอ",
			'status:notdeleted' => "เสียใจด้วย; ไม่สามารถลบได้",
			'status:notsaved' => "ไม่สามารถบันทึกได้โปรดติดต่อผู้ดูแล",
			'status:problem' => "ไม่สามารถดูได้คุณต้องแก้ไขสถานะ",
	
	);
					
	add_translation("th",$thai);

?>
