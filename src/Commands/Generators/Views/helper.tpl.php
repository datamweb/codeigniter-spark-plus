<@php

{comment}

<?php if(isset($methods)):
    
    foreach($methods as $key => $method):?>

if (! function_exists('<?php echo $methodName[$key];?>')) 
{  

    <?php echo "$method
    {

    }".PHP_EOL;?>
}
    <?php endforeach;?>
<?php endif;?>