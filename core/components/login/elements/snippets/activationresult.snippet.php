<?php
/**
 * Snippet performs rendering of activation result page
 * @var array $scriptProperties
 */
$scriptProperties['tpl']=$modx->getOption('tpl',$scriptProperties,'lgnActivationResultOk');
$scriptProperties['tplError']=$modx->getOption('tplError',$scriptProperties,'lgnActivationResultError');
if(isset($_REQUEST['userid']) && isset($_REQUEST['username'])) {
	if($user=$modx->getObject('modUser',intval($_REQUEST['userid']))) {
		if($user->get('username')==$_REQUEST['username']) {
			if($user->get('active')==1) {
				return $modx->getChunk($scriptProperties['tpl'],$user->toArray());
			}
		}
	}
}
return $modx->getChunk($scriptProperties['tplError']);