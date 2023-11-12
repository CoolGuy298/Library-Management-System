
create table IF NOT EXISTS book (
 id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  author varchar(255)  NOT NULL,
  genre varchar(255)  NOT NULL,
  
  total_copies int(11) NOT NULL,
    PRIMARY KEY (id)
) ;

