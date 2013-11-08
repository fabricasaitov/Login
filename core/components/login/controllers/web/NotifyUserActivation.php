<?php
/**
 * Login
 *
 * Copyright 2010 by Shaun McCormick <shaun+login@modx.com>
 *
 * Login is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Login is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Login; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package login
 */
/**
 * Sends activation email on user activation
 *
 * @package login
 * @subpackage controllers
 *
 * @property modUser $user
 */
class LoginNotifyUserActivationController extends LoginController {
    private $user;
    public function initialize() {
        $this->setDefaultProperties(array(
            'notifyEmailTpl' => 'lgnActivationEmailForUser',
            'notifyEmailTplType' => 'modChunk',
            'notifyEmailTplAlt' => '',
            'notifyEmailSubject' => 'You account is activated'
        ));
        $this->user=$this->getProperty('user');
    }

    public function process() {
        if(!($this->user instanceof modUser)) {
            return false;
        }
        $emailProperties=$this->_gatherEmailProperties();
        $profile = $this->user->getOne('Profile');
        if (empty($profile)) {
            return false;
        }
        $email=$profile->get('email');
        $name=$this->user->get('username');
        $subject = $this->getProperty('notifyEmailSubject',$this->modx->lexicon('login.notify_activation_email_subject'));
        return $this->login->sendEmail($email,$name,$subject,$emailProperties);
    }

    /**
     * Get all the properties for the notification email
     * @return array
     */
    private function _gatherEmailProperties() {
        /* set confirmation email properties */
        $emailTpl = $this->getProperty('notifyEmailTpl','lgnActivationEmailForUser');
        $emailTplAlt = $this->getProperty('notifyEmailTplAlt','');
        $emailTplType = $this->getProperty('notifyEmailTplType','modChunk');
        $emailProperties = $this->user->toArray();
        $emailProperties['tpl'] = $emailTpl;
        $emailProperties['tplAlt'] = $emailTplAlt;
        $emailProperties['tplType'] = $emailTplType;

        return $emailProperties;
    }
}
return 'LoginNotifyUserActivationController';