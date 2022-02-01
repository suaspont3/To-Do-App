# TODONOW
**TODONOW** to aplikacja internetowa przeznaczona do tworzenia listy zadań do zrobienia. Aplikacja ma na celu pomóc użytkownikom w organizacji ich dnia.

# Opis techniczny
## Rejestracja
![Rejestracja](/doc/registration.png)
Na stronie rejestracji użytkownik ma możliwość wypełnienia formularza składającego się z następujących elementów:

> **username** - Pole dla podania nazwy użytkownika. W przypadku jeżeli użytkownik wprowadzi nazwę, która już znajduję się w bazie danych, czyli taki użytkownik już istnieje, zostanie wyświetlony komunikat:<br>
<span style="color: red">Given username already exists!</span>
<br>
<br>
**password** - Pole dla podania hasła użytkownika.
<br>
<br>
**email** - Pola dla podania poczty elektronicznej użytkownika. W przypadku jeżeli użytkownik wprowadzi pocztę elektroniczną, która już znajduje się w bazie danych, zostanie wyświetlony komunikat:<br>
<span style="color: red">Given email already exists!</span>
<br>
<br>
Jeżeli choć jedno z powyższych pól nie zostanie podane, wyświetlony zostanie następujący komunikat:<br>
<span style="color: red">Please fill in blanks!</span>

Jeżeli użytkownik podał poprawne dane, po naciśnięciu przycisku `Sign Up` zostanie dodany do systemu i przekierowany na stronę logowania wraz z następującym komunikatem:<br>
<span style="color: red">You have registered successfully, please log in</span>
<br>
Jeśli użytkownik posiada konto, po naciśnięciu `Log In` zostanie przekierowany bezpośrednio na stronę logowania.

## Logowanie
![Logowanie](/doc/login.png)
Na stronie logowania użytkownik ma możliwość wypełnienia formularza składającego się z następujących elementów:

> **username** - Pole dla podania nazwy użytkownika. W przypadku jeżeli użytkownik wprowadzi nazwę, która nie znajduje się w bazie danych, czyli taki użytkownik nie istnieje, zostanie wyświetlony komunikat:<br>
<span style="color: red">User with this username does not exist!</span>
<br>
<br>
**password** - Pole dla podania hasła użytkownika. W przypadku jeżeli użytkownik wprowadzi błędne hasło, zostanie wyświetlony komunikat:<br>
<span style="color: red">Wrong password!</span>
<br>
<br>
Jeżeli choć jedno z powyższych pól nie zostanie podane, wyświetlony zostanie następujący komunikat:<br>
<span style="color: red">Please fill in blanks!</span>

Jeżeli użytkownik podał poprawne dane, po naciśnięciu przycisku `Log In` zostanie przekierowany na stronę z zadaniami.<br>
Jeśli użytkownik nie posiada konta, po naciśnięciu `Sign Up` zostanie przekierowany bezpośrednio na stronę rejestracji.

## Strona z zadaniami
![Zadania](/doc/tasks.png)
Na stronie zadań użytkownik ma możliwość:

- Dodawania zadań do listy

> Dodawanie zadań do listy odbywa się po naciśnięciu `+ Add task`. Użytkownik zostanie przekierowany na osobną stronę, na której może dodać zadanie do listy. Jeśli użytkownik nie dodał jeszcze żadnych zadań do listy, wyświetli się tymczasowa wiadomość **Here can be your task!**.

- Usuwania zadań z listy

> W tym przypadku usunięcie oznacza zakończenie konkretnego zadania. Usunięcie następuje po zaznaczeniu checkboxa i zaakceptowaniu go przyciskiem `Apply`.

- Przejścia do strony ustawień użytkownika

> Po kliknięciu w `Settings` na panelu bocznym lub na ikonę użytkownika w prawym górnym rogu, użytkownik zostanie przekierowany na stronę, na której może zmienić swoją nazwę użytkownika, adres e-mail i hasło.

## Strona z dodawaniem zadań
![DodanieZadan](/doc/add_task.png)
Na stronie dodawania zadań użytkownik ma możliwość:

- Dodawania zadań do listy

> Jeżeli użytkownik nie wprowadzi tytuł zadania, zostanie wyświetlony następujący komunikat:<br>
<span style="color: red">Enter something that you want to do</span>
<br>
Jeśli użytkownik wpisał tytuł zadania i kliknął przycisk `Add`, zadanie zostanie dodane do listy zadań użytkownika i zostanie wyświetlony następujący komunikat:<br>
<span style="color: red">Task has been added to your to-do list!</span>
<br>
Jeśli użytkownik chce wrócić do listy zadań, może skorzystać z następujących opcji:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Kliknąć `Cancel`<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Kliknąć `Today` na panelu bocznym<br>

- Przejścia do strony ustawień użytkownika

> Jeśli użytkownik chce przejść z strony dodawania zadań do strony ustawień użytkownika, może skorzystać z następujących opcji:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Kliknąć `Settings` na panelu bocznym<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Kliknąć na ikonę użytkownika w prawym górnym rogu<br>

## Ustawienia użytkownika
![Ustawienia](/doc/settings.png)
Na stronie ustawień użytkownika użytkownik ma możliwość:

- Zmiany swoich danych

> Konfiguracja **Username** polega na zmianie nazwy użytkownika. Jeżeli użytkownik wprowadzi już istniejącą nazwę użytkownika, zostanie wyświetlony komunikat:<br>
<span style="color: red">User *example_username* already exists!</span>
<br>
<br>
Konfiguracja **Email** polega na zmianie poczty elektronicznej użytkownika. Jeżeli użytkownik wprowadzi już istniejącą pocztę elektroniczną, zostanie wyświetlony komunikat:<br>
<span style="color: red">Email *example_email* already exists!</span>
<br>
<br>
Konfiguracja **Password** polega na zmianie hasła użytkownika, podając stare hasło i nowe. Jeżeli użytkownika wprowadzi błędne stare hasło, zostanie wyświetlony komunikat:<br>
<span style="color: red">You have entered wrong password</span>
<br>
<br>
Jeśli użytkownik nie wprowadzi żadne dane do zmiany w żadnym polu, zostanie wyświetlony komunikat:<br>
<span style="color: red">Please fill in blanks</span>
<br>
<br>
Jeśli użytkownik wprowadzi dane do przynajmniej jednego pola (w przypadku hasła muszą być wypełnione oba), zostanie wyświetlony komunikat:<br>
<span style="color: red">Your data has been updated.</span>
<br>
<br>
Uwaga! Powyższy opis ma zastosowanie, gdy użytkownik kliknie `Apply changes`.

- Wylogowania

> Po kliknięciu `Log out` użytkownik zostanie przekierowany na stronę logowania. Sesja użytkownika zostanie zniszczona.

- Przejścia do listy zadań

> Po kliknięciu w `Today` na panelu bocznym, użytkownik zostanie przekierowany na stronę z listą zadań.

---