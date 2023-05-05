insert sessions (username, password) values ('admin','admin');
insert employees (first_name,last_name,email ,date_of_birth,date_of_hire,supervisor_id, session_id, fired) 
values ('Ricardo', 'Garriga-Ramos', 'garrigaram@vcu.edu', '2002-09-11', curDate(), null, 1, false);
insert admins (employee_id) value (1);

drop function if exists is_session;
delimiter // 
create function is_session (p_user varchar(255),p_pass varchar(255)) 
returns boolean
begin

declare is_true boolean;
declare v_id int;
set is_true = false;


select session_id into v_id
from sessions
where username like p_user and password like p_pass;

if (v_id is not null) then
    set is_true = true;
end if;


return is_true;

end//
delimiter ;


drop function if exists get_session_id
delimiter // 
create function get_session_id (p_user varchar(255),p_pass varchar(255)) 
returns int
begin

declare v_session_id int;

select session_id into v_session_id
from sessions
where username like p_user and  password like p_pass;


return v_session_id;

end//
delimiter ;










drop function if exists session_is_employee;
delimiter // 
create function session_is_employee (p_ses_id int) 
returns boolean
begin

declare is_employee boolean;
declare v_id int;
set is_employee = false;


select employee_id into v_id
from sessions join employees using (session_id)
where session_id = p_ses_id;


if (v_id is not null) then
    set is_employee = true;
end if;

return is_employee;

end//
delimiter ;










drop function if exists session_is_admin;
delimiter // 
create function session_is_admin (p_ses_id int) 
returns boolean
begin

declare is_admin boolean;
declare v_id int;
set is_admin = false;


select admin_id into v_id
from sessions join employees using (session_id)
join admins using (employee_id)
where session_id = p_ses_id;


if (v_id is not null) then
    set is_admin = true;
end if;

return is_admin;

end//
delimiter ;


drop function if exists get_num_following;
delimiter // 
create function get_num_following (p_user_id int) 
returns int
begin

declare v_fing_count int;

select count(*) into v_fing_count
from users join followers using(user_id)
where user_id = p_user_id;

return v_fing_count;

end//
delimiter ;



drop function if exists get_num_followers;
delimiter // 
create function get_num_followers (p_user_id int) 
returns int
begin

declare v_fer_count int;

select count(*) into v_fer_count
from creators join followers using(creator_id)
where creator_id = p_user_id;

return v_fer_count;


end//
delimiter ;



drop view if exists user_profile;
create view user_profile
(username, email, following, is_active)
as
select username, email, get_num_following(user_id), active
from users join sessions using (session_id)
where deleted = 0;


drop view if exists 


