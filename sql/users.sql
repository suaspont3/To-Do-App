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

