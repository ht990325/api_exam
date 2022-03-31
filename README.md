# API EXAMPLE
This is the test site of API.
I get data from https://remote.grwills.com.au/WebAPI/API/DB/CustomQuery?key=IWS_SalesOrders.

NOTE: Be careful with problems following.
1. Edit your php.ini file.
max_input_vars = 10000  // max_input_vars = 1000

// create new "Sale orders" table
CREATE TABLE Sale_orders (
    id  int, PK
    Code VARCHAR(255),
    Customer VARCHAR(255),
    Description VARCHAR(255),
    LineId int,
    OrdQty int,
    Picker VARCHAR(255),
    ProcessedDate datetime,
    Reference VARCHAR(255),
    SO VARCHAR(255),
    Shipday date,
    SortCodeDescription VARCHAR(255),
    createdby VARCHAR(255),
    value double,
);
