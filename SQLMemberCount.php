<?php

//create table [Group] ( groupid int, groupname varchar(50) )
//
//insert into [Group] ( groupid, groupname ) values ( 1, 'ABC' )
//insert into [Group] ( groupid, groupname ) values ( 2, 'DEF' )
//
//create table group_student ( groupid int, studentid int )
//
//insert into group_student ( groupid, studentid ) values ( 1, 2  )
//insert into group_student ( groupid, studentid ) values ( 1, 3  )
//insert into group_student ( groupid, studentid ) values ( 2, 4  )


//SELECT GroupName, Group.GroupID, COUNT(StudentId) AS MemberCount
//FROM Group
//INNER JOIN Group_Student ON Group.GroupID = Group_Student.GroupID
//GROUP BY Group.GroupID