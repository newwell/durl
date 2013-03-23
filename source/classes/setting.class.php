<?php
class setting {
	
	private $_settingArr = array();

	public function __construct(){
		$tablepre = getConfig('tablepre');
		$sql = "SELECT * FROM  `{$tablepre}settings`";
		$query = $GLOBALS['_DB_']->query($sql);
		while($fa = $GLOBALS['_DB_']->fetch_array($query)){
			$this->_settingArr[$fa['variable']] = $fa['value'];
		}
	}
	
	public function getSetting($setting) {
		if (array_key_exists($setting, $this->_settingArr)) {
			return $this->_settingArr[$setting];
		}
		return '';
	}
	/**
	 * 修改设置
	 * @param string $set	
	 */
	public function setSetting($set,$value) {
		if (!self::getSetting($set)) {
			return false;
		}
		$sql = "UPDATE ".getConfig('tablepre')."settings SET value = '$value' WHERE variable = '$set'";
		$GLOBALS['_DB_']->query($sql);
		return true;
	}
}