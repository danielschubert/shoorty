<body>

<div class="container">
	<div class="panel"><h1 class="small">Willkommen bei Shoorty - der ultimative Link Kürzer!</h1></div>

	<div id="body">
            <?php 
            $this->load->helper('form');
            echo form_open('shorty/shorten');
            $attr = array('class' => 'glyphicon-asterisk');
            echo form_label('Link einfügen   ', 'shorten', $attr);

            $data = array(
                          'name'        => 'url',
                          'id'          => 'url',
                          'value'       => 'www.example.com',
                          'maxlength'   => '100',
                          'size'        => '50',
                          'style'       => 'width:50%',
                        );

            echo form_input($data);
            $attr = array('class' => 'btn-primary', 'name'=> 'shorten');
            echo form_submit($attr, 'Shoorten Me!'); 
            echo form_close();
            ?>
<?php /*
            <div style="margin-top:30px;">
                <ol>
                        <?php foreach ($shorty as $short_link): ?>

                        <li><?php echo $short_link['url'];?><br /><?php echo $short_link['shortlink'] ?></li>

                        <?php endforeach ?>
                </ol>
            </div>
	</div>

        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
*/
?>

</div>

</body>
</html>
