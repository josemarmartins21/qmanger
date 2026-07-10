select * from users ORDER BY id desc;
select * from permissoes;

select * from permissoes where 
is_master = true;
select * from permissoes where name = 'Luz Farrell' ORDER BY id desc;

select * from permissions;


select * from users where 
is_master = true;


-- ADMIN
select * from permissoes where permission_name = 'admin';

-- SUPER ADMIN
select * from permissoes where permission_name = 'super-admin';

-- DEFAULT
select * from permissoes where permission_name = 'default' and name = 'Prof. Kevin Crona Jr.';

create or replace view  permissoes as
select users.name, users.id, users.email, permissions.name as permission_name, users.is_master
from users JOIN permission_user on users.id = permission_user.user_id
JOIN permissions on permission_user.permission_id = permissions.id;

-- jM3AiwOqiJh7vxkw RxZzN1VTbgUzU35k
SELECT * from bairros;
SELECT * from contacts;
SELECT * from enderecos;
SELECT * from plans;


SELECT * from signatures;

TRUNCATE signatures;

DELETE from signatures
where account_id = 5;
SELECT * from signatures where account_id = 5;
SELECT * from accounts;
create or REPLACE view conta_contacto as SELECT accounts.name as conta, ct.first_name from contacts as ct join account_contact as ac 
on ac.contact_id = ct.id 
JOIN accounts
on accounts.id = ac.account_id
ORDER BY ac.id DESC;

SELECT * FROM account_contact;
SELECT * from log_dmls;
TRUNCATE signatures;

SELECT * from conta_contacto;

DELIMITER \\

create Procedure canecelSignature()
    BEGIN

    UPDATE signatures 
    SET status = 0 where status = 1 and end_date < CURRENT_DATE;

    END ;
DELIMITER ;

CALL `canecelSignature`;

DELIMITER \\

create EVENT ev_cancel_signature
on SCHEDULE EVERY 1 minute starts '2026-07-09 16:24:00'
do 
    begin

    call `canecelSignature`;

END ;
DELIMITER ; 


DELIMITER \\

create Procedure activeSignature()
begin
    UPDATE signatures
    set status = 1 where start_date = CURRENT_DATE;
end;
DELIMITER;

DELIMITER \\
create EVENT ev_active_signature
on schedule EVERY 1 day starts '2026-07-11 00:00:00'
do
    begin
        call `activeSignature`;
END;
DELIMITER ; 
