# mini project

mini-project creates a dynamic user entry form in object orientated PHP (version 5), Code-igniter MVC (http://codeigniter.com/), JQuery and mySQL (version 5).

The database should have the following tables.
 
Tables :
<table name = standard_user_fields>
      <field name =field_id type = INT db=PK>
      <field name =status type = INT/ENUM values =(0 inactive, 1 active)>
      <field name =description type =VARCHAR(20)>
      <field name =field_type type =VARCHAR(20) values=(Numeric,  String,Date) )
      <field name =mandatory type = INT/ENUM values =(0 not required,1 required)> </table >
 
<table name = user_details>
      <field name =user_id type = INT >
      <field name =field_id type = INT >
      <field name =value type =VARCHAR(200)> </table >

The task is to create 2 PHP forms
1. A form to set-up the standard_user_fields values including edit, delete and add functions
    (use a student example and provide Name, Address, Date-of birth,  Cell number as a minimum set) 
2. A form to review and edit students details based on the active standard_user_fields with mandatory rules enforced
