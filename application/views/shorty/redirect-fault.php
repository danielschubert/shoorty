<div class="container">
	<h1>Kein Shorty!</h1>
        <div>
                <p class="alert alert-danger">Das ging schief! Mit dem Redirect stimmt was nicht!
        </div>
        <?php 
            $attr = array('class' => 'btn btn-primary');
            echo anchor("/shorty", "Zurück", $attr); ?> 
