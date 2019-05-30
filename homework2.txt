<?php
#Part 1 
echo "<u>Part 1</u><br><br>";
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $current_date = date('F d, Y');
    echo $current_date."<br><br>";
    #The current_date will be display to show off the use of date function() and how to maniuplate all parts to show time
    $current_month = date('F');
    #current_month will take today's month and go through the if statements for that month's quote
    if($current_month = "January"){
		echo "January is your third most common month for madness.";
	}
	elseif($current_month = "February"){
		echo "February is full of love.";
	}
	elseif($current_month = "March"){
		echo "March brings out the Irish in us all.";
	}
    elseif($current_month = "April"){
		echo "April is the cruelest month, breeding lilacs out of the dead land, mixing memory and desire, stirring dull roots with spring rain.";
	}
    elseif($current_month = "May"){
		echo "In the marvellous month of May when all the buds were bursting, then in my heart did love arise.";
	}
    elseif($current_month = "June"){
		echo "I know well that the June rains just fall.";
	}
    elseif($current_month = "July"){
		echo "July we celebrate the the time our country became free.";
	}
    elseif($current_month = "August"){
		echo "August is when the summer lies down and sets for Fall.";
	}
    elseif($current_month = "September"){
		echo "We know that in September, we will wander through the warm winds of summer's wreckage.";
	}
    elseif($current_month = "October"){
		echo "October is the month of my birthday and when costumes come out to play.";
	}
    elseif($current_month = "November"){
		echo "November... gobble gobble gobble.";
	}
    elseif($current_month = "December"){
		echo "December, my favorite month with school ending and holiday celebrations begin.";
	}
    else{
        echo "No month! What happened!";
    }
    echo "<br><br>";

#Part 2
echo "<u>Part 2</u><br><br>";
    #Make an associate array to reference temperatures as well dates
    $december_highs = array("12/1"=>45,"12/2"=>40,"12/3"=>39,"12/4"=>42,"12/5"=>44,"12/6"=>42,"12/7"=>43,"12/8"=>36,"12/9"=>28,"12/10"=>28,"12/11"=>35,"12/12"=>42,"12/13"=>33,"12/14"=>31,"12/15"=>19,"12/16"=>23,"12/17"=>58,"12/18"=>59,"12/19"=>27,"12/20"=>37,"12/21"=>38,"12/22"=>40,"12/23"=>41,"12/24"=>47,"12/25"=>40,"12/26"=>66,"12/27"=>65,"12/28"=>43,"12/29"=>41,"12/30"=>33,"12/31"=>43);
    $december_lows = array("12/1"=>38,"12/2"=>35,"12/3"=>37,"12/4"=>34,"12/5"=>33,"12/6"=>32,"12/7"=>36,"12/8"=>25,"12/9"=>23,"12/10"=>24,"12/11"=>24,"12/12"=>31,"12/13"=>27,"12/14"=>21,"12/15"=>8,"12/16"=>6,"12/17"=>25,"12/18"=>23,"12/19"=>18,"12/20"=>15,"12/21"=>27,"12/22"=>35,"12/23"=>31,"12/24"=>39,"12/25"=>33,"12/26"=>35,"12/27"=>37,"12/28"=>32,"12/29"=>34,"12/30"=>27,"12/31"=>25);

    echo "December's high average in 2016 was: ".round(array_sum($december_highs) / count($december_highs),2)."&deg<br>";
    echo "December's low average in 2016 was: ".round(array_sum($december_lows) / count($december_lows),2)."&deg<br><br>";
    
    #sort december high's by the key in reverse order
    arsort($december_highs);
    echo "Top five hottest high temperatures in December:<br>";
    #print the top 5 values
    #45 is the 6th highest temperature proven from returning the sorted array
    foreach($december_highs as $value => $key){
        if($key > 45)
            echo $value." - ".$key."&deg<br>";
    }
    echo "<br/>";
    
    #sort december lows's by the key
    asort($december_highs);
    #print the bottom 5 values
    #31 is the 6th lowest temperature proven from returning the sorted array
    echo "Top five coldest high temperatures in December:<br>";
    foreach($december_highs as $value => $key){
        if($key < 31)
            echo $value." - ".$key."&deg<br>";
    }
    echo "<br/>";

    #sort december high's by the key in reverse order
    arsort($december_lows);
    echo "Top five hottest low temperatures in December:<br>";
    #print the top 5 values
    #35 is the 6th highest temperature proven from returning the sorted array
    foreach($december_lows as $value => $key){
        if($key > 35)
            echo $value." - ".$key."&deg<br>";
    }
    echo "<br/>";
    
    #sort december lows's by the key
    asort($december_lows);
    echo "Top five coldest low temperatures in December:<br>";
    #print the bottom 5 values
    #23 is the 6th lowest temperature proven from returning the sorted array
    foreach($december_lows as $value => $key){
        if($key < 23)
            echo $value." - ".$key."&deg<br>";
    }
?>