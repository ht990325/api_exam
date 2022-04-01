<html>

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<style>
.center {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    /* background: #000; */
}

.wave {
    width: 5px;
    height: 100px;
    background: linear-gradient(45deg, cyan, #fff);
    margin: 10px;
    animation: wave 1s linear infinite;
    border-radius: 20px;
}

.wave:nth-child(2) {
    animation-delay: 0.1s;
}

.wave:nth-child(3) {
    animation-delay: 0.2s;
}

.wave:nth-child(4) {
    animation-delay: 0.3s;
}

.wave:nth-child(5) {
    animation-delay: 0.4s;
}

.wave:nth-child(6) {
    animation-delay: 0.5s;
}

.wave:nth-child(7) {
    animation-delay: 0.6s;
}

.wave:nth-child(8) {
    animation-delay: 0.7s;
}

.wave:nth-child(9) {
    animation-delay: 0.8s;
}

.wave:nth-child(10) {
    animation-delay: 0.9s;
}

@keyframes wave {
    0% {
        transform: scale(0);
    }

    50% {
        transform: scale(1);
    }

    100% {
        transform: scale(0);
    }
}
</style>

<body>
    <div class="center" id="notice" style="display: none;">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div>Updating from https://remote.grwills.com.au/WebAPI/API/DB/CustomQuery?key=IWS_SalesOrders</div>
    </div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Code</th>
                <th>Customer</th>
                <th>Description</th>
                <th>LineId.</th>
                <th>OrdQty</th>
                <th>Picker</th>
                <th>ProcessedDate</th>
                <th>Reference</th>
                <th>SO</th>
                <th>Shipday</th>
                <th>SortCodeDescription</th>
                <th>createdby</th>
                <th>value</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Code</th>
                <th>Customer</th>
                <th>Description</th>
                <th>LineId.</th>
                <th>OrdQty</th>
                <th>Picker</th>
                <th>ProcessedDate</th>
                <th>Reference</th>
                <th>SO</th>
                <th>Shipday</th>
                <th>SortCodeDescription</th>
                <th>createdby</th>
                <th>value</th>
            </tr>
        </tfoot>
    </table>
</body>
<footer>
    <script>
    var column_setting = [{
            "data": "Code"
        },
        {
            "data": "Customer"
        },
        {
            "data": "Description"
        },
        {
            "data": "LineId"
        },
        {
            "data": "OrdQty"
        },
        {
            "data": "Picker"
        },
        {
            "data": "ProcessedDate"
        },
        {
            "data": "Reference"
        },
        {
            "data": "SO"
        },
        {
            "data": "Shipday"
        },
        {
            "data": "SortCodeDescription"
        },
        {
            "data": "createdby"
        },
        {
            "data": "value"
        },
    ];

    function load_records() {
        // $('#example').dataTable().fnClearTable();
        // $('#example').dataTable().fnAddData([]);
        $.ajax({
            url: "./ajax/load_records.php",
            method: "get",
            success: function(load_result) {
                var records = JSON.parse(load_result);
                console.log(records);
                if (records.length) {
                    $('#example').dataTable().fnClearTable();
                    $('#example').dataTable().fnAddData(records);
                }
            }
        });
    }

    function order_api(token_info) {
        token_info = JSON.parse(token_info);
        $('#notice').show();
        $.ajax({
            url: "./get_sale_orders.php",
            method: "post",
            data: {
                token_info: token_info,
            },
            success: function(response) {
                $('#notice').hide();
                if (response == "success") {
                    console.log("Loaded successfully.");
                    // alert("Loaded successfully.");
                } else {
                    console.log("some errors are caused");
                }
                load_records();
            }
        });
    }

    function get_access_token() {
        $.ajax({
            url: "./get_access_token.php",
            method: "post",
            success: function(token_info) {
                console.log(token_info);
                order_api(token_info);
            }
        });
    }

    $(document).ready(function() {
        $('#example').dataTable({
            "data": [],
            "columns": column_setting
        });

        load_records();
        get_access_token();
        setInterval(get_access_token, 60000);
    });
    </script>
</footer>

</html>