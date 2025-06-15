# diplom
ВКР 20230618

## Как развернуть базу данных

1. Открой MySQL Workbench
2. Перейди в **Server > Data Import**
3. Выбери:
   - `Import from Self-Contained File`
   - Укажи путь к `Dump20250615.sql`
   - Ниже выбери `Create New Schema`, назови, например, `mydb`
4. Нажми **Start Import**
5. Убедись, что база `mydb` появилась и в ней есть таблицы и данные
