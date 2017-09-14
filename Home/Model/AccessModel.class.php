<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-13 14:15:50
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 20:16:51
 */
namespace Home\Model;
use Frame\Libs\BaseModel;
final class AccessModel extends BaseModel {

	protected $table='xb_access';
	public function updateAccess(){

		 $time =time();
 		 $ip=$_SERVER["REMOTE_ADDR"];
	     $sql = "update  xb_access set lastIp='{$ip}', lastTime={$time}, assess_count = assess_count+1 ";
	   	 $this->pdo->exec($sql);

	}


}