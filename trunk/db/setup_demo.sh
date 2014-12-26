mysqladmin -u root --password=giaiphapnhanh drop -f  opencart_gomarket
mysqladmin -u root --password=giaiphapnhanh create  opencart_gomarket
mysql -u root --password=giaiphapnhanh  opencart_gomarket < 1_schema.sql
mysql -u root --password=giaiphapnhanh  opencart_gomarket < 2_init_data.sql
mysql -u root --password=giaiphapnhanh  opencart_gomarket < 3_update_demo.sql