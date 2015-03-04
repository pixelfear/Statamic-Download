<?php
class Plugin_download extends Plugin
{

	public function index()
	{
		$file = $this->fetchParam(array('file', 'filename', 'url'), null, null, false, false);
		$as   = $this->fetchParam('as', null, null, false, false);

		$url  = URL::prependSiteRoot('/TRIGGER/download/download?file='.$file);
		
		if ($as) {
			$url .= '&as='.$as;
		}
		
		return $url;
	}

}
