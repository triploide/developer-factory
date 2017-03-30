<?php
function listarDirectorios($ruta){
	set_time_limit(100);
   if (is_dir($ruta)) { 
      if ($dh = opendir($ruta)) { 
         while (($file = readdir($dh)) !== false) {
            if (is_dir($ruta . $file) && $file!="." && $file!=".."){
				if ($file == '.svn' || $file == '__notes') {
					delete_directory($ruta.$file);
				}
               listarDirectorios($ruta . $file . "/"); 
            } 
         }
      	closedir($dh); 
      } 
   }
} 
listarDirectorios('./');
}

function delete_directory($dirname) {
	if (is_dir($dirname)) {
		$dir_handle = opendir($dirname);
	}
	if (!$dir_handle) {
		return false;
	}
	while($file = readdir($dir_handle)) {
		if ($file != "." && $file != "..") {
			if (!is_dir($dirname."/".$file)) {
				unlink($dirname."/".$file);
			} else {
				delete_directory($dirname.'/'.$file);
			}
		}
	}
	closedir($dir_handle);
	rmdir($dirname);
	return true;
} 
?>