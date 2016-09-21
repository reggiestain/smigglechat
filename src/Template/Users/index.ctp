<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>

<div class="container">
    <div class="row" style="margin-top: 50px"> 
        <?php  
        echo $this->Flash->render();
        echo $this->Flash->render('auth');
        ?>
    </div> 
    <br>
    <h2>User List</h2> 
    <table class="table table-bordered">
        <thead>
        <tr>
        <th>User</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
        <td><?php echo $user->email;?></td>
        <td>
        <?php
        if(empty($user->messages[0])){
        echo $this->Html->link('Start chating',['controller' => 'Users','action' => 'chat',$user->id]);
        }else{
        echo $this->Html->link('Continue chating',['controller' => 'Users','action' => 'chat',$user->id]);    
        }
        ?>
        </td>
        </tr>
        <?php endforeach;?>   
        </tbody>
    </table>
</div>
