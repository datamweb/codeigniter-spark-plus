<@php

{comment}

namespace {namespace};

/**
 * {class} contains a collection of methods
 */
trait {class}
{

<?php if(isset($methods)):?>
<?php foreach($methods as $method):?>
    <?php echo "$method
    {

    }".PHP_EOL;?>
<?php endforeach;?>
<?php endif;?>
}