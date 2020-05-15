# TicketStocker

## Static
- Client: https://miha53cevic.github.io/TicketStocker/static/client.html
- Admin: https://miha53cevic.github.io/TicketStocker/static/admin.html

## Baza login
- Admin Account
    - username: admin
    - password: admin

- Default user account
    - username: user
    - password: user

## Feature list
### User Login
- Klik na TicketStocker vraća na index.php
- Search dava prijedloge ako postoje i do maks 4, za više prijedloga kliknuti More gumb
- Login: Provjera passworda i username-a, ako krivi nudi na signup i kaže pogrešku
- SignUp: Stvara novi "user" account kojemu je password sha1 hash spremljen u bazi
- Mogucnost brze navigacije na glavnoj stranici
- Mogucnost vracanja na vrh stranice preko strelice
- Polje Newly added dodaje do 6 zadnje dodanih karta
- Popular radi SQL pretragu koje su maks 3 karte najviše kupovane i predstavlja ih
- On sale stavlja karte koje imaju sniženja (sniženja određuje admin)
- Na ticket_info.php korisnik bira vrijeme i mjesto (ako postoji za tu kartu), također se prikazuje i cijena i ako ta karta ima sniženje se prikazuje nova i stara cijena
### Admin Login
- Mogucnost dodavanja karata
- Slike moraju biti *.jpeg formata
- Red i stupac mjesta se može staviti na 0 pa to znaci da nema sjedala za tu kartu i ne prikazuje se mogucnost biranja mjesta
- Vrijeme se mora odabrati samo jedno ako se druga ostave prazna ne nude se kupcu
- Sniženje određuje također admin ako stavi 0 nema sniženja
- Mijenjaje karte mora se znati tocno ime karte
- Mjenjati se moze i dodavati svako polje karte i na kraju se može i izbrisati karta
