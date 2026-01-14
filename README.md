## License Tracker

Aplikacja webowa do zarządzania licencjami produktów w firmie.

## Autor: Aleksandra Reja

## Funkcjonalności

### Użytkownik
- rejestracja i logowanie
- przegląd przypisanych licencji
- podgląd statusu licencji (aktywna / wygasła)
- informacja o dacie wygaśnięcia
- podgląd wkrótce wygasających licencji

### Administrator
- panel administratora
- zarządzanie użytkownikami
- zarządzanie produktami
- zarządzanie licencjami
- przypisywanie wielu użytkowników do jednej licencji
- limit użytkowników na licencję
- przegląd przypisanych licencji
- statystyki:
  - liczba użytkowników
  - aktywne licencje
  - koszt aktywnych licencji
  - wkrótce wygasające licencje

## Technologie
- strona serwera: Laravel 10 (PHP)
- baza danych: MySQL, ORM Eloquent
- strona klienta: Laravel Blade, Vite, TailwindCSS
- autoryzacja: Laravel Breeze

## Wymagania
Wersje programów wykorzystane do tworzenia aplikacji
(aplikacja nie została testowana pod kątem kompatybilności z wcześniejszymi wersjami):
- XAMPP (Apache Web Server, MySQL Database)
- PHP 8.3.x
- Composer 2.6.6
- Laravel Framework 10.38.1
- Node.js 21.5.0
- npm

## Uruchomienie
1. Skopiuj katalog projektu laravel-example do katalogu XAMPP\htdocs.
2. W terminalu przejdź do katalogu projektu.
3. Zainstaluj zależności frontendu: npm install
4. Zainstaluj zależności PHP (backend): composer install
5. Włącz w XAMPP: Apache Web Server oraz MySQL Database.
6. Skonfiguruj plik .env w katalogu projektu, ustawiając połączenie do bazy danych (MySQL)
7. Wykonaj migracje bazy danych: php artisan migrate
8. Wypełnij bazę przykładowymi danymi: php artisan db:seed
9. Uruchom kompilację frontendu: npm run dev
10. Uruchom serwer Laravel: php artisan serve
11. Uruchom aplikację w przeglądarce pod adresem: 'localhost:8000'

## Konta testowe
-   **Admin**
    -   Login: admin@company.com
    -   Hasło: Admin123
-   **Test User**
    -   Login: user@company.com
    -   Hasło: User123
