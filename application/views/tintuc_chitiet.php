<div class="hblock">
    <div class="btopr">
        <div class="btopl">
        </div>
    </div>
</div>
<div class="list" style="text-align:justify">

    <?php
        if (isset($news))
        {
    ?>
            <b><?php echo $news['main']['ntitle'] ?></b><br /><br /><?php echo $news['main']['nshort'] ?><br /><br />
            <img style="display:block; margin:0 auto" src="<?php echo base_url(). $this->config->item('tintuc') . $news['main']['ndate'] . "." . $news['main']['npic'] ?>"/><br />
            <?php echo $news['main']['ncont']?><br /><br />
            <p align="right"><font size="1">Cập nhật: <?php echo gmdate("H:i A - d/m/Y", $news['main']['ndate'] + 25200) ?></font></p>
            <br />
            <hr style="border-top:1px dotted #c6c6c6" /><br />
            <b><font color="#3281cd">Các bản tin khác</font></b><br />
            <?php
                foreach ($news['relative'] as $row)
                {
            ?>
                    <b>&raquo;</b><a href="<?php echo base_url('tin-tuc'). "/" . $row['nid'] ?>"><?php echo $row['ntitle']?></a><br /> 
            <?php
                }
            ?>
    
    <?php        
        }
    ?>   
</div>
<div class="bblock">
    <div class="bbotr">
        <div class="bbotl">
        </div>
    </div>
</div>
