<?php 
/*
 * Javascript Validation CakePHP Helper
 *
 */

//feel free to replace these or overwrite in your bootstrap.php
if (!defined('VALID_EMAIL_JS')) {
  define('VALID_EMAIL_JS', '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/');
}
//I know the octals should be capped at 255
if (!defined('VALID_IP_JS')) {
  define('VALID_IP_JS', '/^[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}$/');
}

//list taken from /cake/libs/validation.php line 497
if (!defined('DEFAULT_VALIDATION_EXTENSIONS')) {
  define('DEFAULT_VALIDATION_EXTENSIONS', 'gif,jpeg,png,jpg');
}

if (!function_exists('json_decode') ){
        function json_decode($json) {                 
                $comment = false;
                $out = '$x=';
 
                for ($i=0; $i<strlen($json); $i++)  {
                        if (!$comment) {
                                if ($json[$i] == '{') $out .= ' array(';
                                else if ($json[$i] == '}') $out .= ')';
                                else if ($json[$i] == ':') $out .= '=>';
                                else $out .= $json[$i];           
                        }
                        else $out .= $json[$i];
                        if ($json[$i] == '"')    $comment = !$comment;
                }
                eval($out . ';');
                return $x;
        }
}
if (!function_exists('json_encode')) {
        function json_encode($a=false) {
                if (is_null($a)) return 'null';
                if ($a === false) return 'false';
                if ($a === true) return 'true';
                if (is_scalar($a)) {
                if (is_float($a)) {
                        // Always use "." for floats.
                        return floatval(str_replace(",", ".",
strval($a)));
                }
                if (is_string($a)) {
                        // MintState Insert
                        $a = preg_replace('{(</)(script)}i', "$1'+'$2",
$a);
            
                        static $jsonReplaces = array(array("\\", "/",
"\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t',
'\\r', '\\b', '\\f', '\"'));
                        return '"' . str_replace($jsonReplaces[0],
$jsonReplaces[1], $a) . '"';
                }
                else return $a;
                }
                $isList = true;
                for ($i = 0, reset($a); $i < count($a); $i++, next($a))
{
                        if (key($a) !== $i) {
                                $isList = false;
                                break;
                        }
                }
                $result = array();
                if ($isList) {
                        foreach ($a as $v) $result[] = json_encode($v);
                        return '[ ' . join(', ', $result) . ' ]';
                }
                else
                {
                        foreach ($a as $k => $v) $result[] =
json_encode($k).': '.json_encode($v);
                        return '{ ' . join(', ', $result) . ' }';
                }
        }
}


class ValidationHelper extends Helper {
  var $helpers = array('Javascript');

  //For security reasons you may not want to include all possible validations
  //in your bootstrap you can define which are allowed
  //Configure::write('javascriptValidationWhitelist', array('alphaNumeric', 'minLength'));
  var $whitelist = false;

  function rules($modelNames, $options=array()) {
    $scriptTags = '';
    
    if (empty($options) || !is_array($options)) {
      $options = array();
    }

    $defaultOptions = array('formId' => false, 'inline' => true);
    $options = array_merge($defaultOptions, $options);

    //load the whitelist
    $this->whitelist = Configure::read('javascriptValidationWhitelist');

    if (!is_array($modelNames)) {
      $modelNames = array($modelNames);
    }

    //catch the form submit
    $formId = 'form';
    if ($options['formId']) {
      //$formId = '#' . $formName;//vinod commented this line on 4th Dec
      $formId = '#' . $options['formId'];
    }
    $scriptTags  	.= "jQuery(document).ready(function(){ jQuery('". $formId . "').submit( function() { return validateForm(this, rules); }); });\n";

    //filter the rules to those that can be handled with JavaScript
    $validation = array();
    foreach($modelNames as $modelName) {
      $model = new $modelName();

      foreach ($model->validate as $field => $validators) {
        if (array_intersect(array('rule', 'required', 'allowEmpty', 'on', 'message'), array_keys($validators))) {
          $validators = array($validators);
        }

        foreach($validators as $key => $validator) {
          $rule = null;

          if (!is_array($validator)) {
            $validator = array('rule' => $validator);
          }

          //skip rules that are applied only on created or updates
          if (!empty($validator['on'])) {
            continue;
          }

          if (!isset($validator['message'])) {
            $validator['message'] = sprintf('%s %s',
                                            __('There was a problem with the field', true),
                                            Inflector::humanize($field)
                                           );
          }


          if (!empty($validator['rule'])) {
            $rule = $this->convertRule($validator['rule']);
          }

          if ($rule) {
            $temp = array('rule' => $rule,
                          'message' => __($validator['message'], true)
                         );


            if (isset($validator['allowEmpty']) && $validator['allowEmpty'] === true) {
              $temp['allowEmpty'] = true;
            }

            if (in_array($validator['rule'], array('alphaNumeric', 'blank'))) {
              //Cake Validation::_check returning true is actually false for alphaNumeric and blank
              //add a "!" so that JavaScript knows
              $temp['negate'] = true;
            }

            $validation[$modelName . Inflector::camelize($field)][] = $temp;
          }
        }
      }
    }

    //pr($validation); die;

    $scriptTags 	.= "var rules = eval(" . json_encode($validation) . ");\n";

    if ($options['inline']) {
      return sprintf($this->Javascript->tags['javascriptblock'], $scriptTags);
    } else {
      $this->Javascript->codeBlock($scriptTags, array('inline' => false));
    }
    
    return true;
  }

  function convertRule($rule) {
    $regex = false;

    if ($rule == '_extract') {
      return false;
    }

    if (is_array($this->whitelist) && !in_array($rule, $this->whitelist)) {
      return false;
    }

    $params = array();
    if (is_array($rule)) {
      $params = array_slice($rule, 1);
      $rule = $rule[0];
    }

    //Certain Cake built-in validations can be handled with regular expressions,
    //but aren't on the Cake side.
    switch ($rule) {
	case 'alphaNumeric':
	return '/^[a-zA-Z0-9]{1,200}$/';
	 
      case 'between':
        return sprintf('/^.{%d,%d}$/', $params[0], $params[1]);
      case 'date':
        //Some of Cake's date regexs aren't JavaScript compatible. Skip for now
        return false;
      case 'email':
        return VALID_EMAIL_JS;
      case 'equalTo':
        return sprintf('/^%s$/', $params[0]);
      case 'extension':
	if(!empty($params[0])) {		
		$ext=implode('|',$params[0]);

	}else{
		$ext=implode('|', explode(',', DEFAULT_VALIDATION_EXTENSIONS));
	}
        return sprintf('/\.(%s)$/', $ext);
      case 'ip':
        return VALID_IP_JS;
      case 'minLength':
        return sprintf('/^.{%d,}$/', $params[0]);
      case 'maxLength':
        return sprintf('/^.{0,%d}$/', $params[0]);
      case 'money':
        //The Cake regex for money was giving me issues, even within PHP.  Skip for now
        return false;
      case 'numeric':
        //Cake uses PHP's is_numeric function, which actually accepts a varied input
        //(both +0123.45e6 and 0xFF are valid) then what is allowed in this regular expression.
        //99% of people using this validation probably want to restrict to just numbers in standard
        //decimal notation.  Feel free to alter or delete.
        return '/^[+-]?[0-9]+$/';
      case 'range':
        //Don't think there is a way to do this with a regular expressions,
        //so we'll handle this with plain old javascript
        return sprintf('range|%s|%s', $params[0], $params[1]);
    }

    //try to lookup the regular expression from
    //CakePHP's built-in validation rules
    $Validation =& Validation::getInstance();
    if (method_exists($Validation, $rule)) {
      $Validation->regex = null;
      call_user_func_array(array(&$Validation, $rule), array_merge(array(true), $params));

      if ($Validation->regex) {
        $regex = $Validation->regex;
      }
    }

    //special handling
    switch ($rule) {
      case 'postal':
      case 'ssn':
        //I'm not a regex guru and I have no idea what "\\A\\b" and "\\b\\z" do.
        //Is it just to match start and end of line?  Why not use
        //"^" and "$" then?  Eitherway they don't work in JavaScript.
        return str_replace(array('\\A\\b', '\\b\\z'), array('^', '$'), $regex);
    }

    return $regex;
  }
}
?>