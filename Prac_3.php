<!DOCTYPE html>
<html>
<body>
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Enter first string : <input type="text" name="str1" autofocus="autofocus">
  Enter second string : <input type="text" name="str2" autofocus="autofocus">
  Enter string by which to replace : <input type="text" name="str3" autofocus="autofocus">
  <input type="submit">
</form>

<?php
	function udf($a,$b,$c)
	{
	  $count=0;
	  $firstoc=0;
	  $lastoc=0;
	  $s="";
	  for($i=0;$i<=(strlen($a)-strlen($b));$i++)
	  {
	    $bo=true;
	    for($j=0;$j<strlen($b);$j++)
	    {
	      if($a[$i+$j]!=$b[$j])
	      {
	        $bo=false;
	        break;
	      }
	    }

	    if($bo)
	    {
	      $lastoc=$i;
	      $count++;
	      if($count==1)
	      {
	        $firstoc=$i;
	      }
	      $s=$s.$c;
	      $i=$i+strlen($b)-1;
	    }
	    else
	    {
	      $s=$s.$a[$i];
	    }
 	}

  echo "First occurrence is at position of: ".$firstoc."<br>";
  echo "Last occurrence is at position of: ".$lastoc."<br>";
  echo "Number of occurrences: ".$count."<br>";
  echo "Replaced String is: ".$s."<br>";

}

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		    $a1 = htmlspecialchars($_REQUEST['str1']); 
		    $b1 = htmlspecialchars($_REQUEST['str2']); 
		    $c = htmlspecialchars($_REQUEST['str3']); 
		    if (empty($a1) && empty($b1)) 
		    {
		        echo "User has not entered 2 strings!";
		    } 
		    else 
		    {
		        $n1=strlen($a1);
		        $n2=strlen($b1);
		        if($n1 >= $n2)
		        {
		        	$a=$a1;
		        	$b=$b1;
		        }
		        else
		        {
		        	$a=$b1;
		        	$b=$a1;
		        }

		        $ans1=stripos($a,$b);
		        $ans2=strripos($a,$b);
		        $oc=substr_count($a,$b);

		        echo "<br><br>";
		        echo "USING INBUILT FUNCTIONS: <br><br>";
		        echo "The first occurence of '$b' in '$a' is at: $ans1<br>";
		        echo "The last occurence of '$b' in '$a' is at: $ans2<br>";
		        echo "The total occurences of '$b' in '$a' are: $oc<br>";
		        echo "'$a' after replacement of '$b' by '$c' is: ".str_replace($b, $c, $a);
		        echo "<br> <br>";
		        echo "USING USER-DEFINED FUNCTIONS: <br><br>";
		        udf($a,$b,$c);
		    }
		}

?>
</body>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>