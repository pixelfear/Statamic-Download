<?php
class Hooks_download extends Hooks
{

	public function download__download()
	{
		$file     = Request::get('file');
		$filename = Path::fromAsset($file);
		$as       = Request::get('as', $file);

		if (!$this->download($filename, $as)) {
			die('File doesn\'t exist');
		}
	}

	private function download($file, $as)
	{
		if (!File::exists($file)) {
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