# Email Attachments for order Email
Add attachments for f.e. "AGB" and "Widerrufsbelehrung" to the order mail.

## Installation

    composer require ivoba-oxid/orderemailattach
    
## Usage
Create a folder: *source/out/pdf/* and add your pdfs there and add them in module settings.  
Activate module in "Erweiterungen -> Module -> Ivo Bathke: Order email attachments" enter your settings in the "Settings" tab
    
## Requirements
- UTF-8
- PHP >= 7
- Oxid eShop >= CE 6

## Todo
- path to pdfs is currently hardcoded -> make configurable
- language handling is static for de/en -> make dynamic

## Credits
Its basically an upgrade on https://github.com/pgaida/ppg_ordermailattach
which seems to be abandoned.

## License MIT

© [Ivo Bathke](https://oxid.ivo-bathke.name)
