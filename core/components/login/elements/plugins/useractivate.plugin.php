<?php
if ($modx->event->name == 'OnUserActivate') {
	require_once $modx->getOption('login.core_path',null,$modx->getOption('core_path').'components/login/').'model/login/login.class.php';
	$scriptProperties['event']=$modx->event;
	$login = new Login($modx,$scriptProperties);

	$controller = $login->loadController('NotifyUserActivation');
	$output = $controller->run($scriptProperties);
}