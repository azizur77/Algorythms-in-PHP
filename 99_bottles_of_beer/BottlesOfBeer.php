<?php
/**
 * We have "n" number of bottles that in each chrous 
 * a defined number of them is taken down and the log is show
 * The iterator starts from the bottle number (default : 99)
 * and stops in a defined number (default : 0) in each loop itteration
 * a defined number is taken down from the bottles (default : 1)
*/
class BottlesOfBeer {

	/**
	 * Start bottles on the wall defaul 99
	 * 
	 * @var integer
	 */
	public $bottles;

	/**
	 * How many bottles to pass in each 
	 * 
	 * @var integer
	 */
	protected $pass_by;

	/**
	 * Template of leader lyric
	 * 
	 * @var string
	 */
	public $leader = "%s bottles of beer on the wall, %s bottles of beer.";

	/**
	 * Template of apprentice
	 *
	 * @var string 
	 */
	public $apprentice = "Take %s down and pass it around, %s bottles of beer on the wall.";

	/**
	 * Line breaker <br> or "\n"
	 *
	 * @var string
	 */
	public $line_breaker;

	/**
	 * Construct
	 *
	 * @return void
	 */
	public function __construct($pass_by = 1, $bottles = 99, $line_breaker = "\n")
	{
		if($pass_by < 1) 
			throw new Exception("the $pass_by parameter can not be lesser than 1", 1);
		
		$this->line_breaker = $line_breaker;
		$this->pass_by = $pass_by;
		$this->bottles = $bottles;
	}

	/**
	 * Pass bottles by number
	 *
	 * @param $num : integer
	 * @return void
	 */
	protected function passByNumber($num = false)
	{
		if($num === false)
			$num = $this->pass_by;
		$this->bottles = $this->bottles - $num;
	}

	/**
	 * Generate State  bottles
	 * 
	 * @return array
	 */
	protected function generateToNumber($num)
	{
		$lyr = array();
		while ($this->bottles > $num) {
			$tmpLyr = sprintf($this->leader,$this->bottles,$this->bottles);
			if($this->bottles < ($this->pass_by + $num))
				$this->pass_by = $this->bottles - $num;
			$this->passByNumber($this->pass_by);
			$tmpLyr .= $this->line_breaker . sprintf($this->apprentice,$this->pass_by,$this->bottles);
			$lyr[] = $tmpLyr;
		}
		return $lyr;
	}

	/**
	 * Sing To Zero 
	 *
	 * @return string
	 */
	public function singToZero()
	{
		return $this->singToNumber(0);
	}

	public function singToNumber($num)
	{
		return implode($this->line_breaker . $this->line_breaker,$this->generateToNumber($num));
	}

}