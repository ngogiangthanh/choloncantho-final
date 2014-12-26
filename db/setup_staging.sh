mysqladmin -u root drop -f  oc_gomarket
mysqladmin -u root create  oc_gomarket
mysql -u root  oc_gomarket < 1_schema.sql
mysql -u root  oc_gomarket < 2_init_data.sql