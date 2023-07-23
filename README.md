﻿

**РЕФЕРАТ**

Отчет 38 с., 35 рис., 4 табл., 6 источн., 1 прил.

ДАТАЛОГИЧЕСКАЯ МОДЕЛЬ, ИНФОЛОГИЧЕСКАЯ МОДЕЛЬ, БАЗА ДАННЫХ, СУЩНОСТЬ, СВЯЗЬ

Объект разработки – информационно-программный комплекс.

Целью курсового проекта является разработка информационно-программного комплекса. 

В процессе работы проводились исследования предметной области, разрабатывались инфологические и даталогические схемы.

В результате разработки был разработан информационно-программный комплекс, который позволяет решать задачи, связанные с предметной областью.


# <a name="page2"></a><a name="_toc55502543"></a><a name="_toc107156725"></a>**СОДЕРЖАНИЕ**
[ВВЕДЕНИЕ	4](#_toc135830808)

[1 Обзор предметной области	6](#_toc135830809)

[2 Инфологическое моделирование предметной области	8](#_toc135830810)

[2.1 Спецификация сущностей	9](#_toc135830811)

[2.2 Спецификация связей	11](#_toc135830812)

[2.3 Спецификация атрибутов	12](#_toc135830813)

[2.4 Инфологическая схема	14](#_toc135830814)

[3 Даталогическое проектирование базы данных	15](#_toc135830815)

[3.1 Даталогическая схема	15](#_toc135830816)

[3.2 Спецификация ключей	15](#_toc135830817)

[4 Выбор средств разработки	18](#_toc135830818)

[5 Проектирование БД и описание запросов	20](#_toc135830819)

[6 Создание клиентской части ИС	21](#_toc135830820)

[ЗАКЛЮЧЕНИЕ	36](#_toc135830821)

[СПИСОК ИСПОЛЬЗОВАННЫХ ИСТОЧНИКОВ	37](#_toc135830822)

[ПРИЛОЖЕНИЕ А Тексты файлов	38](#_toc135830823)


3


# <a name="page4"></a><a name="_toc55502545"></a><a name="_toc114752028"></a><a name="_toc135830808"></a>**ВВЕДЕНИЕ**
<a name="__refheading___toc6209_959251280"></a>База данных (БД) — это совокупность данных, организованных для хранения и быстрого доступа к ним. Она представляет собой структурированное хранилище информации, которое может быть использовано для хранения и обработки данных.

Базы данных используются практически во всех областях деятельности, где необходимо хранить и обрабатывать большие объемы информации. Например, БД используются в банковском деле для хранения информации о клиентах и их транзакциях, в медицине для хранения медицинских записей пациентов, в торговле для учета товаров на складах и т.д.

Базы данных могут быть реляционными и нереляционными. Реляционные БД используют таблицы для хранения информации, а нереляционные БД используют другие структуры данных, такие как документы или ключ-значение.

Важной частью БД является язык запросов. Язык запросов позволяет получать данные из БД, а также изменять их. Самый распространенный язык запросов - SQL.

Кроме того, БД могут быть размещены на различных уровнях - на локальном компьютере, на сервере или в облаке. Размещение БД на сервере позволяет обеспечить ее доступность для многих пользователей, а использование облачных сервисов позволяет снизить затраты на инфраструктуру и увеличить масштабируемость системы.

В целом, базы данных являются неотъемлемой частью современных информационных технологий и играют важную роль в обработке и хранении данных.

Целью курсового проекта является разработка информационно-программного комплекса директора магазина мебели. Для достижения поставленной цели необходимо решить следующие задачи:
-
- изучить и описать предметную область, в рамках которой выполняется курсовой проект;
- разработать инфологическую модель данных анализируемой предметной области;
- преобразовать инфологическую модель в даталогическую реляционную модель данных;
- обеспечить перевод даталогической модели в физическую среду конкретной СУБД;
- наполнить разработанную БД данными; 
- составить запросы к БД, согласно варианту задания; 
- реализовать пользовательский интерфейс; 
- протестировать работу программы. 

Отчёт состоит из введения, 6 разделов и заключения.
-
- В первом разделе рассказывается как функционирует система, какие есть бизнес-процессы и для чего будет использоваться система. Во втором разделе описывается инфологическая модель предметной области, также спецификации сущностей, связей, атрибутов и приведена инфологическая схема. В третьем разделе описывается преобразование инфологической модели данных в даталогическую реляционную модель, и также расписана спецификация ключей. В четвертом разделе описан выбор СУБД и средств разработки приложения. В пятом разделе описывается как спроектирована БД и описаны все используемые запросы. В шестом разделе приведено описание разработанного приложения с примерами работы.


# <a name="_toc135830809"></a>**1 Обзор предметной области**
Вариант: директор магазина мебели.

Информационно-программный комплекс директора магазина мебели будет представлять собой систему, через которую можно заказать мебель, также работникам принимать или отвергать заказы, выставлять товары и оформлять поставки. Покупатель может выбрать категорию мебели, которую он хочет приобрести, например: диваны и кресла или кровати и матрасы.

Также есть подкатегории, которые помогают пользователю помочь с выбором мебели, такие как: прямые диваны, угловые диваны, модульные диваны.

После выбора категории, пользователь попадает на страницу с каталогом товаров. Здесь он может просмотреть фотографии товаров, описание и цены. Также на странице каталога есть возможность отфильтровать товары по цене, популярности и так далее.

Пользователь может выбрать нужный товар и оформить заказ. При оформлении заказа он может изменить количество товара или уменьшить, а также удалить. У пользователя есть выбор доставки: самовывоз или курьером. 

После оформления заказа пользователь получает уведомление о том, что его заказ принят. Система автоматически отправляет уведомление менеджеру магазина о новом заказе. Менеджер связывается с клиентом для подтверждения заказа и уточнения деталей доставки. И данные о пользователе отправляются администратору.

Также для работников магазина есть возможность запросить поставку (и выбрать поставщика), посмотреть какие есть поставки и товары на складе. Администратор может выложить на сайт любой товар, который есть на складе, при этом имеет возможность изменить цену товара.

При необходимости работник может запросить отчеты:
-
- - количество продаваемого товара;
- - количество и стоимость товара на складе;
- - о заключенных договорах на поставку товар;
- - о продажах.

Отчеты загружаются в файл Excel.

Таким образом, информационно-программный комплекс будет представлять собой удобный и простой способ приобретения мебели для дома и офиса. Система должна позволять управлять бизнес-процессами магазина, отслеживать статусы заказов, связываться с клиентами, контролировать поставки, и выкладывать товары на сайт.


# <a name="_toc114752031"></a><a name="_toc135830810"></a>**2 Инфологическое моделирование предметной области**
Инфологическая модель предметной области — это модель, которая описывает структуру и связи между объектами и сущностями в предметной области. Она представляет собой абстрактное отображение информации, которая хранится и обрабатывается в системе. Инфологическая модель может использоваться для разработки базы данных или информационной системы, а также для определения требований к системе и ее функциональности. Она помогает установить правильные связи между объектами и определить основные атрибуты каждого объекта в предметной области.

Первый этап процесса проектирования базы данных определяется как этап концептуального или инфологического проектирования БД. Он заключается в создании концептуальной инфологической модели данных, анализируемой ПО. Эта модель создается на основе анализа ПО и информации, записанной в спецификациях требований пользователей. Инфологическое проектирование БД абсолютно не зависит от таких подробностей ее реализации, как тип выбранной целевой СУБД, набор создаваемых прикладных программ, используемые языки программирования, тип выбранной вычислительной платформы, а также от любых других особенностей физической реализации. При разработке инфологической модели данных она постоянно подвергается тестированию и проверке на соответствие требованиям пользователей. Разработанная инфологическая модель данных ПО является исходной для этапа даталогического проектирования БД. Основные цели инфологического моделирования данных – углубить понимание семантики данных и упростить процедуры анализа предъявляемых к ним требований. При создании модели данных необходимо получить ответы на определенные вопросы об отдельных сущностях, связях и атрибутах, моделируемой ПО.
## <a name="_toc135830811"></a>**2.1 Спецификация сущностей**
Сущность – это класс однотипных объектов, информация о которых должна быть учтена в инфологической модели. Эти объекты должны иметь экземпляры, отличающиеся друг от друга и допускающие однозначную идентификацию. Каждая сущность должна иметь уникальное в рамках данной модели наименование. При словесном описании предметной области сущность — это, как правило, имя существительное, которое рекомендуется задавать в единственном числе [1].

Спецификация сущностей в базе данных необходима для того, чтобы определить, какие объекты будут храниться в базе данных, и как они будут связаны друг с другом.

Спецификация сущностей включает в себя описание каждой сущности, ее атрибутов и связей с другими сущностями. Она помогает разработчикам понимать, как данные будут храниться и использоваться в приложении, и какие ограничения будут наложены на эти данные.

Спецификация сущностей также может помочь в определении правильной структуры базы данных. Например, она может помочь определить, какие таблицы будут нужны для хранения данных, какие связи между таблицами будут необходимы, и какие индексы будут нужны для быстрого доступа к данным.

Без спецификации сущностей можно столкнуться с проблемами, связанными с неправильным хранением данных, неправильными связями между таблицами, неправильным использованием индексов и другими проблемами, которые могут привести к ошибкам и низкой производительности приложения [2].

В целом, спецификация сущностей является важной частью процесса проектирования базы данных и помогает обеспечить правильное хранение и использование данных в приложении. В таблице 1 показана спецификация сущностей.

Таблица 1 – Спецификация сущностей

|Сущность|Уникальный идентификатор|Описательные атрибуты|
| :-: | :-: | :-: |
|Магазин|Код магазина|Название, Адрес, Почта, Телефон, Директор, Главный бухгалтер, Банковские реквизиты, ИНН.|
|Поставщик|Код поставщика|Название, Адрес, Телефон, Директор, Главный бухгалтер, Банковские реквизиты, ИНН.|
|Мебель|Код мебели|Название, описание, фото, цена, цвет, вид, размеры, количество, просмотры.|
|Категория|Код категории|Название.|
|Категория категории|Код категории категории|Название.|
|Сотрудник|Код сотрудника|Имя, фамилия, отчество, почта, логин, пароль, профессия, образование|
|Договор|Номер договора|Код поставщика, Код магазина, Дата заключения, Дата окончания действия, краткий текст, статус.|
|Склад|Код товара|` `«Всего места», «сколько осталось»|
|Пользователь|Код пользователя|Имя, фамилия, отчество, выбор доставки, адрес доставки, почта, телефон, дата доставки, количество, цена.|
##

## <a name="_toc135830812"></a>**2.2 Спецификация связей**
Связь является логическим соотношением между сущностями. Каждая связь должна именоваться глаголом или глагольной фразой. Формально связь – это некоторая ассоциация между несколькими сущностями или сущности с самой собой.

Спецификация связей в базе данных необходима для определения связей между таблицами и полями в базе данных. Это позволяет разработчикам и администраторам баз данных лучше понимать структуру базы данных и использовать ее эффективно.

Спецификация связей включает в себя информацию о том, какие таблицы связаны между собой, какие поля используются для связи, какие типы связей существуют (один-ко-многим, многие-ко-многим и т. д.).

Без спецификации связей может возникнуть риск ошибок при работе с базой данных, таких как повторяющиеся данные, неверные связи между таблицами, потеря данных и т. д. Спецификация связей также помогает облегчить процесс изменения структуры базы данных, так как разработчики могут легко определить, какие таблицы и поля будут затронуты при изменении структуры. В таблице 2 показана спецификация связей.

Таблица 2 – Спецификация связей

|Номер|Связь|Тип|От Сущности|К Сущности|По Атрибуту|
| :-: | :-: | :-: | :-: | :-: | :-: |
|1|Поставляет|1:М|Поставщик|Мебель|Код Поставщика|
|2|Подписывает|1:М|Поставщик|Договор|Код Поставщика|
|3|Поступает|М:1|Мебель|Склад|Код Мебели|
|4|Имеет|М:1|Мебель|Категория|Код Мебели|
|5|Имеет|1:М|Категория|Категория|Код Категории|
|6|Выбирает|М:1|Мебель|Пользователь|Код Мебели|
|7|Выставляет|М:1|Мебель|Сотрудник|Код Мебели|
|8|Подписывает|1:М|Магазин|Договор|Код Магазина|
|9|Работает|М:1|Сотрудник|Магазин|Код Магазина|
##

## <a name="_toc135830813"></a>**2.3 Спецификация атрибутов**
Атрибут сущности – это именованная характеристика, являющаяся некоторым свойством сущности. Наименование атрибута должно быть выражено существительным в единственном числе (возможно, с характеризующими прилагательными).

Спецификация атрибутов в базе данных необходима для определения свойств каждого поля в таблице. Она включает в себя информацию о типе данных, длине поля, ограничениях на значения поля, наличии индексов и других свойствах.

Она также позволяет контролировать качество данных и предотвращать ошибки при вводе данных [3].

Без спецификации атрибутов может возникнуть риск ошибок при работе с базой данных, таких как неверный тип данных, превышение длины поля, неверные значения и т. д. Спецификация атрибутов также помогает облегчить процесс изменения структуры базы данных, так как разработчики могут легко определить, какие поля будут затронуты при изменении структуры. В таблице 3 показана спецификация атрибутов.

Таблица 3 – Спецификация атрибутов

<table><tr><th>СУЩНОСТЬ</th><th>Атрибут</th><th>Тип</th><th>Ограничения</th></tr>
<tr><td rowspan="9" valign="top">Магазин</td><td valign="top">Код Магазина</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top">Название</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Адрес</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Почта</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">100 Символов</td></tr>
<tr><td valign="top">Телефон</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">30 Символов</td></tr>
<tr><td valign="top">Директор</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Главный Бухгалтер</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Банковские Реквизиты</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">100 Символов</td></tr>
<tr><td valign="top">Инн</td><td valign="top">Цифровой</td><td valign="top">100 Символов</td></tr>
<tr><td rowspan="8" valign="top">Поставщик</td><td valign="top">Код Магазина</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top">Название</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Адрес</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Телефон</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">30 Символов</td></tr>
<tr><td valign="top">Директор</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Главный Бухгалтер</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Банковские Реквизиты</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Инн</td><td valign="top">Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td rowspan="3" valign="top">Мебель</td><td valign="top">Код Мебели</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top">Название</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Описание</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">-</td></tr>
</table>

Продолжение таблицы 3

<table><tr><th valign="top">Сущность</th><th valign="top">Атрибут</th><th valign="top">Тип</th><th valign="top">Ограничения</th></tr>
<tr><td rowspan="7" valign="top">Мебель</td><td valign="top">Фото</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">-</td></tr>
<tr><td valign="top">Цена</td><td valign="top">Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top">Цвет</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Вид</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Размеры</td><td valign="top">Цифровой</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Количество</td><td valign="top">Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top">Просмотры</td><td valign="top">Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top">Категория</td><td valign="top">Код Категории</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Название</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Категория Категории</td><td valign="top">Код Категории Категории</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Название</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Сотрудник</td><td valign="top">Код Сотрудника</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Имя</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Фамилия</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Отчество</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Логин</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">20 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Пароль</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">20 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Почта</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">100 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Профессия</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Образование</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Договор</td><td valign="top">Номер Договора</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Код Поставщика</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Код Магазина</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Дата Заключения</td><td valign="top">Дата</td><td valign="top">-</td></tr>
<tr><td valign="top"></td><td valign="top">Дата Окончания Действия</td><td valign="top">Дата</td><td valign="top">-</td></tr>
<tr><td valign="top"></td><td valign="top">Краткий Текст</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">-</td></tr>
<tr><td valign="top"></td><td valign="top">Статус</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top">Склад</td><td valign="top">Код Товара</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Всего</td><td valign="top">Числовой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Осталось</td><td valign="top">Числовой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top">Пользователь</td><td valign="top">Код Пользователя</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Имя</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Фамиля</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Отчество</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Выбор Доставки</td><td valign="top">Алфавитный</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Адрес Доставки</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">255 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Почта</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">100 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Номер Телефона</td><td valign="top">Алфавитно-Цифровой</td><td valign="top">21 Символов</td></tr>
<tr><td valign="top"></td><td valign="top">Дата Доставки</td><td valign="top">Дата</td><td valign="top">-</td></tr>
<tr><td valign="top"></td><td valign="top">Количество</td><td valign="top">Цифровой</td><td valign="top">11 Символов</td></tr>
<tr><td valign="top"></td><td valign="top"></td><td valign="top"></td><td valign="top"></td></tr>
<tr><td valign="top"></td><td valign="top">Цена</td><td valign="top">Цифровой</td><td valign="top">11 Символов</td></tr>
</table>

## <a name="_toc135830814"></a>**2.4 Инфологическая схема**
На рисунке 1 представлена инфологическая схема предметной области.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.001.png)

Рисунок 1 – Инфологическая схема


<a name="_toc114752033"></a>
# <a name="_toc135830815"></a>**3 Даталогическое проектирование базы данных**
## <a name="_toc135830816"></a>**3.1 Даталогическая схема**
На рисунке 2 представлена даталогическая схема.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.002.png)

Рисунок 2 – Даталогическая схема
## <a name="_toc135830817"></a>**3.2 Спецификация ключей**
В таблице 4 показана спецификация ключей.

Таблица 4 – Спецификация ключей

<table><tr><th rowspan="2" valign="top">Отношение</th><th colspan="2" valign="top">Поле</th><th rowspan="1" valign="top">Тип</th><th rowspan="2" valign="top">Размер</th><th rowspan="2" valign="top">Описание</th></tr>
<tr><td valign="top">Имя</td><td valign="top">Описание</td></tr>
<tr><td rowspan="14" valign="top">Furniture</td><td valign="top">Furniture_id</td><td valign="top">Код мебели</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Первичный ключ</td></tr>
<tr><td valign="top">Category_id</td><td valign="top">Код категории</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Вторичный ключ</td></tr>
<tr><td valign="top">Warehouse_id</td><td valign="top">Код товара</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Вторичный ключ</td></tr>
<tr><td valign="top">User_id</td><td valign="top">Код пользователя</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Вторичный ключ</td></tr>
<tr><td valign="top">Provider_id</td><td valign="top">Код поставщика</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Вторичный ключ</td></tr>
<tr><td valign="top">Employee_id</td><td valign="top">Код сотрудника</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Вторичный ключ</td></tr>
<tr><td valign="top">Name</td><td valign="top">Название</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Text</td><td valign="top">Описание</td><td valign="top">Text</td><td valign="top"></td><td valign="top"></td></tr>
<tr><td valign="top">Image</td><td valign="top">Фото</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Price</td><td valign="top">Цена</td><td valign="top">Int</td><td valign="top">11</td><td valign="top"></td></tr>
<tr><td valign="top">View</td><td valign="top">Просмотры</td><td valign="top">Int</td><td valign="top">11</td><td valign="top"></td></tr>
<tr><td valign="top">Color</td><td valign="top">Цвет</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Type</td><td valign="top">Вид</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Size</td><td valign="top">Размер</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
</table>


Продолжение таблицы 4

<table><tr><th rowspan="2" valign="top">Отношение</th><th colspan="2" valign="top">Поле</th><th rowspan="1" valign="top">Тип</th><th rowspan="2" valign="top">Размер</th><th rowspan="2" valign="top">Описание</th></tr>
<tr><td valign="top">Имя</td><td valign="top">Описание</td></tr>
<tr><td valign="top">Furniture</td><td valign="top">Count</td><td valign="top">Количество</td><td valign="top">Int</td><td valign="top">11</td><td valign="top"></td></tr>
<tr><td rowspan="8" valign="top">Provider</td><td valign="top">Provider_id</td><td valign="top">Код поставщика</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Первичный ключ</td></tr>
<tr><td valign="top">Name</td><td valign="top">Название</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Adress</td><td valign="top">Адресс</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Phone</td><td valign="top">Телефон</td><td valign="top">Varchar</td><td valign="top">11</td><td valign="top"></td></tr>
<tr><td valign="top">Director</td><td valign="top">Директор</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Chief_accountant</td><td valign="top">Главный бухгалтер</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Bank_requisites</td><td valign="top">Банковские реквизиты</td><td valign="top">Varchar</td><td valign="top">45</td><td valign="top"></td></tr>
<tr><td valign="top">Tin</td><td valign="top">Инн</td><td valign="top">Int</td><td valign="top">11</td><td valign="top"></td></tr>
<tr><td rowspan="3" valign="top">Warehouse</td><td valign="top">Warehouse_id</td><td valign="top">Код товара</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Первичный ключ</td></tr>
<tr><td valign="top">Allcount</td><td valign="top">Всего</td><td valign="top">Int</td><td valign="top">11</td><td valign="top"></td></tr>
<tr><td valign="top">Ostatok</td><td valign="top">Осталось</td><td valign="top">Int</td><td valign="top">11</td><td valign="top"></td></tr>
<tr><td rowspan="11" valign="top">User</td><td valign="top">User_id</td><td valign="top">Код пользователя</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Первичный ключ</td></tr>
<tr><td valign="top">Name</td><td valign="top">Имя</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Surname</td><td valign="top">Фамилия</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Patronymic</td><td valign="top">Отчество</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Choice_of_dostavka</td><td valign="top">Выбор доставки</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Adress</td><td valign="top">Адресс</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Mail</td><td valign="top">Почта</td><td valign="top">Varchar</td><td valign="top">100</td><td valign="top"></td></tr>
<tr><td valign="top">Phone</td><td valign="top">Телефон</td><td valign="top">Varchar</td><td valign="top">21</td><td valign="top"></td></tr>
<tr><td valign="top">Date</td><td valign="top">Дата доставки</td><td valign="top">Date</td><td valign="top"></td><td valign="top"></td></tr>
<tr><td valign="top">Count</td><td valign="top">Количество</td><td valign="top">Int</td><td valign="top">11</td><td valign="top"></td></tr>
<tr><td valign="top">Price</td><td valign="top">Цена</td><td valign="top">Int</td><td valign="top">11</td><td valign="top"></td></tr>
<tr><td rowspan="10" valign="top">Employee</td><td valign="top">Employee_id</td><td valign="top">Код сотрудника</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Первичный ключ</td></tr>
<tr><td valign="top">Shop_id</td><td valign="top">Код магазина</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Вторичный ключ</td></tr>
<tr><td valign="top">Name</td><td valign="top">Имя</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Surname</td><td valign="top">Фамилия</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Patronymic</td><td valign="top">Отчетсво</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Login</td><td valign="top">Логин</td><td valign="top">Varchar</td><td valign="top">20</td><td valign="top"></td></tr>
<tr><td valign="top">Password</td><td valign="top">Пароль</td><td valign="top">Varchar</td><td valign="top">20</td><td valign="top"></td></tr>
<tr><td valign="top">Mail</td><td valign="top">Почта</td><td valign="top">Varchar</td><td valign="top">100</td><td valign="top"></td></tr>
<tr><td valign="top">Profession</td><td valign="top">Профессия</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Education</td><td valign="top">Образование</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td rowspan="9" valign="top">Shop</td><td valign="top">Shop_id</td><td valign="top">Код магазина</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Первичный ключ</td></tr>
<tr><td valign="top">Name</td><td valign="top">Название</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Adress</td><td valign="top">Адресс</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Mail</td><td valign="top">Почта</td><td valign="top">Varchar</td><td valign="top">100</td><td valign="top"></td></tr>
<tr><td valign="top">Phone</td><td valign="top">Номер телефона</td><td valign="top">Varchar</td><td valign="top">30</td><td valign="top"></td></tr>
<tr><td valign="top">Director</td><td valign="top">Директор</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Chief_accountant</td><td valign="top">Главный бухгалтер</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Bank_requisites</td><td valign="top">Банковские реквзиты</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td valign="top">Tin</td><td valign="top">Инн</td><td valign="top">Int</td><td valign="top">11</td><td valign="top"></td></tr>
<tr><td valign="top">Contract</td><td valign="top">Contract_id</td><td valign="top">Код договора</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Первичный ключ</td></tr>
</table>



Продолжение таблицы 4

<table><tr><th rowspan="2" valign="top">Отношение</th><th colspan="2" valign="top">Поле</th><th rowspan="1" valign="top">Тип</th><th rowspan="2" valign="top">Размер</th><th rowspan="2" valign="top">Описание</th></tr>
<tr><td valign="top">Имя</td><td valign="top">Описание</td></tr>
<tr><td rowspan="6" valign="top">Contract</td><td valign="top">Provider_id</td><td valign="top">Код поставщика</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Вторичный ключ</td></tr>
<tr><td valign="top">Shop_id</td><td valign="top">Код магазина</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Вторичный ключ</td></tr>
<tr><td valign="top">Date_of_conclusion</td><td valign="top">Дата заключения</td><td valign="top">Date</td><td valign="top">-</td><td valign="top"></td></tr>
<tr><td valign="top">Date_of_expiration</td><td valign="top">Дата окончания действия</td><td valign="top">Date</td><td valign="top">-</td><td valign="top"></td></tr>
<tr><td valign="top">Short_text</td><td valign="top">Короткий текст</td><td valign="top">Text</td><td valign="top">-</td><td valign="top"></td></tr>
<tr><td valign="top">Status</td><td valign="top">Статус</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td rowspan="3" valign="top">Category</td><td valign="top">Category_id</td><td valign="top">Код категории</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Первичный ключ</td></tr>
<tr><td valign="top">Category_of_category_id</td><td valign="top">Код категории категории</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Вторичный ключ</td></tr>
<tr><td valign="top">Name</td><td valign="top">Название</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
<tr><td rowspan="2" valign="top">Category_of_category</td><td valign="top">Category_of_category_id</td><td valign="top">Код категории категории</td><td valign="top">Int</td><td valign="top">11</td><td valign="top">Первичный ключ</td></tr>
<tr><td valign="top">Name</td><td valign="top">Название</td><td valign="top">Varchar</td><td valign="top">255</td><td valign="top"></td></tr>
</table>

<a name="_toc114752034"></a>
# <a name="_toc135830818"></a>**4 Выбор средств разработки**
В ходе выполнения курсового проекта из всех СУБД был сделан выбор в сторону MySQL, потому что MySQL является одной из самых популярных СУБД в мире. Она обладает множеством преимуществ, которые делают ее отличным выбором для многих приложений:
-
- - бесплатность (MySQL является бесплатной и открытой СУБД);
- - простота использования (MySQL легко установить и настроить, а также управлять ею);
- - высокая производительность (MySQL обладает высокой производительностью и быстродействием);
- - надежность и безопасность (Она имеет множество функций для защиты данных, включая шифрование и аутентификацию);
- - масштабируемость (MySQL позволяет увеличивать производительность и вместимость по мере необходимости);
- - поддержка (MySQL имеет большое сообщество пользователей и разработчиков).

В целом, MySQL является отличным выбором для многих приложений, которые требуют надежной и производительной базы данных. Она имеет множество преимуществ, которые делают ее одной из лучших баз данных на рынке [4].

В качестве среды разработки был выбран Microsoft Visual Studio Code, так как он поддерживает множество языков программирования. В курсовом проекте были использованы языки программирования такие как JavaScript и PHP, язык разметки HTML и язык таблиц стилей CSS. Также для администрирования баз данных использовался phpMyAdmin, так как он предоставляет вполне удобный веб-интерфейс и прост в использовании. Версия PHP была выбрана 7.2, а MySQL – 8.0. Для настраивания веб-сервера использовался OpenServer версии 5.4.3, так как он облегчает процесс создания и тестирования веб-сайтов и имеет множество функций и дополнительных программ. Также OpenServer позволяет легко изменять настройки и конфигурацию сервера.
# <a name="_toc135830819"></a>**5 Проектирование БД и описание запросов**
Таблицы создаются с помощью запроса: CREATE TABLE furniture (

Furniture\_id INT(11) PRIMARY KEY,

`  `name VARCHAR(255),

`  `text TEXT,

`  `и так далее…

); 

Запрос на выбор таблицы и ее полей выполнялся так: SELECT \* FROM `warehouse` [5].

Удаление полей происходило благодаря запросу: DELETE FROM `provider` WHERE `provider`.`provider\_id` = $provider.

Обновление полей выполняется следующим образом: UPDATE `warehouse` SET `ostatok` = $ostatok WHERE `warehouse\_id` = $whId

Чтобы добавить поле/поля, были выполнены следующие запросы, похожие на этот: INSERT INTO `furniture` (`name`, `text`, `image`, `price`, `color`, `type`, `size`, `count`, `view`, `category\_id`, `provider\_id`) VALUES ('$name', '$more', '$path', '$price', '$color', '$type', '$size', '$count', '0', '$category', '$prId').

Для запроса количества продаваемого товара используется строка: SELECT \* FROM `furniture` WHERE `employee\_id` IS NOT NULL.

Для запроса количества и стоимости товара на складе используется строка: SELECT \* FROM `furniture` WHERE `employee\_id` IS NULL AND `warehouse\_id` IS NOT NULL

Для запроса о заключенных договорах на поставку товаров используется строка: SELECT \* FROM `contract`.

Для запроса о продажах используется строка: SELECT \* FROM `sales` [5].


# <a name="_toc114752035"></a><a name="_toc135830820"></a>**6 Создание клиентской части ИС**
Сначала пользователь оказывается на главной странице, на рисунке 3 она показана. На главной странице предоставлены выбор категории мебели, информация о магазине, которую можно получить при нажатии на «О нас», а также справка.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.003.png)

Рисунок 3 – Главная страница

На главной странице так же показаны товары, количество которых очень мало, под надписью «Успейте купить!». Чтобы выводились сначала товары с самым малым количеством в наличии, был написан такой запрос: SELECT \* FROM `furniture` WHERE `employee\_id` IS NOT NULL ORDER BY `count` ASC, `view` DESC LIMIT 6. На рисунке 4 предоставлен результат запроса [6].

На рисунке 5 предоставлен выбор категорий. У каждой категории есть своя категория, чтобы они выводились был написан такой запрос: SELECT \* FROM `category` WHERE `category\_of\_category\_id` = " . (*int*) $cat\_cat['category\_of\_category\_id'] . ".

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.004.png)

Рисунок 4 – Главная страница и раздел «Успейте купить»

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.005.png)

Рисунок 5 - Категории

При выборе конкретной категории, пользователю выпадает список товаров этой категории. На рисунке 6 показан пример товаров категории прямые диваны, с помощью запроса: SELECT \* FROM `category` WHERE `category\_id` = " . (*int*) $\_GET['category'] . "

Также можно отсортировать список по популярности, по возрастанию цены, по убыванию цены, по новинкам. На рисунке 7 показан пример сортировки по возрастанию цены.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.006.png)

Рисунок 6 – Товары категории «Прямые диваны»

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.007.png)

Рисунок 7 - Сортировка

При нажатии на определенный товар, пользователя переносит на страницу данного товара, данные которого выводятся с помощью запроса: SELECT \* FROM `furniture` WHERE `furniture\_id` = " . (*int*) $\_GET['furniture']. На рисунке 8 показан пример страницы товара «Диван Слипсон Happy Green».

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.008.png)

Рисунок 8 – Страница конкретного товара

При нажатии на кнопку «Оформить заказ» пользователя пересылает на страницу оформления заказа. На рисунке 9 показано как выглядит оформление заказа.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.009.png)

Рисунок 9 – Оформление заказа

На рисунке 10 показан пример ввода данных.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.010.png)

Рисунок 10 – Пример ввода данных

После того как пользователь подтверждает заказ, его пересылают на другую страницу, и система сообщает, что в скором времени позвонят. А в это время данные покупателя пересылаются работникам. На рисунке 11 показано как система сообщает о том, что заказ принят.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.011.png)

Рисунок 11 – Сообщение, что заказ принят

Для того чтобы работник зашел на рабочее место на сайте, ему нужно пролистать до низа страницы и там будет «подвал» и нажать на «Разработчикам». На рисунке 12 показано как выглядит «подвал».

После нажатия на «Разработчикам» пользователю нужно подтвердить свою личность, введя логин и пароль, которые теоретически дают при принятии на свою должность. На рисунке 13 показан вход.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.012.png)

Рисунок 12 – «Подвал»

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.013.png)

Рисунок 13 - Вход

Если пользователь неправильно ввел пароль или логин, то система ему сообщает об этом. Логины и пароли работников хранятся в таблице «employee». На рисунке 14 показано как система сообщает о неправильном вводе.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.014.png)

Рисунок 14 – Сообщение о неверном вводе

Если же был введен верный логин и пароль, то пользователь попадает на страницу разработчиков, в раздел «Заказы». Разработчику предоставлено четыре раздела – «Заказы», «Поставки», «Выставить товар», «Отчеты». На рисунке 15 предоставлена страница с разделом «Заказы».

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.015.png)

Рисунок 15 - Заказы

Работник после того, как позвонил покупателю, исходя из обстоятельств, выбирает принять заказ, либо его отклонить. После того, как работник принял заказ, система отвечает тем, что заказ принят. На рисунке 16 показан ответ системы. Данные о проданном заказе, хранятся в таблице «sales».

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.016.png)

Рисунок 16 – Сообщение о том, что заказ успешно принят

На рисунке 17 показано, как сохранились данные о заказе в таблице «sales».

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.017.png)

Рисунок 17 – Таблица «sales»

В разделе поставки показывается информация о поставках, также работник может запросить поставку или принять. На рисунке 18 показана страница «Поставки».

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.018.png)

Рисунок 18 - Поставки

При нажатии на «Оформить заказ» работнику нужно выбрать поставщика. На рисунке 19 показан выбор поставщиков.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.019.png)

Рисунок 19 – Выбор поставщика

После выбора поставщика нужно ввести данные о товаре, который будет поставляться. На рисунке 20 продемонстрирована станица с оформлением заказа.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.020.png)

Рисунок 20 – Оформление заказа

Пример ввода данных предоставлен на рисунке 21.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.021.png)

Рисунок 21 – Пример ввода данных

После подтверждения заказа появляется второе окно с сообщением, что заказ подтвержден. На рисунке 22 показано сообщение о подтверждении заказа.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.022.png)

Рисунок 22 – Сообщение о подтверждении заказа

На странице «Поставки» теперь показывается поставка с информацией о том, кто поставляет, что поставляет и какой договор. На рисунке 23 показано как отображается поставка.

Работник может либо принять поставку, либо отменить. После принятия поставки, работнику нужно выбрать склад. На рисунке 24 показан выбор складов.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.023.png)

Рисунок 23 - Поставки

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.024.png)

Рисунок 24 – Выбор склада

После выбора склада работника пересылает на страницу с сообщением о том, что товар принят на склад. На рисунке 25 показана страница с сообщением, что товар принят на склад.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.025.png)

Рисунок 25 – Сообщение, что товар принят на склад

На странице «Выставить товар» работнику предстоит выбрать с какого склада выставить товар на сайт. На рисунке 26 показана страница «Выставить товар».

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.026.png)

Рисунок 26 – Выбор склада

После выбора склада, работнику нужно выставить выложить определенный товар на сайт. При этом работник может изменить цену. На рисунке 27 показана страница с товарами, которые выкладывают на сайт.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.027.png)

Рисунок 27 – Выбор товара

После того, как товар был выложен на сайт, система сообщает о том, что товар успешно выложен на сайт. На рисунке 28 показано сообщение от системы, о том, что товар успешно выложен.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.028.png)

Рисунок 28 – Сообщение, что товар успешно выложен

На рисунке 29 показано страница с пустым каталогом «Двуспальные кровати», до того, как товар был выложен на сайт.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.029.png)

Рисунок 29 – До выкладывания на сайт товара

На рисунке 30 показано, как товар выложился на сайт, который упоминался выше.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.030.png)

Рисунок 30 – После выкладывания на сайт товара

На странице «Отчеты» работник может запросить разные отчеты. На рисунке 31 показана страница «Отчеты».

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.031.png)

Рисунок 31 - Отчеты

После того как работник, требует запрос о «Количество продаваемого товара», загружается Excel файл с соответствующей информацией. Запрос выполняется с помощью строки: SELECT \* FROM `furniture` WHERE `employee\_id` IS NOT NULL. На рисунке 32 показан Excel файл.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.032.png)

Рисунок 32 – Отчет о количестве продаваемого товара

После того как работник, требует запрос о «Количество и стоимость товара на складе», загружается Excel файл с соответствующей информацией. Запрос выполняется с помощью строки: SELECT \* FROM `furniture` WHERE `employee\_id` IS NULL AND `warehouse\_id` IS NOT NULL. На рисунке 33 показан Excel файл.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.033.png)

Рисунок 33 – Отчет о количестве товара на складах

После того как работник, требует запрос о «О заключенных договорах на поставку товар», загружается Excel файл с соответствующей информацией. Запрос выполняется с помощью строки: SELECT \* FROM `contract`. На рисунке 34 показан Excel файл.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.034.png)

Рисунок 34 – Отчет о договорах

После того как работник, требует запрос о «О продажах», загружается Excel файл с соответствующей информацией. Запрос выполняется с помощью строки: SELECT \* FROM `sales`. На рисунке 35 показан Excel файл.

![](Aspose.Words.3ef68380-d75d-4f9e-b5da-4da82b160bd3.035.png)

Рисунок 35 – Отчет о продажах


# <a name="_toc114752036"></a><a name="_toc135830821"></a>**ЗАКЛЮЧЕНИЕ**
В результате выполнения курсового проекта был разработан информационно-программный комплекс директора магазина мебели, который позволяет решать задачи, связанные с предметной областью. Были изучены и описаны основные аспекты предметной области, разработана инфологическая модель данных и преобразована в даталогическую реляционную модель. Была обеспечена перевод даталогической модели в физическую среду MySQL и наполнена БД данными. Были составлены запросы к БД, и реализован пользовательский интерфейс с помощью HTML, CSS, JavaScript и PHP. В результате тестирования программы было установлено ее корректное функционирование.
# <a name="_toc114752037"></a><a name="_toc135830822"></a>**СПИСОК ИСПОЛЬЗОВАННЫХ ИСТОЧНИКОВ**
- 1. Проектирование структуры базы данных: пособие по курсовому проектированию. Изд. 2-е, испр. и доп. / А.М. Верхолат, В.П. Суслов; Балт. гос. техн. ун-т. – СПб., 2018. – 65 с. (дата обращения 01.05.2023)
- 1. MySQL. – URL: <https://www.mysql.com> (дата обращения 01.05.2023)
- 1. SQL | Инструкция по управлению системой. – URL: <https://translated.turbopages.org/proxy_u/en-ru.ru.e9aac97b-646150de-4d417f49-74722d776562/https/docs.oracle.com/en/database/oracle/oracle-database/19/cncpt/sql.html> (дата обращения 01.05.2023)
- 1. SQL Tutorial. – URL: <https://www.w3schools.com/sql> (дата обращения 01.05.2023)
- 1. SQLZOO. – URL: <https://sqlzoo.net/wiki/SQL_Tutorial> (дата обращения 01.05.2023)
- 1. SQLBolt. – URL: <https://sqlbolt.com> (дата обращения 01.05.2023)//сделать как здесь


<a name="_toc108072360"></a><a name="_toc135589818"></a><a name="_toc135830823"></a>**ПРИЛОЖЕНИЕ А
Тексты файлов**
==================================================================================================
Исходные тексты программы находятся в приложенном архиве.
-
4
