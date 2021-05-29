/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  28/05/2021 19:45:51                      */
/*==============================================================*/


drop table if exists Adminitrateur;

drop table if exists Agence;

drop table if exists Agent;

drop table if exists Client;

drop table if exists Compte;

drop table if exists SuperUser;

drop table if exists Virement;

/*==============================================================*/
/* Table : Adminitrateur                                        */
/*==============================================================*/
create table Adminitrateur
(
   idAdmn               varchar(254) not null,
   idSuperUser          varchar(254) not null,
   nom                  varchar(254),
   prenom               varchar(254),
   ddn                  datetime,
   email                varchar(254),
   sexe                 char(1),
   adresse              varchar(254),
   primary key (idAdmn),
   key AK_Identifiant_1 (idAdmn),
   key AK_Identifiant_2 (idAdmn)
);

/*==============================================================*/
/* Table : Agence                                               */
/*==============================================================*/
create table Agence
(
   idSuperUser          varchar(254) not null,
   idAgence             varchar(254) not null,
   idAdmn               varchar(254) not null,
   nomAgence            varchar(254),
   adresse              varchar(254),
   email                varchar(254),
   tel                  varchar(254),
   primary key (idSuperUser, idAgence)
);

/*==============================================================*/
/* Table : Agent                                                */
/*==============================================================*/
create table Agent
(
   idSuperUser          varchar(254) not null,
   idAgence             varchar(254) not null,
   idAdmn               varchar(254) not null,
   idAgent              varchar(254) not null,
   nom                  varchar(254),
   prenom               varchar(254),
   ddn                  varchar(254),
   email                varchar(254),
   sexe                 char(1),
   adresse              varchar(254),
   primary key (idSuperUser, idAgence, idAdmn, idAgent)
);

/*==============================================================*/
/* Table : Client                                               */
/*==============================================================*/
create table Client
(
   Age_idSuperUser      varchar(254) not null,
   Age_idAgence         varchar(254) not null,
   idAdmn               varchar(254) not null,
   idAgent              varchar(254) not null,
   idClient             varchar(254) not null,
   idSuperUser          varchar(254) not null,
   idAgence             varchar(254) not null,
   nom                  varchar(254),
   prenom               varchar(254),
   ddn                  varchar(254),
   email                varchar(254),
   sexe                 char(1),
   adresse              varchar(254),
   primary key (Age_idSuperUser, Age_idAgence, idAdmn, idAgent, idClient),
   key AK_Identifiant_1 (idClient)
);

/*==============================================================*/
/* Table : Compte                                               */
/*==============================================================*/
create table Compte
(
   idSuperUser          varchar(254) not null,
   idAgence             varchar(254) not null,
   Age_idSuperUser      varchar(254) not null,
   Age_idAgence         varchar(254) not null,
   Age_idAdmn           varchar(254) not null,
   idAgent              varchar(254) not null,
   numCompte            varchar(254) not null,
   idAdmn               varchar(254) not null,
   dateCreation         datetime,
   type                 varchar(254),
   primary key (idSuperUser, idAgence, Age_idSuperUser, Age_idAgence, Age_idAdmn, idAgent, numCompte)
);

/*==============================================================*/
/* Table : SuperUser                                            */
/*==============================================================*/
create table SuperUser
(
   idSuperUser          varchar(254) not null,
   nom                  varchar(254),
   prenom               varchar(254),
   ddn                  varchar(254),
   email                varchar(254),
   sexe                 char(1),
   adresse              varchar(254),
   primary key (idSuperUser),
   key AK_Identifiant_1 (idSuperUser)
);

/*==============================================================*/
/* Table : Virement                                             */
/*==============================================================*/
create table Virement
(
   idSuperUser          varchar(254) not null,
   idAgence             varchar(254) not null,
   idAdmn               varchar(254) not null,
   idAgent              varchar(254) not null,
   idVirement           varchar(254) not null,
   montant              bigint,
   date                 datetime,
   primary key (idSuperUser, idAgence, idAdmn, idAgent, idVirement),
   key AK_Identifiant_1 (idVirement)
);

alter table Adminitrateur add constraint FK_association9 foreign key (idSuperUser)
      references SuperUser (idSuperUser) on delete restrict on update restrict;

alter table Agence add constraint FK_association3 foreign key (idAdmn)
      references Adminitrateur (idAdmn) on delete restrict on update restrict;

alter table Agence add constraint FK_association4 foreign key (idSuperUser)
      references SuperUser (idSuperUser) on delete restrict on update restrict;

alter table Agent add constraint FK_association2 foreign key (idSuperUser, idAgence)
      references Agence (idSuperUser, idAgence) on delete restrict on update restrict;

alter table Agent add constraint FK_association8 foreign key (idAdmn)
      references Adminitrateur (idAdmn) on delete restrict on update restrict;

alter table Client add constraint FK_association10 foreign key (idSuperUser, idAgence)
      references Agence (idSuperUser, idAgence) on delete restrict on update restrict;

alter table Client add constraint FK_association5 foreign key (Age_idSuperUser, Age_idAgence, idAdmn, idAgent)
      references Agent (idSuperUser, idAgence, idAdmn, idAgent) on delete restrict on update restrict;

alter table Compte add constraint FK_association1 foreign key (idSuperUser, idAgence)
      references Agence (idSuperUser, idAgence) on delete restrict on update restrict;

alter table Compte add constraint FK_association11 foreign key (idAdmn)
      references Adminitrateur (idAdmn) on delete restrict on update restrict;

alter table Compte add constraint FK_association7 foreign key (Age_idSuperUser, Age_idAgence, Age_idAdmn, idAgent)
      references Agent (idSuperUser, idAgence, idAdmn, idAgent) on delete restrict on update restrict;

alter table Virement add constraint FK_association6 foreign key (idSuperUser, idAgence, idAdmn, idAgent)
      references Agent (idSuperUser, idAgence, idAdmn, idAgent) on delete restrict on update restrict;

