# WEBT | CORE | Server Responses with PHP in JSON format

## Overview
The Retro Videogame Fanclub of Vienna has approached you to contribute to the Open Data sources on the internet. They want to establish a service that allows users to search for a videogame and receive a list of soundtrack covers for said game in the JSON format to be used in own applications.

## User Story 1
*As a Developer I want to create a class structure, so that it is possible to create own entities for OSTs, as well as the representative songs.*

### Acceptance Criteria
- A videogame OST has a unique ID, name, video game name (the one to which it is related to), a release year, and track list consisting of songs
- A song features a unique ID, name, artist, track number and duration!

## User Story 2
*As a Developer I want to create a seeder class, so that I can quickly create mock data for a presentation.*

### Acceptance Criteria
- A seeder class which can create data for demonstrational purposes exists
- The class returns at least 3 OSTs with at least 4 tracks per OST
- A demo file that uses and outputs the data returned by the seeder exists!

## User Story 3
*As a Developer I want to output all information about a single OST as JSON.*

### Acceptance Criteria
- The webserver features a request URL featuring a GET parameter, which allows to request information about a specific OST as JSON.

## User Story 4
*As a Developer I want to output all information about all OSTs as JSON.*

### Acceptance Criteria
- The webserver features a request URL featuring a GET parameter, which allows to request information about all OST as JSON.

#### Links
https://my.skilldisplay.eu/en/skillset/82

---

# Setup
- some changes in `vhosts-conf` depending on file structure
- symbolic link
`ln -s "C:\Users\felix\OneDrive - HTL Wien 3 Rennweg\4BI\WEBT\Projekte\02_json_responses" json_02`
- `.htaccess`
```apacheconf
RewriteEngine On
# RewriteBase "."
RewriteRule "^(\d+)$" "./index.php?ost=$1"
```

