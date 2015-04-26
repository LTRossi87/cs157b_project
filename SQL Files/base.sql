SELECT `Store`.city, `Product`.category, `Time`.week_number_in_year, sum(dollar_sales) 
FROM 
  Grocery.`Sales_Fact`,
  Grocery.`Product`,
  Grocery.`Store`,
  Grocery.`Promotion`,
  Grocery.`Time`
where
  `Sales_Fact`.product_key = `Product`.product_key and
  `Sales_Fact`.store_key = `Store`.store_key and
  `Sales_Fact`.promotion_key = `Promotion`.promotion_key and
  `Sales_Fact`.time_key = `Time`.time_key
group by
 `Store`.city, `Product`.category, `Time`.week_number_in_year;