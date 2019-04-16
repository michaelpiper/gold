<?php
# Write a simple tool that takes in a single keyword, scraps twitter and displays only tweets that contain the
# given keyword as a hashtag. Note that tweets that just contain the keyword should not be returned.
# You may use the Sample realtime Tweets API.
# You may not use twitterʼs search or realtime filter APIs for this task.
# The exercise is fairly open-ended, as we want to get an idea of your ability to design and build something
# great.

$tag=<<<TAG
#love
#instagood
#me
#tbt
#cute
#follow
#followme
#photooftheday
#happy
#tagforlikes
#beautiful
#self
#girl
#picoftheday
#like4like
#smile
#friends
#fun
#like
#fashion\n
TAG;
echo $tag;
class tweet{
	protected $tweets=[];
	public $hashtag=null;
	public function set ($json){
		$decode=json_decode($json);
		foreach ($decode as $key=>$value) {
			# code...
			$this->tweets[$key]=$value;
		}
	}
	public function get (){
		return $this->tweets;
	}
	protected function find ($id){
		if(count($this->tweets)<0){
			echo "no tweet to check from";
		}
		else{
			$found=false;
			foreach ($this->tweets as $key => $value) {
    			# code...
				// loop through all data from json
    			if(preg_match("/^\#/i", $id)){
    				// check if input has hash if dont add
    				if(preg_match("/".$id."/i", $value)){
    					echo "\n\n";
    					echo $key ." tweeted:\n";
	    				echo preg_replace("/(".$id.")/i", "<b>$1</b>", $value)."\n";
	    				$found=true;
	    			}
    			}else{
					if(preg_match("/\#".$id."/i", $value)){
						// check if input doesn\'t have hash if add
						echo "\n\n";
						echo $key ." tweeted:\n";
	    				echo preg_replace("/(\#".$id.")/i", "<b>$1</b>", $value)."\n";
	    				$found=true;
	    			}
    			}
    		}
    		if($found==false){
    			// this will be called only if tweet is not found
    			echo "hashtag: ";
    			echo preg_match("/^\#/i", $id)? $id:"#".$id	;
    			echo " was not found on the tweets list\n";
    		}
		}
		
	}
	public function run(){
		// because find is  protected , only run can call it from within
		$this->find($this->hashtag);
	}
}
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
function get_json($where='tweet.json'){
	if ($stream = fopen($where, 'r')) {
	    return stream_get_contents($stream);
	    fclose($stream);
	}
}

$a="#love";
$tweetlib=get_json();
$do = new tweet();
$do->set($tweetlib);
// print_r($do->get());
$do->hashtag=(string)$a;
$do->run();

function doityourself(){
	echo"test it Yourself\n";
	$a=readline_terminal('hashtag: ');
	$tweetlib=get_json();
	$do = new tweet();
	$do->set($tweetlib);
	// print_r($do->get());
	$do->hashtag=(string)$a;
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
#####################################################################$$$
###Time complexity: O(a)
###Auxiliary space: O(1)
##
###
##   this code is written by Michael Piper date tues Apr 16, 1:09 PM
#
#   this code use terminal to run or command prompt
#########################################################################
?>
