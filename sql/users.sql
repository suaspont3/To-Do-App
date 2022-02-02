create table users
(
    id         serial
        constraint users_pk
            primary key,
    group_id   integer                             not null
        constraint users_groups_id_fk
            references groups
            on update cascade on delete cascade,
    username   varchar(255)                        not null,
    email      varchar(255)                        not null,
    password   varchar(255)                        not null,
    created_at timestamp default CURRENT_TIMESTAMP not null
);

create unique index users_id_uindex
    on users (id);

insert into users (group_id, username, email, password)
values (1, 'admin', 'admin@gmail.com', '$2y$10$oYERIH6n2H8gzboKiyWKkelmaXNJ3bko0o0EvvTILMVW3L6ykwAwq');

insert into users (group_id, username, email, password)
values (2, 'example1', 'test@gmail.com', '$2y$10$xQmpr7o0MGjWqsJyj.6D6.pL2jk6SYApf0ZMR.CqwhaT9rRT7zKQK');

insert into users (group_id, username, email, password)
values (2, 'example2', 'email@gmail.com', '$2y$10$xUmnLmsPa7p9eQW4UUOb5uyewZ94lv4cj9lMR/cI83JzaLNvrzZOW');