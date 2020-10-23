<?php

namespace App\Services;

class Form
{
    public function createInput(string $id, string $label, string $name, string $placeholder): void
    {
        ?>
        <div class="form-group">
            <label for="<?=$id?>"><?=$label?></label>
            <input type="text" name="<?=$name?>" class="form-control" id="<?=$id?>" aria-describedby="nameHelp" placeholder="<?=$placeholder?>" required></input>
        </div>
        <?php
    }

    public function createTextArea(string $id, string $label, string $name, string $placeholder): void
    {
        ?>
        <div class="form-group">
            <label for="<?=$id?>"><?=$label?></label>
            <textarea type="text" name="<?=$name?>" class="form-control" id="<?=$id?>" aria-describedby="nameHelp" placeholder="<?=$placeholder?>" minlength="50" required></textarea>
        </div>
        <?php
    }

    public function createSubmit(): void
    {
        ?>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <?php
    }
}
