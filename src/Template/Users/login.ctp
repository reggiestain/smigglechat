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

<div class = "container">
    <div class="wrapper">
        <?php echo $this->Form->create($user);?>
        <h3 class="form-signin-heading">Please Sign In</h3>
        <hr class="colorgraph"><br>
        <div class="row"> 
        <?php  
        echo $this->Flash->render();
        echo $this->Flash->render('auth');
        ?>
       </div> 
        <div class="row">
        <input type="text" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
        </div>
        <br>
        <div class="row">
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        </div>
        <br>
        <div class="row">        
        <button class="btn btn btn-primary"  name="Submit" value="Login" type="Submit">Login</button>
        </div>
        <?php echo $this->Form->end();?>
    </div>
</div>
