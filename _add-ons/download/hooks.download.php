<?php
class Hooks_download extends Hooks
{

	public function download__download()
	{
		$file      = Request::get('file');
		$filename  = Path::fromAsset($file);
		$as        = Request::get('as', $file);
		$logged_in = filter_var(Request::get('logged_in', true), FILTER_VALIDATE_BOOLEAN);
		$override  = Request::get('override');
		
		if (!$logged_in) {
			// first make sure there's an override in the config
			$override_config = $this->fetchConfig('override');
			if (!$override_config) {
				die('No override key configured');
			}
			
			// now see if there's an override param
			if (!$override) {
				die('No override param');
			}
			
			if ($override_config != $override) {
				die("Override key & param don't match");
			}
		} elseif (!Auth::isLoggedIn()) {
		// if the user has to be logged in, see if they are
			die('Must be logged in');
		}
		
		if (!$this->download($filename, $as)) {
			die('File doesn\'t exist');
		}
	}

	private function download($file, $as)
	{
		
		if (!File::exists($file) || is_dir($file)) {
			return false;
		}
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='. basename($as));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}

}