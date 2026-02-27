# Changelog

## 1.1.3 - 2026-01-27
- added functionality to detect when quotes are particularly long or short
- dynamically add a class of `.long` and `.short` to each slide that is abnormal
- added scss to adjust widths of `.text-col` for short and long quotes
- modified slick classes to vertically center quote in the vertical space

## 1.1.2 - 2025-08-18
- removed `required` from name

## 1.1.1 - 2025-08-17
- implemented best-guess version number
- added `$version` variable to top of `.php` and `.acf` files
- removed old block updater's `$acf_migration_map` and moved `spr_register_block_changes()` call up in `.acf` file