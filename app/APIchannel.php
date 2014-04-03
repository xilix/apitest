<?php
class APIchannel
{
  public $in = "";
  public $out = "";

  public function start($delay = 7, $iterations = 10)
  {
    $start = microtime(true);
    for ($i = 0; $i < $iterations; $i += 1) {
      echo "check channel\n";
      if (file_exists($this->in))
      {
        rename($this->in, $this->out);
      }
      sleep($delay);
    }
  }
}

