> [!Important]
> Dette er teknisk sett ment som en skoleoppgave, men det er faktisk noe jeg har tenkt til å bruke i fritiden så det kommer nok til å få oppdateringer etter innlevering også.

> [!Note]
> Til Hilde:
> Databasefilen (mysql .sql fil) ligger i storage/database/fjell.sql.

# Bilde av databasemodellen fra MySQL Workbench
<img width="1089" height="576" alt="image" src="https://github.com/user-attachments/assets/02d5a82b-e447-4f5d-b11d-c5e9e67514e6" />

Her er noen SQL queries jeg kan kopiere for å gjøre det enklere for meg selv. Slipper å skrive dem 8000 ganger:
## Inserte nye fjell inn i databasen - med Lyderhorn som eksempel
```sql
insert into fjell (navn, hoyde, beskrivelse, fotografi, region) values (
    "Lyderhorn",
    "396",
    "Lyderhorn er et av de syv byfjellene i Bergen, og ligger rundt 5km vest for sentrum i Loddefjord.",
    "lyderhorn.jpg",
    (select id from omrade where navn = 'Bergensfjellene')
);
```
**Fine ressurser:**
* [W3Schools SQL Insert Into Select](https://www.w3schools.com/SQL/sql_insert_into_select.asp)
