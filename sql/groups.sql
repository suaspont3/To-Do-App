create table groups
(
    id    serial
        constraint groups_pk
            primary key,
    title varchar(100) not null
);

create unique index groups_id_uindex
    on groups (id);

insert into groups (id, title)
values (1, 'admin');

insert into groups (id, title)
values (2, 'default');