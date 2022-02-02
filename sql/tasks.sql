create table tasks
(
    id      serial
        constraint tasks_pk
            primary key,
    user_id integer      not null,
    content varchar(255) not null
);

create unique index tasks_id_uindex
    on tasks (id);

insert into tasks (user_id, content)
values (1, 'Ban example1');

insert into tasks (user_id, content)
values (2, 'Buy something tasty');

insert into tasks (user_id, content)
values (2, 'Finish project');