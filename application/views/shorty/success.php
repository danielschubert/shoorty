<body>
<div class="container">
	<h1 class="glyphicon-asterisk" >Dein Shoorty!</h1>

	<div id="body">
                <section id="shortlink">
                        <h3 class="glyphicon-cog text-success">Hier der Kurz-Link</h3>
                        <?php echo anchor("/?sl=" . $sl, $_SERVER['SERVER_NAME'] . "/?sl=" . $sl, array('target' => '_blank', 'link_rel'=>'nofollow')); ?>
                </section>
                <section id="orig-url">
                        <h2> Hier der Original Link </h2>
                         <?php echo anchor($url,$url); ?>
                </section>

                <div>
                        <hr />
                        <?php echo anchor("/shorty", "Zurück", 'class="text-info"'); ?> 
                </div>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
