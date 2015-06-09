<div class="container">
	<h1><small>Dein Shoorty!</small></h1>

                <div class="alert alert-success well well-lg">
                    <?php echo anchor("/?sl=" . $sl, $_SERVER['SERVER_NAME'] . "/?sl=" . $sl, array('target' => '_blank', 'link_rel'=>'nofollow')); ?>
                </div>
                
                <h2><small>Der Original Link</small></h2>
                <?php echo anchor($url,$url); ?>
             
                <div>
                        <hr />
                        <?php echo anchor("/shorty", "Zurück", 'class="text-info"'); ?> 
                </div>
