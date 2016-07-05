<?php
if(!empty($options))
 {?>
<td>
<?php
 echo $form->hidden('Country.countrytest',array('size'=>'20','value'=>'mydata','type'=>'hidden','class'=>'textbox','label'=>'','maxlength'=>'50'));
?>
</td>
<td><p style='color:#ff0000;'>Country name already exist. Please try another.</p></td>
<?php
}else
{
echo $form->hidden('Country.countrytest', array('size'=>'20','value'=>' ','type'=>'hidden','class'=>'textbox','label'=>'','maxlength'=>'50'));  
}

?>