<@php

namespace {namespace};

{comment}


/**
 * {class} Class
 *
 */
class {class}
{

<?php if(isset($methods)):
foreach($methods as $method):?>
    <?php echo "$method
    {

    }".PHP_EOL;?>
<?php endforeach;?>
<?php endif;?>
}


