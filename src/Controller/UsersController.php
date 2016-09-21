<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public $UsersTable;
    public $MessagesTable;
    
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->UsersTable = TableRegistry::get('users');
        $this->MessagesTable = TableRegistry::get('messages');
        $this->Auth->allow(['login']);
    }    

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);                
                $this->Flash->success(__('Welcome ' . $this->Auth->user('email')));
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->set('user', $this->UsersTable->newEntity());
        $this->set('title', 'Login');
    }
    
    public function index() {
        $users = $this->UsersTable->find()->contain(['Messages']);
        $this->set('users', $users);
        $this->set('title', 'User List');
    }
    
    public function chat($userId) {
        $chats = $this->MessagesTable->find()->where(['user_id'=>$userId]);
        if ($this->request->is('post')) {
            $messageTable = $this->MessagesTable->newEntity();
            $Message = $this->MessagesTable->patchEntity($messageTable,$this->request->data);
            if ($this->MessagesTable->save($Message)) {                
                $this->Flash->success(__('Your message has been saved successfully.'));
            }else{
            $this->Flash->error(__('An error occured, try again'));
            }
        }
        $this->set('messages', $this->MessagesTable->newEntity());
        $this->set('chats', $chats);
        $this->set('userId', $userId);
        $this->set('title', 'Messages');
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}
