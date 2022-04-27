<?php

namespace App\Html;

class Forms extends HtmlElement
{
  public static function input(string $type = "text", string $name = null, string $value = null, string $placeholder = null)
  {
    return <<<HTML
      <input type="$type" name="$name" value="$value" placeholder="$placeholder" />
    HTML;
  }
  public static function button(string $type = null, string $label = null)
  {
    return <<<HTML
      <button type="$type">$label</button>
    HTML;
  }
}
