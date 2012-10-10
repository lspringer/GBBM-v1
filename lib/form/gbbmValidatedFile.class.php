<?php

class gbbmValidatedFile extends sfValidatedFile
{
	public function process()
	{
	    $filename = $this->generateFilename();
        $dirname = date('Ym');
        $realpath = sfConfig::get('sf_upload_dir').'/'.$dirname;
        if(!is_dir($realpath))
        {
            mkdir($realpath);
            chmod($realpath, 0775);
        }
	  $this->save($realpath.'/'.$filename);
       
	  return '/uploads/'.$dirname.'/'.$filename;
	}
}
