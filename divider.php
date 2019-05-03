<?php

class divider{
	// code written in PHP
	public $a=null;
	public $b=null;
	protected $dividend=null;
	protected $divisor=null;
	protected function find_remainder($val,$val2,$qt){
		// this function find the remainder from Quotient;
		$ans=($val2*$qt);
		if(($val2)<0):
			$sign=-1;
		else:
			$sign=1;
		endif;
		$i=$sign;
		if($sign==-1){
			do{
				// $i>$this->dividend;$i--;
				// echo $i."id\n";	
				$rm=0;
				$rm=$rm+$i;
				$check=$ans+$i;
				if ($check!=$val){
					// echo $this->dividend."dividend-\n";
					echo("{$val}={$val2} X {$qt} + {$rm};\n");
					echo $this->dividend."=".$check."\n";
					print( $check == $val ?"true\n":"false\n");
				}
				elseif($check==$val){
					// print( (($this->divisor*$qt)+$rm) < $this->dividend ?"true\n":"false\n");
					echo("{$val}={$val2} X {$qt} + {$rm};\n");
					echo $val."=".(($val2*$qt)+$rm)."\n";
					print( $check == $val ?"true\n":"false\n");
					$this->remainder=$rm;
					$this->quotient=$qt;
					break;
				}
				$i--;
			}while($i>$val2);
		}
		else{
			do{
				// $i>$this->dividend;$i--;
				// echo $i."id\n";	
				$rm=0;
				$rm=$rm+$i;
				$check=$ans+$i;
				if ($check!=$val){
					// echo $this->dividend."dividend-\n";
					echo("{$val}={$val2} X {$qt} + {$rm};\n");
					echo $this->dividend."=".$check."\n";
					print( $check == $val ?"true\n":"false\n");
				}
				elseif($check==$val){
					// print( (($this->divisor*$qt)+$rm) < $this->dividend ?"true\n":"false\n");
					echo("{$val}={$val2} X {$qt} + {$rm};\n");
					echo $val."=".(($val2*$qt)+$rm)."\n";
					print( $check == $val ?"true\n":"false\n");
					$this->remainder=$rm;
					$this->quotient=$qt;
					break;
				}
				$i++;

			}while($i<$val2);
		}
		return ["rm"=>$rm,"check"=>(($val2*$qt)+$rm)];
	}
	protected function do_divide(){
		$this->dividend=$this->a;
		$this->divisor=$this->b;
		if($this->dividend==null):
			echo "did not give a value for a";
			return false;
		elseif($this->divisor==null):
			echo "did not give a value for b";
			return false;
		else:
			// // the code continues to look for divideable
			$qt=0;
			$rm=0;
			if($this->dividend<0):
				$sign=-1;
			else:
				$sign=1;
			endif;
			// check the sign of the giving integer to know how to add and subtract from it
			if($this->divisor<0):
				$signdiv=-1;
			else:
				$signdiv=1;
			endif;
			$sign=$sign*$signdiv;
			// print_r($sign);
			if($this->dividend<0){
				for($a=-1;$a>$this->dividend;$a--){
					// echo "\n\n";
					// echo $a."loop\n";
					$qt=$qt+$sign;
					// find remaind from the use of temporal quotient and see if it matches.
					$check=$this->find_remainder($this->dividend,$this->divisor,$qt)['check'];
					if($this->dividend==$check){
						// if the quotient is valid close the loop;
						break;
					}
				}
			}
			else{
				for($a=1;$a<$this->dividend;$a++){
					// echo "\n\n";
					// echo $a."loop\n";
					$qt=$qt+$sign;
					// find remaind from the use of temporal quotient and see if it matches.
					$check=$this->find_remainder($this->dividend,$this->divisor,$qt)['check'];
					if($this->dividend==$check){
						// if the quotient is valid close the loop;
						break;
					}
				}
			}
		endif;
		return false;
	}

	public function run(){
		// because do_divide is  protected, only run can call it from within
		$start=0;
		$end=0;
		$result=$this->do_divide();
		// echo display result after collation
		echo"value given\n";
		echo "Numerator:".$this->a."\n";
		echo "Denominator:".$this->b."\n";
		echo"Quotient:".$this->quotient."\n";
		echo "Remainder:".$this->remainder."\n";
		return $result;
	}
}

$do = new divider();
echo"test one\n";
$do->a=6;
$do->b=5;
$do->run();
echo"test two\n";
$do->a=6;
$do->b=-5;
$do->run();
echo"test three\n";
$do->a=-6;
$do->b=5;
$do->run();
echo"test four\n";
$do->a=-6;
$do->b=-5;
$do->run();

function readline_terminal($prompt = '') {
    $prompt && print $prompt;
    $terminal_device = '/dev/tty';
    $h = fopen($terminal_device, 'r');
    if ($h === false) {
        #throw new RuntimeException("Failed to open terminal device $terminal_device");
        return false; # probably not running in a terminal.
    }
    $line = rtrim(fgets($h),"\r\n");
    fclose($h);
    return $line;
}
function doityourself(){
	echo"test it Yourself\n";
	$a=readline_terminal('Numerator: ');
	$b=readline_terminal('Denominator: ');
	$do = new divider();
	$do->a=(int)$a;
	$do->b=(int)$b;
	$do->run();
	promptQuestion();
}
function promptQuestion(){
	$q= readline_terminal("DO YOU WANT TO TRY YOUR SELF: Y/N \n");
	if(strtolower($q)=="y"||strtolower($q)=="yes" || strtolower($q)=="ye"){
		doityourself();
	}else{
		echo "thank you for your time you can reload the program to see the result again\n";
	}
}
promptQuestion();
// echo intdiv(6,-5);
// echo "\n";
// echo (-6/-4);
// echo fgetc(INPUT)
#####################################################################$$$
###Time complexity: O(a)
###Auxiliary space: O(1)
##
###
##   this code is written by Michael Piper date tues Apr 16, 12:15 PM
#
#	 this code use terminal to run or command prompt
# Implement integer division without using the division operator. That is, given a numerator (dividend) and
# denominator (divisor), return the quotient and remainder, or return an error when the denominator is zero.
# Either or both of the inputs may be negative. The remainder should have the same sign as the
# denominator. Of course, the absolute value of the remainder should be less than that of the denominator.
######################################################################$$$###
?>
