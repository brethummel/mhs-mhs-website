# Changelog

## 1.1.4 - 2026-02-04
- css changes
-- Added logo grid block to scss

## 1.1.3 - 2025-08-20
- css changes
-- set last-child's padding-bottom to 0px
-- set testimonials block's top padding to 0px when it appears after a text block
-- Added gallery block to scss
-- Added bio block to scss
-- Added legal block to scss
-- Added text block's new column-one and column-two class names

## 1.1.2 - 2025-08-18
- fixed bug related to the conditional output of a closing section block

## 1.1.1 - 2025-08-17
- implemented best-guess version number
- added `$version` variable to top of `.php` and `.acf` files
- removed old block updater's `$acf_migration_map` and moved `spr_register_block_changes()` call up in `.acf` file