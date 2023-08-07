<?php


if(!function_exists('get_top_categories')){
   function get_top_categories(){
        $top_categories = DB::table('topcategory')->get();
        return $top_categories;
    }
}
if(!function_exists('get_main_categories')){
    function get_main_categories($top_id){
     //   $top_categories = DB::table('topcategory')->get();
        $data=[];
       // foreach($top_categories as $top){
            $main_cateogry = DB::table('maincategory')->where('topcat_id',$top_id)->get();
         //   array_push($data,$main_cateogry);
        //}
        return $main_cateogry;
    }



    }

    if(!function_exists('get_size')){
    function get_size(){
        $sizes = DB::table('size')->get();
    return $sizes;
}
    }

    if(!function_exists('get_height')){
        function get_height(){
            $height = DB::table('height')->get();
        return $height;
    }
        }
    if(!function_exists('get_type')){
            function get_type(){
                $type = DB::table('type')->get();
            return $type;
        }
            }
