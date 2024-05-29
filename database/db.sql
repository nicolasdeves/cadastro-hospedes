CREATE TABLE "guest" (
    "id"        INTEGER PRIMARY KEY AUTOINCREMENT,
    "name"      TEXT    NOT NULL,
    "cpf"       TEXT    NOT NULL,
    "phone"     TEXT    NOT NULL,
    "room"      INTEGER NOT NULL
);