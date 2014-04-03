<?php
class Publisher
{
  public $file = "";
  public function publish($msg)
  {
    if (file_exists($this->file))
    {
      unlink($this->file);
    } 
    file_put_contents($this->file, $msg);
  }
}
