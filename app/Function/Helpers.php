<?php

class Helpers
{
    public static function hello_world()
    {
        return 'Hello World';
    }   
    public static function Material_colors($data){
        if ($data == 0) return "rgba(3, 169, 244, 0.3)";
        if ($data == 1) return "rgba(244, 67, 54, 0.3)";
        if ($data == 2) return "rgba(233, 30, 99, 0.3)";
        if ($data == 3) return "rgba(156, 39, 176, 0.3)";
        if ($data == 4) return "rgba(63, 81, 181, 0.3)";
        if ($data == 5) return "rgba(0, 188, 212, 0.3)";
        if ($data == 6) return "rgba(0, 150, 136, 0.3)";
        if ($data == 7) return "rgba(76, 175, 80, 0.3)";
        if ($data == 8) return "rgba(205, 220, 57, 0.3)";
        if ($data == 9) return "rgba(255, 235, 59, 0.3)";
        if ($data == 10) return "rgba(255, 152, 0, 0.3)";
        if ($data == 11) return "rgba(121, 85, 72, 0.3)";
        if ($data == 12) return "rgba(158, 158, 158, 0.3)";
        if ($data == 13) return "rgba(96, 125, 139, 0.3)";
        if ($data == 14) return "rgba(0, 0, 0, 0.3)";
        if ($data == 15) return "rgba(62, 69, 81, 0.3)";
        if ($data == 16) return "rgba(3, 169, 244, 0.7)";
        if ($data == 17) return "rgba(244, 67, 54, 0.7)";
        if ($data == 18) return "rgba(233, 30, 99, 0.7)";
        if ($data == 19) return "rgba(156, 39, 176, 0.7)";
        if ($data == 20) return "rgba(63, 81, 181, 0.7)";
        if ($data == 21) return "rgba(0, 188, 212, 0.7)";
        if ($data == 22) return "rgba(0, 150, 136, 0.7)";
        if ($data == 23) return "rgba(76, 175, 80, 0.7)";
        if ($data == 24) return "rgba(205, 220, 57, 0.7)";
        if ($data == 25) return "rgba(255, 235, 59, 0.7)";
        if ($data == 26) return "rgba(255, 152, 0, 0.7)";
        if ($data == 27) return "rgba(121, 85, 72, 0.7)";
        if ($data == 28) return "rgba(158, 158, 158, 0.7)";
        if ($data == 29) return "rgba(96, 125, 139, 0.7)";
        if ($data == 30) return "rgba(0, 0, 0, 0.7)";
        if ($data == 31) return "rgba(62, 69, 81, 0.7)";
    }
    public static function Chart_js($data)
    {
        foreach ($data as $key => $value) {
            $label[] = $value->name;
            $aggregate[] = $value->aggregate;
        }
        return json_encode(array(
            'data'=>array(
                "labels"=>$label,
                "datasets"=>array(
                        array("data"=>$aggregate),
                    )
                ),
            ),JSON_NUMERIC_CHECK);   
    }   
    public static function Chart_js_multiaxis_bymonth($label,$data)
    {
        $array = array_reduce($data, function ($a, $b) {$a[$b->name][] = $b;return $a;});
            foreach ( $array as $key => $value ) {
                foreach ( $value as $object ) 
                    $datareduce[$key][]= array(
                        'dates'=>$object->dates,
                        'in'=>$object->in,
                        'out'=>$object->out
                );
            }

            $validlabel = json_decode(json_encode($label), true);

            $datafinal = array();
            foreach ($datareduce as $key => $value) {
                foreach ($validlabel as $bkey => $bvalue) {
                    if (($dkey = array_search($bvalue['dates'], array_column($value, 'dates'))) !== false) {
                        $datafinal[$key][$bkey] = $value[$dkey];
                    }
                    else {
                        $datafinal[$key][$bkey] = $bvalue;
                    }
                }
            }
            return json_encode($datafinal,JSON_NUMERIC_CHECK);
    }
}