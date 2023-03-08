<?php

function slugify($text, string $divider = '-')
{
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function fullname($lastName, $firstName, $middleName)
{
    $name = $lastName . ' ' . $firstName . ' ' . $middleName;
    
    return $name;
}

function remove($str)  
{
    $res = str_replace(array('"', '[', ']'), ' ',  $str);

    return $res;
}

function grade($num)
{
    if($num >= 0 && $num <=  35)
    {
        $grade = "F";
    }
    elseif($num >= 36 && $num <=  45)
    {
        $grade = "E";
    }
    elseif($num >= 46 && $num <=  55)
    {
        $grade = "D";
    }
    elseif($num >= 56 && $num <=  59)
    {
        $grade = "C";
    }
    else if($num >= 60 && $num <=  69)
    {
        $grade = "B";
    }
    else if($num >= 70 && $num <=  100)
    {
        $grade = "A";
    }
    else{
        $grade = "NULL";
    }

    return $grade;
}

function position($score, $total_scores = [])
{
    rsort($total_scores);

    $num = array_search($score, $total_scores);

    $num += 1;

    $format = new NumberFormatter('en_US', NumberFormatter::ORDINAL);

    $pos = $format->format($num);

    return $pos;
}

function superscript($word)
{
    if($word){
        $old_word = $word[1].$word[2];

        $old_word = "<sup>".$old_word."</sup>";

        $new_word = $word[0].''.$old_word;

        echo $new_word;
    }else {
        echo '0';
    }
}
