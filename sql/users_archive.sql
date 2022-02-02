create table users_archive
(
    id       serial
        constraint users_archive_pk
            primary key,
    user_id  integer                             not null
        constraint users_archive_users_id_fk
            references users,
    username varchar(255)                        not null,
    email    varchar(255)                        not null,
    password varchar(255)                        not null,
    action   varchar(1)                          not null,
    ts       timestamp default CURRENT_TIMESTAMP not null
);

create unique index users_archive_id_uindex
    on users_archive (id);

