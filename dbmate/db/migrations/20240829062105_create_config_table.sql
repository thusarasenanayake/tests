-- migrate:up
create table configs (
  id int,
  name varchar(100)
);

-- migrate:down
drop table configs;
