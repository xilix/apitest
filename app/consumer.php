<?php
class Consumer 
{
  public $file = "";
  public $result = "";
  public function consume($delay = 5, $iterations = 10)
  {
    $start = microtime(true);
    for ($i = 0; $i < $iterations; $i += 1) {
      echo "consume\n";
      if (file_exists($this->file))
      {
        $msg = file_get_contents($this->file);
        if (file_exists($this->result))
        {
          unlink($this->result);
        }
        file_put_contents($this->result, 
          "<!DOCTYPE html><head><title>Result</title></head><body><h1>".
          $msg."</body></html>");
        unlink($this->file);
      } 
      sleep($delay);
    }
  }
}
