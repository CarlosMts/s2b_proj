jQuery(document).ready(function($){
    //variables
    var $window = $(window);
    var $container = $("#reserve-box");
    var $main = $("#space-container");
    var window_min = 0;
    var window_max = 0;
    var threshold_offset = 50;
    /*
     set the container's maximum and minimum limits as well as movement thresholds
    */

    function set_limits(){
        //max and min container movements
        var max_move = $main.offset().top + $main.height() - $container.height() - 2*parseInt($container.css("top") );
        var min_move = $main.offset().top;
        //save them
        $container.attr("data-min", min_move).attr("data-max",max_move);
        //window thresholds so the movement isn't called when its not needed!
        //you may wish to adjust the freshhold offset
        window_min = min_move - threshold_offset;
        window_max = max_move + $container.height() + threshold_offset;
    }
    //sets the limits for the first load
    set_limits();
    
    function window_scroll(){
        //if the window is within the threshold, begin movements
        //alert("Window scroll top: " + $window.scrollTop() + " |  >= " + window_min + " ?? && < " + window_max + " ??");
        if( $window.scrollTop() >= window_min && $window.scrollTop() < window_max ){
            //reset the limits (optional)
            set_limits();
            //move the container
            container_move();
        }
    }
    

    document.addEventListener('scroll', function(e) {
        window_scroll();
    }, true);
    
    /**
     * Handles moving the container if needed.
    **/
    function container_move(){
        var wst = $window.scrollTop();
        //if the window scroll is within the min and max (the container will be "sticky";
        if( wst >= $container.attr("data-min") && wst <= $container.attr("data-max") ){
            //work out the margin offset
            var margin_top = $window.scrollTop() - $container.attr("data-min");
            //margin it down!
            $container.css("margin-top", margin_top);
        //if the window scroll is below the minimum 
        }else if( wst <= $container.attr("data-min") ){
            //fix the container to the top.
            $container.css("margin-top",0);
        //if the window scroll is above the maximum 
        }else if( wst > $container.attr("data-max") ){
            //fix the container to the top
            $container.css("margin-top", $container.attr("data-max")-$container.attr("data-min")+"px" );
        }
    }
    //do one container move on load
    container_move();
});