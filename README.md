# TYPO3 Extension: page_overview

## Beschreibung

Die Extension **page_overview** stellt ein eigenes Content-Element zur Verfügung, mit dem Seiten (Pages) übersichtlich als Teaser/Übersicht ausgegeben werden können.  
Typische Einsatzszenarien sind Übersichtsseiten, Landingpages oder Teaserboxen, die auf Unterseiten oder frei definierte Seiten verlinken.

Die Extension ist kompatibel mit **TYPO3 v11 LTS** und **TYPO3 v12 LTS**.

---

## Features

- Eigenes Content-Element „Page Overview“
- Anzeige von Seiten inkl.:
  - Titel
  - optionalem Vorschaubild (Seiteneigenschaft)
  - Link zur Zielseite
- Fallback auf ein Default-Bild (optional konfigurierbar)
- Eigene Icons für Backend & New Content Element Wizard
- Mehrsprachige Labels (DE / EN über XLF)
- Saubere TCA- und TSConfig-Integration
- Unterstützung für TYPO3 11 **und** 12

---

## Systemvoraussetzungen

- TYPO3 CMS **11.5 LTS** oder **12.x LTS**
- PHP entsprechend der TYPO3-Version

---

## Installation

### Installation per Composer (empfohlen)

```bash
composer require vendor/page-overview
```

*(Vendor ggf. anpassen)*

### Manuelle Installation

1. Extension in das Verzeichnis  
   `typo3conf/ext/page_overview/` kopieren
2. Im TYPO3 Backend unter **Admin Tools → Extensions** aktivieren

---

## Backend-Konfiguration

### Page TSConfig

Die Extension registriert ihre TSConfig-Dateien automatisch.  
Optional kann zusätzlich importiert werden:

```php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '@import "EXT:page_overview/Configuration/TsConfig/Page/All.tsconfig"'
);
```

Registrierte TSConfig-Dateien:
- `NewContentElementWizard.tsconfig`
- `All.tsconfig`

---

## Content-Element

Nach der Installation steht im **New Content Element Wizard** ein neues Element zur Verfügung:

**Page Overview**

Eigenschaften:
- Auswahl der darzustellenden Seiten
- Automatische Nutzung eines Seitenbildes (Seiteneigenschaft)
- Fallback auf ein Default-Bild möglich

---

## Seiteneigenschaften (Page Properties)

Die Extension erweitert die Seiteneigenschaften um ein optionales Feld:

- **Overview Image**  
  Wird als Vorschaubild im Page Overview verwendet.

---

## Frontend-Rendering

Das Rendering erfolgt über Fluid-Templates.

Wichtige Verzeichnisse:
- `Resources/Private/Templates/`
- `Resources/Private/Partials/`
- `Resources/Private/Layouts/`

Unterstützt:
- Bild-Crop-Varianten
- Alt- & Title-Fallbacks
- Barrierefreiheit (z. B. `aria-current`)

---

## Mehrsprachigkeit

Alle Labels werden über XLF-Dateien geladen:

```
Resources/Private/Language/
├─ locallang.xlf
├─ locallang.de.xlf
```

Die Labels passen sich automatisch an die Backend-Sprache an.

---

## Icons

- SVG-Icons für:
  - Content-Element
  - New Content Element Wizard
- Ablage unter:
  ```
  Resources/Public/Icons/
  ```

Icons sind TYPO3-konform registriert.

---

## TYPO3 11 & 12 Kompatibilität

Die Extension:
- nutzt versionskompatible TCA-Definitionen
- vermeidet deprecated APIs
- funktioniert identisch in TYPO3 11 und 12

Intern berücksichtigte Unterschiede:
- New Content Element Wizard
- CType-Handling
- TSConfig-Registrierung

---

## Entwicklung / Anpassung

Mögliche Erweiterungen:
- Fluid-Templates anpassen
- Eigene Crop-Varianten ergänzen
- Zusätzliche Seiteneigenschaften erweitern
- Eigene Styles im Frontend integrieren

---

## Lizenz

GPL v2 oder höher (TYPO3 Core Lizenz)

---

## Autor / Maintainer

Projekt: **page_overview**  
TYPO3 Extension zur Seitenübersicht

---

## Support

Bei Problemen:
- TYPO3- und PHP-Version prüfen
- Caches leeren
- TSConfig & TCA prüfen
