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
    <br><br>
    <div class="row"> 
        <?php  
        echo $this->Flash->render();
        echo $this->Flash->render('auth');
        ?>
    </div> 
    <br>
    <div class="detailBox">
        <div class="titleBox">
            <label>Messages</label>
        </div>
        
        <div class="actionBox">
            <ul class="commentList">
                <li>
                <div class="commentText">
                <?php foreach ($chats as $chat):?>
                <p class=""><?php echo $chat->chat;?></p> <span class="date sub-text"><?php echo $chat->created;?></span>
                <?php endforeach;?>
                </div>
                </li>                
            </ul>
            <?php echo $this->Form->create($messages);?>
                <input type="hidden" value="<?php echo $userId;?>" name="user_id" /> 
                <div class="form-group">                  
                <input class="form-control input-md" type="text" name="chat" placeholder="Your comments"/>
                </div>
                <div>
                <button type="submit" class="btn btn-primary">Reply</button>
                </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>

</div>
