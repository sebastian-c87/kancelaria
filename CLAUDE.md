# Kancelaria Sadłowicz - notatki projektowe

## Reguły pisania treści (WAŻNE)

- **Myślniki**: ZAWSZE używaj zwykłego myślnika `-` (hyphen-minus).
  NIGDY nie używaj długiego myślnika `–` (en dash) ani `—` (em dash) -
  ani w treści stron, ani w kodzie, ani w domyślnych wartościach pól ACF,
  ani nigdzie indziej. Dotyczy to całego projektu.

## Architektura edycji treści

- Motyw to ręcznie pisany szablon PHP (bez Elementora na głównych podstronach).
- Treści edytowalne przez ACF (pola rejestrowane w kodzie przez
  `acf_add_local_field_group()` w `functions.php`).
- Reguła lokalizacji ACF: `param => 'page'` z numerycznym ID strony
  (pobieranym przez `get_page_by_path('slug')`).
- Helpery w functions.php: `ks_field()`, `ks_raw()`, `ks_table_rows()`,
  `ks_list_items()`. Tabele: "kol1 | kol2 | kol3" na linię. Listy: jedna
  pozycja na linię. W komórkach/pozycjach dozwolone `<strong>` i `<em>`.
