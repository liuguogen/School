create table sdb_school_type (
	school_id int(10) unsigned not null key auto_increment,
	school_name varchar(50) not null comment '学校名称',
	school_logo varchar(100) not null comment '学校logo',
	create_time int(10) not null comment '创建时间',
	tuition int(10) default 0 comment '学费',
	accomm int(10) default 0 comment '住宿费',
	order_by int(10) default 0 comment '排序'
)engine=innodb default charset=utf8;