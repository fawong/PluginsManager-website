<?php
function active_class($paths)
{
  if (gettype($paths) == "string") {
    $paths = [$paths];
  }

  foreach($paths as $path) {
	  if ($_SERVER["HTTP_HOST"] == $path || $_SERVER['SCRIPT_NAME'] == "/" + $path + ".php") {
	    echo 'class="active"';
	  }
  }
}

function get_config($file)
{
  $file_contents = file_get_contents($file);
  $config = yaml_parse($file_contents);
  return $config;
}


function dump_pre($var)
{
  echo '<pre>';
  print_r($var);
  echo '</pre>';
}


function dump_table($var, $title=false, $level=0)
{
    if($level==0)
    {
        echo '<table width="400" border="0" cellspacing="1" cellpadding="3" class="dump">';
       
        if($title)
              echo '<tr>
                     <th align="center" colspan="2">'.$title.'</th>
                   </tr>';
         
        echo '
          <tr>
            <th align="right">VAR NAME</th>
            <th align="left">VALUE</th>
          </tr>';
    }
    else
    {
        echo '<tr>
                <td colspan="2">
                    <table width="100%" border="0" cellspacing="3" cellpadding="3" class="dump_b">
                </td>
              </tr>';
    }
   
    foreach($var as $i=>$value)
    {
        if(is_array($value) or is_object($value))
        {
            dump_table($value, false, ($level +1));
        }
        else
        {
                echo '<tr>
                        <td align="right" width="50%" >'.$i.'</th>
                        <td align="left" width="50%" >'.$value.'</th>
                       </tr>';
        }
    }
    echo '</table>';
}


/**
 * Better GI than print_r or var_dump -- but, unlike var_dump, you can only dump one variable. 
 * Added htmlentities on the var content before echo, so you see what is really there, and not the mark-up.
 *
 * Also, now the output is encased within a div block that sets the background color, font style, and left-justifies it
 * so it is not at the mercy of ambient styles.
 *
 * Inspired from:     PHP.net Contributions
 * Stolen from:       [highstrike at gmail dot com]
 * Modified by:       stlawson *AT* JoyfulEarthTech *DOT* com
 *
 * @param mixed $var  -- variable to dump
 * @param string $var_name  -- name of variable (optional) -- displayed in printout making it easier to sort out what variable is what in a complex output
 * @param string $indent -- used by internal recursive call (no known external value)
 * @param unknown_type $reference -- used by internal recursive call (no known external value)
 */
function do_dump(&$var, $var_name = NULL, $indent = NULL, $reference = NULL)
{
    $do_dump_indent = "<span style='color:#666666;'>|</span> &nbsp;&nbsp; ";
    $reference = $reference.$var_name;
    $keyvar = 'the_do_dump_recursion_protection_scheme'; $keyname = 'referenced_object_name';
   
    // So this is always visible and always left justified and readable
    echo "<div style='text-align:left; background-color:white; font: 100% monospace; color:black;'>";

    if (is_array($var) && isset($var[$keyvar]))
    {
        $real_var = &$var[$keyvar];
        $real_name = &$var[$keyname];
        $type = ucfirst(gettype($real_var));
        echo "$indent$var_name <span style='color:#666666'>$type</span> = <span style='color:#e87800;'>&amp;$real_name</span><br />";
    }
    else
    {
        $var = array($keyvar => $var, $keyname => $reference);
        $avar = &$var[$keyvar];

        $type = ucfirst(gettype($avar));
        if($type == "String") $type_color = "<span style='color:green'>";
        elseif($type == "Integer") $type_color = "<span style='color:red'>";
        elseif($type == "Double"){ $type_color = "<span style='color:#0099c5'>"; $type = "Float"; }
        elseif($type == "Boolean") $type_color = "<span style='color:#92008d'>";
        elseif($type == "NULL") $type_color = "<span style='color:black'>";

        if(is_array($avar))
        {
            $count = count($avar);
            echo "$indent" . ($var_name ? "$var_name => ":"") . "<span style='color:#666666'>$type ($count)</span><br />$indent(<br />";
            $keys = array_keys($avar);
            foreach($keys as $name)
            {
                $value = &$avar[$name];
                do_dump($value, "['$name']", $indent.$do_dump_indent, $reference);
            }
            echo "$indent)<br />";
        }
        elseif(is_object($avar))
        {
            echo "$indent$var_name <span style='color:#666666'>$type</span><br />$indent(<br />";
            foreach((Array) $avar as $name=>$value) do_dump($value, "$name", $indent.$do_dump_indent, $reference);
            echo "$indent)<br />";
        }
        elseif(is_int($avar)) echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> $type_color".htmlentities($avar)."</span><br />";
        elseif(is_string($avar)) echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> $type_color\"".htmlentities($avar)."\"</span><br />";
        elseif(is_float($avar)) echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> $type_color".htmlentities($avar)."</span><br />";
        elseif(is_bool($avar)) echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> $type_color".($avar == 1 ? "TRUE":"FALSE")."</span><br />";
        elseif(is_null($avar)) echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> {$type_color}NULL</span><br />";
        else echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> ".htmlentities($avar)."<br />";

        $var = $var[$keyvar];
    }
   
    echo "</div>";
}


////////////////////////////////////////////////////////
// Function:         dump
// Inspired from:     PHP.net Contributions
// Description: Helps with php debugging

function dump(&$var, $info = FALSE)
{
    $scope = false;
    $prefix = 'unique';
    $suffix = 'value';
 
    if($scope) $vals = $scope;
    else $vals = $GLOBALS;

    $old = $var;
    $var = $new = $prefix.rand().$suffix; $vname = FALSE;
    foreach($vals as $key => $val) if($val === $new) $vname = $key;
    $var = $old;

    echo "<pre style='margin: 0px 0px 10px 0px; display: block; background: white; color: black; font-family: Verdana; border: 1px solid #cccccc; padding: 5px; font-size: 10px; line-height: 13px;'>";
    if($info != FALSE) echo "<b style='color: red;'>$info:</b><br />";
    original_do_dump($var, '$'.$vname);
    echo "</pre>";
}


////////////////////////////////////////////////////////
// Function:         do_dump
// Inspired from:     PHP.net Contributions
// Description: Better GI than print_r or var_dump

function original_do_dump(&$var, $var_name = NULL, $indent = NULL, $reference = NULL)
{
    $original_do_dump_indent = "<span style='color:#eeeeee;'>|</span> &nbsp;&nbsp; ";
    $reference = $reference.$var_name;
    $keyvar = 'the_original_do_dump_recursion_protection_scheme'; $keyname = 'referenced_object_name';

    if (is_array($var) && isset($var[$keyvar]))
    {
        $real_var = &$var[$keyvar];
        $real_name = &$var[$keyname];
        $type = ucfirst(gettype($real_var));
        echo "$indent$var_name <span style='color:#a2a2a2'>$type</span> = <span style='color:#e87800;'>&amp;$real_name</span><br />";
    }
    else
    {
        $var = array($keyvar => $var, $keyname => $reference);
        $avar = &$var[$keyvar];
   
        $type = ucfirst(gettype($avar));
        if($type == "String") $type_color = "<span style='color:green'>";
        elseif($type == "Integer") $type_color = "<span style='color:red'>";
        elseif($type == "Double"){ $type_color = "<span style='color:#0099c5'>"; $type = "Float"; }
        elseif($type == "Boolean") $type_color = "<span style='color:#92008d'>";
        elseif($type == "NULL") $type_color = "<span style='color:black'>";
   
        if(is_array($avar))
        {
            $count = count($avar);
            echo "$indent" . ($var_name ? "$var_name => ":"") . "<span style='color:#a2a2a2'>$type ($count)</span><br />$indent(<br />";
            $keys = array_keys($avar);
            foreach($keys as $name)
            {
                $value = &$avar[$name];
                original_do_dump($value, "['$name']", $indent.$original_do_dump_indent, $reference);
            }
            echo "$indent)<br />";
        }
        elseif(is_object($avar))
        {
            echo "$indent$var_name <span style='color:#a2a2a2'>$type</span><br />$indent(<br />";
            foreach($avar as $name=>$value) original_do_dump($value, "$name", $indent.$original_do_dump_indent, $reference);
            echo "$indent)<br />";
        }
        elseif(is_int($avar)) echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> $type_color$avar</span><br />";
        elseif(is_string($avar)) echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> $type_color\"$avar\"</span><br />";
        elseif(is_float($avar)) echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> $type_color$avar</span><br />";
        elseif(is_bool($avar)) echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> $type_color".($avar == 1 ? "TRUE":"FALSE")."</span><br />";
        elseif(is_null($avar)) echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> {$type_color}NULL</span><br />";
        else echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> $avar<br />";

        $var = $var[$keyvar];
    }
}


function fail_dump($value,$level=0)
{
  if ($level==-1)
  {
    $trans[' ']='&there4;';
    $trans["\t"]='&rArr;';
    $trans["\n"]='&para;;';
    $trans["\r"]='&lArr;';
    $trans["\0"]='&oplus;';
    return strtr(htmlspecialchars($value),$trans);
  }
  if ($level==0) echo '<pre>';
  $type= gettype($value);
  echo $type;
  if ($type=='string')
  {
    echo '('.strlen($value).')';
    $value= dump($value,-1);
  }
  elseif ($type=='boolean') $value= ($value?'true':'false');
  elseif ($type=='object')
  {
    $props= get_class_vars(get_class($value));
    echo '('.count($props).') <u>'.get_class($value).'</u>';
    foreach($props as $key=>$val)
    {
      echo "\n".str_repeat("\t",$level+1).$key.' => ';
      dump($value->$key,$level+1);
    }
    $value= '';
  }
  elseif ($type=='array')
  {
    echo '('.count($value).')';
    foreach($value as $key=>$val)
    {
      echo "\n".str_repeat("\t",$level+1).dump($key,-1).' => ';
      dump($val,$level+1);
    }
    $value= '';
  }
  echo " <b>$value</b>";
  if ($level==0) echo '</pre>';
}


// An elegant dump
// By BigueNique@yahoo.ca
$elegant_dump_indent = '|&nbsp;&nbsp;&nbsp;&nbsp';
function elegant_dump(&$var, $var_name='', $indent='', $reference='') {
    global $elegant_dump_indent;
    $reference=$reference.$var_name;

    // first check if the variable has already been parsed
    $keyvar = 'the_elegant_dump_recursion_protection_scheme';
    $keyname = 'referenced_object_name';
    if (is_array($var) && isset($var[$keyvar])) {
        // the passed variable is already being parsed!
        $real_var=&$var[$keyvar];
        $real_name=&$var[$keyname];
        $type=gettype($real_var);
        echo "$indent<b>$var_name</b> (<i>$type</i>) = <font color=\"red\">&amp;$real_name</font><br />";
    } else {

        // we will insert an elegant parser-stopper
        $var=array($keyvar=>$var,
                   $keyname=>$reference);
        $avar=&$var[$keyvar];

        // do the display
        $type=gettype($avar);
        // array?
         if (is_array($avar)) {
            $count=count($avar);
            echo "$indent<b>$var_name</b> (<i>$type($count)</i>) {<br />";
            $keys=array_keys($avar);
            foreach($keys as $name) {
                $value=&$avar[$name];
                elegant_dump($value, "['$name']", $indent.$elegant_dump_indent, $reference);
            }
            echo "$indent}<br />";
        } else
        // object?
         if (is_object($avar)) {
            echo "$indent<b>$var_name</b> (<i>$type</i>) {<br />";
            foreach($avar as $name=>$value) elegant_dump($value, "-&gt;$name", $indent.$elegant_dump_indent, $reference);
            echo "$indent}<br />";
        } else
        // string?
        if (is_string($avar)) echo "$indent<b>$var_name</b> (<i>$type</i>) = \"$avar\"<br />";
        // any other?
        else echo "$indent<b>$var_name</b> (<i>$type</i>) = $avar<br />";

        $var=$var[$keyvar];
    }
}
?>
