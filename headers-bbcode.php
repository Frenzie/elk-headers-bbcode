<?php
if (!defined('ELK')) 
	die('Hacking attempt...');

function headers_bbcode(&$codes, &$no_autolink_tags, &$itemcodes)
{
	global $modSettings;
	$bbc_headers = array('h1','h2','h3','h4','h5','h6');

	// Only for when bbc is on
	if (empty($modSettings['enableBBC']))
		return;

	// Make sure the admin has not disabled the move tag
	if (!empty($modSettings['disabledBBC']))
	{
		foreach (explode(',', $modSettings['disabledBBC']) as $tag)
		{
			if (in_array($tag, $bbc_headers, true ))
				return;
		}
	}

	foreach ($bbc_headers as $bbc_header)
	{
		$codes[] = array(
			'tag' => $bbc_header,
			'before' => '<'.$bbc_header.' class="bbc_header">',
			'after' => '</'.$bbc_header.'>',
			'block_level' => true,
		);
	}
}
?>
