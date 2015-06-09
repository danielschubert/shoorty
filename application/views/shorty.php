<div class="container">
	<div class="page-header"><h1>Willkommen bei Shoorty <small> der ultimative Link Kürzer!</small></h1></div>

	<div class="jumbotron">
            <?php 
            $this->load->helper('form');
            echo form_open('shorty/shorten');
            $attr = array('class' => 'glyphicon glyphicon-plus');
            echo '<span style="margin-right: 5%;">' . form_label('Link einfügen   ', 'shorten', $attr) . '</span>';

            $data = array(
                          'name'        => 'url',
                          'id'          => 'url',
                          'placeholder' => 'http://www.irgendeine-geile-domain.org',
                          'maxlength'   => '100',
                          'size'        => '50',
                          'style'       => 'width:50%',
                          'type'        => 'url'
                        );

            echo form_input($data);
            $attr = array('class' => 'btn btn-primary', 'name'=> 'shorten');
            echo '<span style="margin-left: 5%;">' . form_submit($attr, 'Shoorten Me!') . '</span>'; 
            echo form_close();
            ?>
        </div> <!-- jumbotron -->


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
