<?php

use MtHaml\Autoloader;
use MtHaml\Environment;

require_once __DIR__ . '/Autoloader.php';

Autoloader::register();

$haml = new MtHaml\Environment('php', array('enable_escaper' => false, 'escape_html' => false, 'escape_attrs' => false));

echo $haml->getOption("escape_html");

$remove_methods = true;
foreach (glob(__DIR__ . "/../../app/views/*.haml") as $file) { 
    $filename = basename($file);
    if($filename !== ""){
      $compiled = $haml->compileString(file_get_contents($file), $filename);
      $filename_fixed = str_replace("haml", "php", $filename);
      if($remove_methods){
        preg_match_all('/\<\?php echo MtHaml\\\\Runtime::renderAttributes(.*)\?\>/', $compiled, $to_render, PREG_PATTERN_ORDER);
        foreach ($to_render[0] as $value) {
          $initial_value = $value;
          $remove_open_and_close = substr(substr($value, 6), 0, -3);
          preg_match_all('/MtHaml\\\\Runtime\\\\AttributeList::create\(\(.*\"\)\)/', $remove_open_and_close, $replace_with_array);
          foreach ($replace_with_array as $attribute_list_method) {
            if(!empty($attribute_list_method)){
              $item = $attribute_list_method[0];
              $attr = preg_replace('/\"\)\)/', "", preg_replace('/MtHaml\\\\Runtime\\\\AttributeList::create\(\(/', "", $item));
              $remove_quotes = str_replace('"',"", $attr);
              $separate_attributes = explode(":", $remove_quotes);
              $attributes = array(trim($separate_attributes[0]), trim($separate_attributes[1]));
              $value = str_replace($attribute_list_method, $attributes, $value);
              
            }
          }
          $to_eval = substr(substr($value, 11), 0, -3);
          $final_eval = html_entity_decode(eval("return " . $to_eval), ENT_QUOTES);

          $compiled = str_replace("<?php echo '<?'; ?>", "<?", str_replace($initial_value, $final_eval, $compiled));
        }
        $compiled = str_replace("<?php echo '<?'; ?>", "<?", $compiled);
      }
      file_put_contents(__DIR__ . $argv[1] . $filename_fixed, $compiled);
    }
}

?>