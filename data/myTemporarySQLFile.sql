-- PRAGMA foreign_keys=OFF;
-- BEGIN TRANSACTION;
CREATE TABLE oauth_access_tokens (
    access_token VARCHAR(40) NOT NULL,
    client_id VARCHAR(80) NOT NULL,
    user_id VARCHAR(255),
    expires TIMESTAMP NOT NULL,
    scope VARCHAR(2000),
    CONSTRAINT access_token_pk PRIMARY KEY (access_token)
);
INSERT INTO oauth_access_tokens VALUES('7656a5446044615d9f2782ba9228f9fe1198b89d','testclient','testuser','2014-04-07 16:01:01',NULL);
INSERT INTO oauth_access_tokens VALUES('c151a35e37813a8c46853aeda2dc52faf0416f58','testclient','testuser','2014-04-07 16:08:09',NULL);
INSERT INTO oauth_access_tokens VALUES('d72459660b1451c7f9c4392ffb13e69e3c5825a8','testclient','testuser','2014-04-07 16:12:12',NULL);
INSERT INTO oauth_access_tokens VALUES('b56807cbb54aa7c7307f4cbf6075d4fbaea19cfc','testclient','testuser','2014-04-07 16:15:46',NULL);
INSERT INTO oauth_access_tokens VALUES('c1b1f85647d3f47d2b37c032081a4c3f418eb233','testclient2','testuser','2014-04-07 16:18:03',NULL);
INSERT INTO oauth_access_tokens VALUES('2bc619c917797621565235dcf1498edc350795c1','testclient',NULL,'2018-08-25 15:56:04',NULL);
INSERT INTO oauth_access_tokens VALUES('54180b24012c6adad3dc8f2d45eec6d9addaf3aa','testclient',NULL,'2018-08-25 16:07:45',NULL);
INSERT INTO oauth_access_tokens VALUES('de933347ebb3afa949faac9c7b242c3691804663','testclient',NULL,'2018-08-25 16:15:24',NULL);
INSERT INTO oauth_access_tokens VALUES('27640b00f5df16b7e4c114f81aec564064302658','testclient',NULL,'2018-08-25 16:15:38',NULL);
INSERT INTO oauth_access_tokens VALUES('f7e8e021876713aed89defae3636925003f587f2','testclient2',NULL,'2018-08-25 16:31:52',NULL);
INSERT INTO oauth_access_tokens VALUES('3752b0e0088053fde49135877f44a70774219596','testclient2',NULL,'2018-08-25 16:34:52',NULL);
INSERT INTO oauth_access_tokens VALUES('368039beb44c7ad559b40f9fa7c18eb5c3f19ff3','testclient2','testuser','2018-08-26 02:40:42',NULL);
INSERT INTO oauth_access_tokens VALUES('1d60f51d5bb89e994610f726ca3bdf13901b5dcf','testclient2','testuser','2018-08-26 02:40:45',NULL);
INSERT INTO oauth_access_tokens VALUES('3e562d1fd293f0c13bfb25aa3c2ec27eeb4c2b8c','testclient2','testuser','2018-08-26 02:40:47',NULL);
INSERT INTO oauth_access_tokens VALUES('39a494e5e9c1d17f8f9d6c37c24aca7b2256c1d2','testclient2','testuser','2018-08-26 02:46:48',NULL);
INSERT INTO oauth_access_tokens VALUES('fd2bafaf5649443d2f13ab0085afd996bbde6536','testclient2','testuser','2018-08-26 02:46:58',NULL);
INSERT INTO oauth_access_tokens VALUES('8f0e6874b84256398c4a6f2686003ece4d5d73d6','testclient2','testuser','2018-08-26 02:48:58',NULL);
INSERT INTO oauth_access_tokens VALUES('df38ff135e33f0b33875b26067f3a64b4ac58834','testclient2','testuser','2018-08-26 02:52:04',NULL);
INSERT INTO oauth_access_tokens VALUES('886c8411cd2be183156986f556208fb786f08bfe','testclient2','testuser','2018-08-26 02:53:20',NULL);
INSERT INTO oauth_access_tokens VALUES('f19d8bb040b4ec04038384c5f4efc04f7d30da23','testclient2','testuser','2018-08-26 02:54:46',NULL);
INSERT INTO oauth_access_tokens VALUES('4624a981dd4c897af1a9a7ce3df789946e2669cc','testclient2','testuser','2018-08-26 02:55:06',NULL);
CREATE TABLE oauth_authorization_codes (
    authorization_code VARCHAR(40) NOT NULL,
    client_id VARCHAR(80) NOT NULL,
    user_id VARCHAR(255),
    redirect_uri VARCHAR(2000),
    expires TIMESTAMP NOT NULL,
    scope VARCHAR(2000), id_token VARCHAR(2000),
    CONSTRAINT auth_code_pk PRIMARY KEY (authorization_code)
);
INSERT INTO oauth_authorization_codes VALUES('2577ffb12d910815b5f086936a09d1373c61f573','testclient',NULL,'/oauth/receivecode','2018-08-25 14:50:22',NULL,NULL);
INSERT INTO oauth_authorization_codes VALUES('a1720f9e76babf78f876a46d5627a59c9be6d186','testclient',NULL,'/oauth/receivecode','2018-08-25 14:52:59',NULL,NULL);
CREATE TABLE oauth_refresh_tokens (
    refresh_token VARCHAR(40) NOT NULL,
    client_id VARCHAR(80) NOT NULL,
    user_id VARCHAR(255),
    expires TIMESTAMP NOT NULL,
    scope VARCHAR(2000),
    CONSTRAINT refresh_token_pk PRIMARY KEY (refresh_token)
);
INSERT INTO oauth_refresh_tokens VALUES('807ce6f9ee52c203f9ffa5580af04722323dc226','testclient','testuser','2014-04-21 15:01:02',NULL);
INSERT INTO oauth_refresh_tokens VALUES('7370cca45ced22de4f55fe76124362f25d061132','testclient','testuser','2014-04-21 15:08:09',NULL);
INSERT INTO oauth_refresh_tokens VALUES('e6a76adf2c3cae2fb4a61ae123630f1d89da1856','testclient','testuser','2014-04-21 15:12:12',NULL);
INSERT INTO oauth_refresh_tokens VALUES('0134ae16b2e99a8e80c4665fa0780d524def189e','testclient','testuser','2014-04-21 15:15:46',NULL);
INSERT INTO oauth_refresh_tokens VALUES('77396248fa2986cb1f2ea687de835e45c83c7706','testclient2','testuser','2014-04-21 15:18:03',NULL);
INSERT INTO oauth_refresh_tokens VALUES('cec6f95feab1bc7fece3d33f56e0519d9be4551c','testclient',NULL,'2018-09-08 14:56:04',NULL);
INSERT INTO oauth_refresh_tokens VALUES('ee518e485c65b698da0542d8d06fd0de1cf2b387','testclient2','testuser','2018-09-09 01:40:42',NULL);
INSERT INTO oauth_refresh_tokens VALUES('aa3329e3b0af475d533b47bad00e43177c50126a','testclient2','testuser','2018-09-09 01:40:45',NULL);
INSERT INTO oauth_refresh_tokens VALUES('cb210b531d4ec01891155d33628535ce67fa7ff9','testclient2','testuser','2018-09-09 01:40:47',NULL);
INSERT INTO oauth_refresh_tokens VALUES('efc66de304e39f58be5ccc4e62f90c455b6bf4de','testclient2','testuser','2018-09-09 01:46:48',NULL);
INSERT INTO oauth_refresh_tokens VALUES('29e534a282fcc9b5b81e6061b7025c76a5d98f7b','testclient2','testuser','2018-09-09 01:46:58',NULL);
INSERT INTO oauth_refresh_tokens VALUES('879d437cd6e175b946fc92d51818bfd0eee5e77f','testclient2','testuser','2018-09-09 01:48:58',NULL);
INSERT INTO oauth_refresh_tokens VALUES('8d1e1f921c08987791b8611cb2c03080859ad154','testclient2','testuser','2018-09-09 01:52:04',NULL);
INSERT INTO oauth_refresh_tokens VALUES('fd403ec260426a1417cf6d911c3e5895c814218b','testclient2','testuser','2018-09-09 01:53:20',NULL);
INSERT INTO oauth_refresh_tokens VALUES('93b54df7d19e7e4445eb0dc6d8199fe37637ba0e','testclient2','testuser','2018-09-09 01:54:46',NULL);
INSERT INTO oauth_refresh_tokens VALUES('2343a0e36044e23e02de821d36e54e959724b736','testclient2','testuser','2018-09-09 01:55:06',NULL);
CREATE TABLE oauth_users (
    username VARCHAR(255) NOT NULL,
    password VARCHAR(2000),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    CONSTRAINT username_pk PRIMARY KEY (username)
);
INSERT INTO oauth_users VALUES('testuser','$2y$10$5ICo6mbnWLsptjCZVfMu1e7p04FYpgiZydEG1KD4MI8Q2fcwuCu8e',NULL,NULL);
CREATE TABLE oauth_scopes (
    type VARCHAR(255) NOT NULL DEFAULT "supported",
    scope VARCHAR(2000),
    client_id VARCHAR (80)
, `is_default` TINYINT(1) NULL DEFAULT NULL);
CREATE TABLE oauth_jwt (
    client_id VARCHAR(80) NOT NULL,
    subject VARCHAR(80),
    public_key VARCHAR(2000),
    CONSTRAINT client_id_pk PRIMARY KEY (client_id)
);
CREATE TABLE oauth_clients (
  client_id varchar(80) PRIMARY KEY NOT NULL,
  client_secret varchar(80) NOT NULL,
  redirect_uri varchar(2000) NOT NULL,
  grant_types varchar(80),
  scope varchar(2000) DEFAULT NULL,
  user_id varchar(255) DEFAULT NULL
);
INSERT INTO oauth_clients VALUES('testclient','$2y$10$5ICo6mbnWLsptjCZVfMu1e7p04FYpgiZydEG1KD4MI8Q2fcwuCu8e','/oauth/receivecode',NULL,NULL,NULL);
INSERT INTO oauth_clients VALUES('testclient2','','/oauth/receivecode',NULL,NULL,NULL);
COMMIT;
