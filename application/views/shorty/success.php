<div class="container">
	<h1><small>Dein Shoorty!</small></h1>

	<div id="body">
                <h3 class="success" >Hier der Kurz-Link</h3>
                
                <div class="alert alert-success well well-lg">
                    <?php echo anchor("/?sl=" . $sl, $_SERVER['SERVER_NAME'] . "/?sl=" . $sl, array('target' => '_blank', 'link_rel'=>'nofollow')); ?>
                </div>
                
                <h2> Hier der Original Link </h2>
                <?php echo anchor($url,$url); ?>
             
                <div>
                        <hr />
                        <?php echo anchor("/shorty", "Zurück", 'class="text-info"'); ?> 
                </div>

	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
