/*ramensデータベース作成*/
create database character set utf8

/*mapテーブル作成*/
CREATE TABLE map(
id integer(8)PRIMARY KEY AUTO_INCREMENT,
latitude float(10) NOT NULL,
longitude float(10) NOT NULL,
shopname varchar (500) NOT NULL,
link varchar(500) NOT NULL
)ENGINE=InnoDB;

/*commentsテーブル作成*/
CREATE TABLE comments(
id integer(8)PRIMARY KEY AUTO_INCREMENT,
name varchar(20) NOT NULL,
comment text(140) NOT NULL,
shopid integer (8) NOT NULL,
FOREIGN KEY(shopid)
REFERENCES map(id)
)ENGINE=InnoDB;

/*mapデータ挿入*/
INSERT INTO map VALUES(
'',35.694133, 140.024925,'旭川ラーメン好','http://tabelog.com/chiba/A1202/A120204/12000287/'
),(
'',35.693731, 140.022138,'九州らーめん','http://tabelog.com/chiba/A1202/A120204/12023783/'
),(
'',35.692956, 140.023211,'九十九とんこつラーメン','http://tabelog.com/chiba/A1202/A120204/12000518/'
),(
'',35.690736, 140.021729,'健勝軒','http://tabelog.com/chiba/A1202/A120204/12031424/'
),(
'',35.684617, 140.022196,'栄昇らーめん','http://tabelog.com/chiba/A1202/A120204/12001613/'
),(
'',35.695114, 140.010938,'ラーメン魁力屋','http://tabelog.com/chiba/A1202/A120204/12024446/'
),(
'',35.694207, 140.023454,'魚骨ラーメン 鈴木さん','http://tabelog.com/chiba/A1202/A120201/12023248/'
),(
'',35.689588, 140.015683,'ばんから','http://tabelog.com/chiba/A1202/A120204/12031773/'
),(
'',35.692289, 140.021112,'裏 我馬ラーメン','http://tabelog.com/chiba/A1202/A120201/12007485/'
),(
'',35.697045, 140.020844,'ここー','http://tabelog.com/chiba/A1202/A120201/12023381/'
),(
'',35.690659, 140.022531,'我馬らーめん','http://tabelog.com/chiba/A1202/A120204/12001618/'
),(
'',35.690777, 140.027736,'幸楽苑','http://tabelog.com/chiba/A1202/A120204/12030219/'
),(
'',35.687365, 140.020033,'必勝軒','http://tabelog.com/chiba/A1202/A120204/12000158/'
),(
'',35.693150, 140.021388,'親父の塩','http://tabelog.com/chiba/A1202/A120201/12033438/'
),(
'',35.693523, 140.021190,'なりたけ','http://tabelog.com/chiba/A1202/A120201/12000153/'
),(
'',35.689948, 140.019350,'ひよこ屋','http://tabelog.com/chiba/A1202/A120204/12030276/'
),(
'',35.692893, 140.019056,'ラーメン無限大','http://tabelog.com/chiba/A1202/A120201/12003781/s'
),(
'',35.687606, 140.029650,'恵比寿一代','http://tabelog.com/chiba/A1202/A120204/12005572/'
),(
'',35.691484, 140.020418,'SLつけ麺','http://tabelog.com/chiba/A1202/A120204/12003611/'
),(
'',35.683110, 140.026212,'日高屋','http://tabelog.com/chiba/A1202/A120201/12021940/'
),(
'',35.689965, 140.023609,'平和軒','http://tabelog.com/chiba/A1202/A120204/12009767/'
),(
'',35.692625, 140.021626,'日高屋','http://tabelog.com/chiba/A1202/A120201/12021940/'
),(
'',35.693655, 140.021878,'手打ちらーめん福一','http://tabelog.com/chiba/A1202/A120201/12023226/'
);


