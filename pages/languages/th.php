<?php
	/**
	 * Elgg pages plugin language pack
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	$thai = array(
	
		/**
		 * Menu items and titles
		 */
			
			'pages' => "เนื้อหา",
			'pages:yours' => "เนื้อหาของคุณ",
			'pages:user' => "เนื้อหาแรก",
			'pages:group' => "%s เนื้อหา",
			'pages:all' => "เนื้อหาทั้งหมด",
			'pages:new' => "เนื้อหาใหม่",
			'pages:groupprofile' => "เนื้อหาของกลุ่ม",
			'pages:edit' => "แก้ไขเนื้อหา",
			'pages:delete' => "ลบเนื้อหา",
			'pages:history' => "ประวัติเนื้อหา",
			'pages:view' => "ดูเนื้อหา",
			'pages:welcome' => "แก้ไขขอ้ความต้อนรับ",
			'pages:welcomeerror' => "มีปัญหาในการบันทึกข้อความต้อนรับ",
			'pages:welcomeposted' => "บันทึกข้อความต้อนรับแล้ว",
			'pages:navigation' => "เครื่องมือนำทาง",
	
			'item:object:page_top' => 'เนื้อหาชั้นสูงสุด',
			'item:object:page' => 'เนื้อหา',
			'item:object:pages_welcome' => 'การเข้าถึงถูกระงับ',
	
	
		/**
		 * Form fields
		 */
	
			'pages:title' => 'ชื่อเนื้อหา',
			'pages:description' => 'รายละเอียด',
			'pages:tags' => 'แทค',	
			'pages:access_id' => 'การเข้าถึง',
			'pages:write_access_id' => 'การเข้าถึงการแก้ไขเนื้อหา',
		
		/**
		 * Status and error messages
		 */
			'pages:noaccess' => 'ไม่มีสิทธิเข้าชมเนื้อหานี้',
			'pages:cantedit' => 'คุณไม่สามารถแก้เนื้อหานี้ได้',
			'pages:saved' => 'บั้นทึกเนื้อหา',
			'pages:notsaved' => 'เนื้อหาไม่สามารถบันทึกได้',
			'pages:notitle' => 'คุณต้องใส่ชื่อเนื้อหา',
			'pages:delete:success' => 'เนื้อหาถูกลบแล้ว',
			'pages:delete:failure' => 'เนื้อหาไม่สามารถลบได้',
	
		/**
		 * Page
		 */
			'pages:strapline' => 'อัพเดตล่าสุด %s โดย %s',
	
		/**
		 * History
		 */
			'pages:revision' => 'ประวัติการปรับปรุง สร้าง %s โดย %s',
	
		/**
		 * Submenu items
		 */
			'pages:label:view' => "ดูเนื้อหา",
			'pages:label:edit' => "แก้ไขเนื้อหา",
			'pages:label:history' => "ประวัติเนื้อหา",
	
		/**
		 * Sidebar items
		 */
			'pages:sidebar:this' => "เนื้อหานี้",
			'pages:sidebar:children' => "เนื้อหารอง",
			'pages:sidebar:parent' => "เนื้อหาหลัก",
	
			'pages:newchild' => "สร้างเนื้อหารอง",
			'pages:backtoparent' => "กลับไปยัง '%s'",
	);
					
	add_translation("th",$thai);
?>
