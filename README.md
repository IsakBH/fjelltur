> [!Important]
> Dette er teknisk sett ment som en skoleoppgave, men det er faktisk noe jeg har tenkt til å bruke i fritiden så det kommer nok til å få oppdateringer etter innlevering også.

> [!Note]
> Til Hilde:
> Databasefilen (mysql .sql fil) ligger i storage/database/fjell.sql.

# Bilde av databasemodellen fra MySQL Workbench
**Endringer jeg har gjort etter dette diagrammet ble tegnet:**
* *Beskrivelse* kolonnen i fjelltur tabellen er nå en varchar og ikke en int - gjorde en liten feil når jeg først satt det opp
* Utvidet *beskrivelse* kolonnen i fjell tabellen til å være 250 chars lang istedet for 120 - ble litt knapt med kun 120 chars

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
## Inserte nye fjellturer inn i databasen - med turen jeg var på med Andreas og Ivan den 21. mars som eksempel
```sql
insert into fjelltur (navn, beskrivelse, dato, person, fjell) values (
    "Lyderhorn med Ivan og Andreas",
    "Gikk opp Lyderhorn sammen med Ivan og Andreas. Var egentlig planlagt at vi skulle være flere, men de andre ditchet oss. Disse folkene var da Konrad, Viggo, Mats og Tobias Helgøy. :(",
    "2026-03-21",
    (select id from person where brukernavn = 'Isak'),
    (select id from fjell where navn = 'Lyderhorn')
);
```

**Fine ressurser:**
* [W3Schools SQL Insert Into Select](https://www.w3schools.com/SQL/sql_insert_into_select.asp)

## Min KI bruk i dette prosjektet
Jeg skriver her hva jeg har brukt av KI for å hjelpe meg å svare på oppgaven. Jeg har ikke, og kommer ikke til å bruke KI til å skrive kode for meg, da jeg føler at dette ikke er en særlig smart måte å gjøre ting på. Du får ingen erfaring i å faktisk skrive ting selv, og du får ikke den samme 'dopamin hitten' du får når ting du har skrevet selv funker. **Men, vær så snill les chattene - jeg brukte lang tid på de jævla promptene 😭**
* Jeg spurte Gemini hva den synes om å lagre bilder som BLOBs i databasen vs. å lagre dem som filer og ha filepaths i databasen. Bestemte meg for å spørre KI om hva den synes etter jeg hadde spurt både Hilde, min far og vært lenge inne på mange forskjellige innlegg på StackOverflow og Reddit. [Link til chat](https://gemini.google.com/share/d3f6ee9c7e54)
* Jeg spurte Gemini hva den synes om filstrukturen min, og ga den mine meninger og argumenter for det jeg allerede hadde for å prøve å få mer ordentlig informasjon. [Les chatten.](https://gemini.google.com/share/4dbcfb0669d4)
