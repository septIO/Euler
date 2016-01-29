<?php
  /**
   * Run this script to download all question from ProjectEuler.net
   * This will generate the following folder structure:
   * x-y/[w] z
   * Where x and y is the range of questions inside, z is the name of the question, and w is the question index
   * Change the $folderThreshold to the maximum amount of questions per folder (default: 50)
   */
namespace Euler;

$euler = new Euler();
$euler -> folderThreshold = 50;
for($i = 1; $i <= 3; $i++){
  var_dump($euler -> requestPage($i));
}
class Euler
{
  
  /**
   * This variable holds the range of subfolders inside a main folder
   * The challenge index is 1-based, so the Default value of 50
   * will generate the following structure:
   * 1-50/xxx
   * 51-100/xxx
   */
  public $folderThreshold;
  
  /**
   * This holds the index of the challenge we're currently working with.
   * Use setChallenge(x) to change it, Default: 1
   */
  private $currentChallenge;
  
  public $HTML;
  /**
   * Instantiate class with default / parsed values.
   * 
   * @param int $folderThreshold folder range
   */
  public function __construct(){
    
    $this -> currentChallenge = 1;
    
  }
  
  public function createStructure($start){
    $this -> currentChallenge = $start;
    $lowerBound = floor(($this -> currentChallenge - 1) / $this -> folderThreshold) * $this -> folderThreshold + 1;
    
    $upperBound = ceil($this -> currentChallenge / $this -> folderThreshold) * $this -> folderThreshold;
    $folderPath = $lowerBound . '-' . $upperBound . '/[' . $this -> currentChallenge . '] - ' . 'Title';
    
    if(!file_exists($folderPath . '/index.php')){
      mkdir($folderPath, 0777, true);
      file_put_contents($folderPath . '/index.php', $this -> writeComment($this -> requestPage()));
    }
      
    
    echo $folderPath . '<br />';
    
  }
  
  /**
   * Set challenge index
   * 
   * @param int $challengeIndex Index of current challenge
   */
  public function setChallenge($challengeIndex){
    
    $this -> currentChallenge = $challengeIndex;
    
  }
  
  /**
   * Requests the current challenge HTML
   * @return string | false HTML
   */
  public function requestPage(){
    
    $url = 'https://projecteuler.net/problem=';
    libxml_use_internal_errors(true);
    $doc = new \DOMDocument;
    $doc->strictErrorChecking = false;
    $doc->recover = true;
    
    $doc->loadHTMLFile($url . $this -> currentChallenge);
    
    $xpath = new \DOMXPath($doc);
    $this -> HTML = $xpath;
    $query = "//div[@class='problem_content']";
    
    $entries['content'] = $xpath -> query($query);
    $entries['title'] = $xpath -> query("//h2");
    
    // If the div doesn't exist, we're done extracting
    return $entries ? $this -> DOMinnerHTML($entries['content'] -> item(0)) : false;;
    
  }
  
  public function getTitle(){

    $this -> requestPage();
    return $this -> HTML;
  }
  
  /**
   * Extract pure HTML from the source instead of stripping all tags
   * @param  DOMDocument Object $element
   * @return string
   */
  private function DOMinnerHTML($element){ 
    
    $innerHTML = ""; 
    $children = $element->childNodes; 
    foreach ($children as $child) 
    { 
        $tmp_dom = new \DOMDocument(); 
        $tmp_dom->appendChild($tmp_dom->importNode($child, true)); 
        $innerHTML.=trim($tmp_dom->saveHTML()); 
    } 
    return $this -> fixTags($innerHTML);
  }
  
  /**
   * Fixes different tags like <br/> to PHP_EOL and <p> to 2xPHP_EOL
   * @param string $html
   */
  private function fixTags($html){
    
    $change = ["<br />", "</p>",          "<sup>", "$\sum_", "$"];
    $with     = [PHP_EOL,  PHP_EOL.PHP_EOL, "^",     "∑",      " "];
    $remove = ["<p>", "</sup>"];
    
    return strip_tags(str_replace($remove, '', str_replace($change, $with, $html)));
    
  }
  
  private function writeComment($comment){
    
    return '/**' . PHP_EOL. PHP_EOL . $comment . PHP_EOL . '*/' . PHP_EOL;
    
  }
  
}