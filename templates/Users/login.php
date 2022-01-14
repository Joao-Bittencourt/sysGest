<?php
    echo $this->Flash->render();
?>

<div class="row justify-content-center">
    <div class="card">
        <div class="card-body">
            <div>SysGEST</div>
            
            <?= $this->Form->create(); ?>
                <div class="form-group">
                    <?= $this->Form->control('login', ['label' => 'Email', 'class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('password', ['label' => 'Senha', 'class' => 'form-control', 'type' => 'password']); ?>
                </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                        </label>
                    </div>
            <?php
                echo $this->Form->button('Login', ['class' => "btn btn-primary col"]);
                echo $this->Form->end();
            ?>     
        </div>
    </div>
</div>