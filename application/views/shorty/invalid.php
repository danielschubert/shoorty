<div class="container">
	<h1>Kein Shorty!</h1>
        <div>
                <p class="alert alert-danger">Das ging schief! Diesen Shortlink gibt's nicht!
        </div>
        <?php 
            $attr = array('class' => 'btn btn-primary');
            echo anchor("/shorty", "Zurück", $attr); ?> 
