#
# Add SQL definition of database tables
#
CREATE TABLE pages (
    tx_page_overview_img int(11) unsigned DEFAULT '0' NOT NULL,
    tx_page_overview_desc text,
    tx_page_overview_exclude tinyint(1) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tt_content (
    tx_page_overview_root int(11) DEFAULT '0' NOT NULL
);
