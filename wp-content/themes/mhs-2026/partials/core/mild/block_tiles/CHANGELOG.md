# Changelog

## 1.1.2 - 2026-01-27
- removed css setting font size of text to a percentage
- removed width constraints on text column, in favor of handling that in customizations

## 1.1.1 - 2025-08-17
- implemented best-guess version number
- added `$version` variable to top of `.php` and `.acf` files
- removed old block updater's `$acf_migration_map` and moved `spr_register_block_changes()` call up in `.acf` file