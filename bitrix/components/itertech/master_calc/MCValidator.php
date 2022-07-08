<?php
class MCValidator {
	public static function check($value, $type, $params = array()) {
		$result = array(
			'errors' => array(),
			'messages' => array()
		);
		switch ($type) {
			case 'required': 
				if (trim($value) == '') {
					$result['errors'][] = GetMessage("ARLIGHT_ARSTORE_PUSTOE_POLE");
				}
				break;
			case 'no_validation':
				break;
		}
		return $result;
	}
}