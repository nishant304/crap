<script>
$( document ).ready(function() {
    'use strict';



    var axisY = [ "ANKIT", "PANKAJ", "SACHIN", "PIYUSH", "Milk", "Potato"];
    var axisX = ["10%", "20%", "30%", "40%", "50%", "60%", "70%", "80%", "90%", "100%"];
    var barsValue = [64, 61, 93, 76, 5, 13];

    // Data to charts
    var data = {
       "axisY": axisY,         // Data for axis Y labels
       "axisX": axisX,         // Data for axis X labels
       "bars": barsValue       // Data for bars value
    };

    // My options
    var options = {
        data: data,
        showValues: true,
        showHorizontalLines: true,
        animation: true,
        animationOffset: 0,
        labelsAboveBars: true
    };

    var options2 = {
        data: data,
        showValues: true,
        showHorizontalLines: true,
        animation: true,
        animationOffset: 0,
        animationRepeat: false,
        showArrows: false,
        labelsAboveBars: false
    };

    var chart = $('#chart-1').rumcaJS(options2);
    var chart2 = $('#chart-2').rumcaJS(options);

    chart2.sortByValue();

    console.log('%c Hello RumcaJS ' , 'font-size:24px; background: #000; color: #fff');
                                   // Animation trigger.
  
});
</script>