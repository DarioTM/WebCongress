create database congreso default character set utf8 collate utf8_unicode_ci;

create user user@localhost identified with mysql_native_password by 'user';


grant all on congreso.* to user@localhost;                                                                                                                                                     


flush privileges;



