UPDATE `res_user` SET `password` = md5('demo123'), `username`='demo', `email`='demo@opencart.com' WHERE `res_user`.`user_id`=1;