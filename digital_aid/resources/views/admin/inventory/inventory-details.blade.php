 
<head>
 
   <!-- // Adding ej2.min.js CDN link -->
    <script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js" type="text/javascript"></script>
   <!-- // Adding bar.js script file -->
    <!-- <script src="bar.js" type="text/javascript"></script> -->
</head>
<body>
    <!-- // Chart container -->
    <div id="container_bar"></div>
</body>

<script>
var chart = new ej.charts.Chart({
    //Initializing Primary X Axis
    primaryXAxis: {
        valueType: "Category",
        title: "Items"
    },
    //Initializing Primary Y Axis
    primaryYAxis: {
        title: "Quantity"
    },
    //Initializing Chart Series
    series: [
        {
            type: "Bar",
            dataSource: [
                <?php
			foreach($inventory as $inv){
                echo "{ quantity: {$inv->quantity}, items: '{$inv->name}'},";
            }
			?>
            ],
            xName: "items",
            yName: "quantity"
        }
    ]
});
chart.appendTo("#container_bar");



</script>