<?php

namespace App\Services;

class Form
{
    public function setInput($id, $label, $elementType, $type, $name, $placeholder)
    {
        ?>
        <div class="form-group">
            <label for="<?=$id?>"><?=$label?></label>
            <<?=$elementType?> type="<?=$type?>" name="<?=$name?>" class="form-control" id="<?=$id?>" aria-describedby="nameHelp" placeholder="<?=$placeholder?>"></<?=$elementType?>>
        </div>
        <?php
    }
}
