<?php

	$thai = array(
	
		/** 
		 * Menu items and titles
		 */
	
			'messageboard:board' => "กระดานฝากข้อความ",
			'messageboard:messageboard' => "กระดานฝากข้อความ",
			'messageboard:viewall' => "ดูทั้งหมด",
			'messageboard:postit' => "เขียนข้อความ",
			'messageboard:history' => "ประวัติ",
			'messageboard:none' => "ยังไม่มีข้อความ",
			'messageboard:num_display' => "จำนวนข้อความที่ต้องการแสดง",
			'messageboard:desc' => "นี่เป็นกระดานฝากข้อความคุณสามารถแสดงความคิดหรือเขียนฝากข้อความได้ที่นี้",
			
         /**
	     * Message board widget river
	     **/
	        
	        'messageboard:river:annotate' => "%s มีข้อความใหม่ในกระดานข้อความ",
	        'messageboard:river:create' => "%s เพิ่มวิดเจ็ตฝากข้อความ",
	        'messageboard:river:update' => "%s อัพเดตวิดเจ็ตฝากข้อความ",
			
		/**
		 * Status messages
		 */
	
			'messageboard:posted' => "บันทึกข้อความของคุณแล้ว",
			'messageboard:deleted' => "ลบข้อความของคุณแล้ว",
	
		/**
		 * Email messages
		 */
	
			'messageboard:email:subject' => 'คุณมีข้อความใหม่ในกระดานฝากข้อความของคุณ!',
			'messageboard:email:body' => "คุณมีข้อความใหม่ในกระดานฝากข้อความจาก %s. ไปอ่าน:

			
%s


หากต้อการอ่านคลิ๊ก:

	%s

ดูโปรไฟลืของ  %s,คลิ๊ก:

	%s

คุณไม่จำเแ็ต้องตอบกลับอีเมลฉบับบนี้.",
	
		/**
		 * Error messages
		 */
	
			'messageboard:blank' => "เสียใจด้วย; ข้อความไม่สามารถบันทึกได้",
			'messageboard:notfound' => "เสียใจด้วย; เราไม่สามารถหาขอ้ความนี้ได้",
			'messageboard:notdeleted' => "เสียใจด้วย; ไม่สามารถลบข้อความได้.",
	     
			'messageboard:failure' => "มีปัญหาบางอย่างเกิดขึ้นกับการโพสข้อความ ลองใหม่สิ",
	
	);
					
	add_translation("th",$thai);

?>
