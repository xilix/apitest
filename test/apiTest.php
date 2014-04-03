<?php
include("app/consumer.php");
include("app/publisher.php");


class apiTest extends PHPUnit_Framework_TestCase
{
  public function testTransfer()
  {
    $fileIn = "app/publish/msg.txt";
    $fileOut = "app/consume/msg.txt";
    $fileResult = "app/result/index.htm";
    $serverUrl = "http://localhost/apitest/";

    // Just to set up the channel. This would be working the whole time
    exec('php setApi.php "'.$fileIn.'" "'.$fileOut.'" "'.$fileResult.'" > logApi.txt 2>&1');

    $msg = "Hello World!";
    $publisher = new Publisher();
    $publisher->file = $fileIn;
    $publisher->publish($msg);

    $curl = curl_init($serverUrl.$fileResult);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $DOM = new DOMDocument;

    $start = microtime(true);
    for ($i = 0; $i < 10; $i += 1) {
      $DOM->loadHTML(curl_exec($curl));
      $items = $DOM->getElementsByTagName("h1");

      for ($j = 0; $j < $items->length; $j += 1)
      {
        if ($items->item($j)->nodeValue == $msg)
        {
          $this->assertTrue(true, "Message transmited :)");
          $i = 100;
          break;
        }
      }
      sleep(2);
    }
    if ($i < 100)
    {
      $this->assertTrue(false, "No message transmited :(");
    }
  }
}
