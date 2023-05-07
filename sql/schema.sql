create table sessions(
    session_id int primary key AUTO_INCREMENT,
    username varchar(255) not null unique,
    password varchar(255) not null
);

Create table employees(
    employee_id int primary key AUTO_INCREMENT,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    email varchar(255),
    date_of_birth date not null,
    date_of_hire date not null,
    supervisor_id int,
    session_id int,
    foreign key(supervisor_id) references employees(employee_id),
    foreign key(session_id) references sessions(session_id),
    fired boolean not null
);

Create table admins(
    admin_id int primary key AUTO_INCREMENT,
    employee_id int not null, 
    foreign key(employee_id) references employees(employee_id) 
);

Create table users(
    user_id int primary key AUTO_INCREMENT,
    email varchar(255) not null unique,
    session_id int not null,
    date_of_creation date not null,
    active boolean not null,
    deleted boolean not null,
    foreign key(session_id) references sessions(session_id)
);

Create table platform_bans(
    admin_id int, 
    foreign key(admin_id) references admins(admin_id),
    user_id int, 
    foreign key(user_id) references users(user_id),
    violation varchar(255) not null,
    time_of_ban datetime not null,
    expired boolean not null,
    primary key(admin_id,user_id)
);

Create table projects(
    project_id int primary key AUTO_INCREMENT,
    project_name varchar(255) not null,
    project_start_date date not null,
    git_link varchar(255) not null unique,
    project_lead int
);

Create table programmers(
    programmer_id int primary key AUTO_INCREMENT,
    employee_id int not null,
    foreign key(employee_id) references employees(employee_id),
    specalization varchar(255) not null,
    project_id int, 
    foreign key(project_id) references projects(project_id)

);

alter table projects add(constraint foreign key(project_lead) references programmers(programmer_id));


Create table platforms(
    platform_id int AUTO_INCREMENT,
    user_id int, 
    foreign key(user_id) references users(user_id),
    username varchar(255) not null,
    password varchar(255) not null,
    primary key(platform_id,user_id)
);

Create table creators(
    creator_id int primary key AUTO_INCREMENT,
    user_id int not null,
    foreign key(user_id) references users(user_id)
);

Create table chatrooms(
    chatroom_id int primary key AUTO_INCREMENT,
    creator_id int not null,
    foreign key(creator_id) references creators(creator_id),
    name varchar(255) not null
);

Create table moderators(
    moderator_id int primary key AUTO_INCREMENT,
    chatroom_id int not null,
    foreign key(chatroom_id) references chatrooms(chatroom_id),
    user_id int not null,
    foreign key(user_id) references users(user_id)
);

Create table chatroom_bans(
    moderator_id int, 
    foreign key(moderator_id) references moderators(moderator_id),
    user_id int, 
    foreign key(user_id) references users(user_id),
    violation varchar(255),
    time_of_ban datetime not null,
    expired boolean not null,
    primary key (moderator_id,user_id)
);

Create table chats(
    session_id int, 
    foreign key(session_id) references sessions(session_id),
    chatroom_id int, 
    foreign key(chatroom_id) references chatrooms(chatroom_id),
    time_sent datetime,
    content varchar(255) not null,
    primary key(session_id,chatroom_id,time_sent)
);

Create table followers(
    user_id int not null,
    foreign key(user_id) references users(user_id),
    creator_id int not null,
    foreign key(creator_id) references creators(creator_id),
    primary key(user_id,creator_id)

);

Create table content(
    content_id int primary key AUTO_INCREMENT,
    content_type varchar(255) not null,
    content_link varchar(255) not null unique,
    creator_id int not null,
    foreign key(creator_id) references creators(creator_id)
);

Create table mercandise(
    mercandise_id int primary key AUTO_INCREMENT,
    name varchar(255) not null,
    price decimal(10,2) not null,
    stock int not null,
    sales int not null,
    remaining int not null,
    creator_id int not null,
    foreign key(creator_id) references creators(creator_id)
);

Create table mercandise_receipts(
    mercandise_id int, 
    foreign key(mercandise_id) references mercandise(mercandise_id),
    user_id int, 
    foreign key(user_id) references users(user_id),
    date_of_purchase date not null,
    shipping_address varchar(255) not null,
    primary key (mercandise_id, user_id)
);

Create table subscriptions(
    subscription_id int AUTO_INCREMENT,
    creator_id int, 
    foreign key(creator_id) references creators(creator_id),
    name varchar(255),
    price decimal(10,2) not null,
    length int,
    primary key (subscription_id)
);

Create table subscription_reciepts(
    subscription_id int, 
    foreign key(subscription_id) references subscriptions(subscription_id),
    user_id int, 
    foreign key(user_id) references users(user_id),
    date_of_purchase date not null,
    expiraion_date date,
    primary key (subscription_id, user_id)
);


insert sessions (username, password) values ('admin','admin');
insert employees (first_name,last_name,email ,date_of_birth,date_of_hire,supervisor_id, session_id, fired) 
values ('Ricardo', 'Garriga-Ramos', 'garrigaram@vcu.edu', '2002-09-11', curDate(), null, 1, false);
insert admins (employee_id) value (1);