<?php

class Tools
{
	public static function p($v, $die = FALSE)
	{
		print('<pre>');
		print_r($v);
		print('</pre>');
		if($die)
		{
			exit;
		}
	}

	public static function createToken()
	{
		return md5(uniqid(mt_rand(), TRUE));
	}

	public static function yearSelect()
	{
		$now = getdate();
		foreach(range(1920, $now['year']) as $num)
		{
			$years[$num] = $num;
		}
		$years[''] = '';
		return array_reverse($years, TRUE);
	}

	public static function getThumbnail($file, $x, $y = null, $option = null)
	{
		self::runlong();
		$file = (string) $file;
		$x = (int) $x;
		$y = (int) $y;

		if(empty($file))
		{
			return null;
		}

		$fileInfo = pathinfo($file);
		$dir = str_replace('/uploads', '', $fileInfo['dirname']);
		$realDir = sfConfig::get('sf_upload_dir') . $dir;
		$realFile = "{$realDir}/{$fileInfo['basename']}";

		if(!$y)
		{
			$srcImageInfo = @GetImageSize($realFile);
			$srcX = $srcImageInfo[0];
			$srcY = $srcImageInfo[1];
			$ratio = $srcX / $x;
			$y = floor($srcY / $ratio);
		}

		$filename = "{$fileInfo['filename']}_{$x}x{$y}.{$fileInfo['extension']}";
		$thumbFile = "{$realDir}/{$filename}";

		if(!file_exists($thumbFile))
		{
			if(file_exists($realFile))
			{
				$thumbnail = new sfThumbnail($x, $y);
				$thumbnail->loadFile($realFile);
				$thumbnail->save($thumbFile);

				if($option && $option == 'canvas')
				{
					// Now go get the first resample
			   	$imgData = @GetImageSize($thumbFile);
			    $thumb_w = $imgData[0];
			    $thumb_h = $imgData[1];
			    $mime = $imgData['mime'];

			    // Do we need to canvas?
			    if($thumb_w != $x || $thumb_h != $y)
			    {
				    $origImg = imagecreatefromstring($thumbnail->toString());

				    // Create the canvas image resource
				    $canvasImg = imageCreateTrueColor($x, $y);
				    imagefill($canvasImg, 0, 0, imagecolorallocate($canvasImg, 255, 255, 255));
				    $canvasXoffset = 0.5*($x - $thumb_w);
				    $canvasYoffset = 0.5*($y - $thumb_h);
				    imagecopymerge($canvasImg, $origImg, $canvasXoffset, $canvasYoffset, 0, 0 , $thumb_w, $thumb_h, 100);

				    // Create a raw stream and then load this back in to the adapter
				    switch($mime)
				    {
				    	case 'image/png':
				    		imagepng($canvasImg, $thumbFile, 2);
				    		break;
				    	case 'image/gif':
				    		imagegif($canvasImg, $thumbFile);
				    		break;
				    	case 'image/jpeg':
				    	case 'image/pjpeg':
				    	default:
				    		imagejpeg($canvasImg, $thumbFile, 100);
				    }

				    // Cleanup
				    imagedestroy($origImg);
				    imagedestroy($canvasImg);
				  }
				}
				elseif($option && $option = 'crop')
				{
					$imgData = @GetImageSize($thumbFile);
			    $thumb_w = $imgData[0];
			    $thumb_h = $imgData[1];
			    $mime = $imgData['mime'];

			    $biggestSide = $thumb_w > $thumb_h ? $thumb_w : $thumb_h;
			   	$cropWidth   = $biggestSide * 0.5;
   				$cropHeight  = $biggestSide * 0.5;
   				$tx = ($thumb_w - $cropWidth) / 2;
   				$ty = ($thumb_h - $cropHeight) / 2;

			    $origImg = imagecreatefromstring($thumbnail->toString());
			    $canvasImg = imageCreateTrueColor($x, $y);
			    imagecopyresampled($canvasImg, $origImg, 0, 0, $tx, $ty, $x, $y, $cropWidth, $cropHeight);
			    switch($mime)
			    {
			    	case 'image/png':
			    		imagepng($canvasImg, $thumbFile, 2);
			    		break;
			    	case 'image/gif':
			    		imagegif($canvasImg, $thumbFile);
			    		break;
			    	case 'image/jpeg':
			    	case 'image/pjpeg':
			    	default:
			    		imagejpeg($canvasImg, $thumbFile, 100);
			    }

			    // Cleanup
			    imagedestroy($origImg);
			    imagedestroy($canvasImg);
				}
			}
		}

		return "{$fileInfo['dirname']}/{$filename}";
	}

	public static function runlong($mb = 256)
	{
		ignore_user_abort(TRUE);
		set_time_limit(86400);
		ini_set('memory_limit', "{$mb}M");
	}
}
