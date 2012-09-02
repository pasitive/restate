<?php

class m120423_175704_metro_update extends CDbMigration
{
    public function up()
    {
        $db = Yii::app()->db;

        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $this->truncateTable('metro_station');
        $this->execute('SET FOREIGN_KEY_CHECKS=1;');

        $sql = <<<EOL
INSERT INTO `city` (`id`, `name`) VALUES (2, 'Москва');
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Авиамоторная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Автозаводская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Академическая', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Александровский Сад', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Алексеевская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Алтуфьево', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Аннино', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Арбатская (ар.)', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Арбатская (фил.)', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Аэропорт', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Бабушкинская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Багратионовская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Баррикадная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Бауманская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Беговая', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Белорусская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Беляево', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Бибирево', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Библиотека имени Ленина', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Битцевский Парк', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Боровицкая', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Ботанический Сад', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Братиславская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Бульвар Дмитрия Донского', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Бунинская аллея', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Варшавская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('ВДНХ', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Владыкино', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Водный Стадион', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Войковская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Волгоградский Проспект', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Волжская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Волоколамская (стр.)', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Воробьевы горы', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Выхино', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Горчакова ул.', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Деловой центр', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Динамо', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Дмитровская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Добрынинская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Домодедовская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Дубровка', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Измайловская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Калужская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Кантемировская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Каховская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Каширская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Киевская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Китай-Город', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Кожуховская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Коломенская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Комсомольская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Коньково', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Красногвардейская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Краснопресненская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Красносельская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Красные Ворота', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Крестьянская застава', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Кропоткинская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Крылатское', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Кузнецкий Мост', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Кузьминки', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Кунцевская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Курская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Кутузовская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Ленинский Проспект', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Лубянка', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Люблино', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Марксистская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Марьино', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Маяковская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Медведково', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Международная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Менделеевская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Митино (стр.)', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Молодежная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Нагатинская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Нагорная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Нахимовский Проспект', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Новогиреево', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Новокузнецкая', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Новослободская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Новые Черёмушки', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Октябрьская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Октябрьское Поле', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Орехово', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Отрадное', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Охотный Ряд', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Павелецкая', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Парк Культуры', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Парк Победы', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Партизанская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Первомайская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Перово', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Петровско-Разумовская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Печатники', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Пионерская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Планерная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Площадь Ильича', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Площадь Революции', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Полежаевская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Полянка', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Пражская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Преображенская Площадь', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Пролетарская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Проспект Вернадского', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Проспект Мира', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Профсоюзная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Пушкинская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Речной Вокзал', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Рижская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Римская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Рязанский Проспект', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Савеловская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Свиблово', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Севастопольская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Семеновская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Серпуховская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Скобелевская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Смоленская (ар.)', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Смоленская (фил.)', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Сокол', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Сокольники', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Спортивная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Старокачаловская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Строгино (стр.)', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Студенческая', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Сухаревская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Сходненская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Таганская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Тверская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Театральная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Текстильщики', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Теплый Стан', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Тимирязевская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Третьяковская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Тульская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Тургеневская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Тушинская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Улица 1905 года', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Улица Академика Янгеля', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Улица Подбельского', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Университет', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Ушакова Адмирала', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Филевский Парк', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Фили', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Фрунзенская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Царицыно', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Цветной Бульвар', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Черкизовская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Чертановская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Чеховская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Чистые Пруды', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Чкаловская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Шаболовская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Шоссе Энтузиастов', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Щелковская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Щукинская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Электрозаводская', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Юго-Западная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Южная', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Ясенево', 2);
INSERT INTO `metro_station` (`name`, `city_id`) VALUES ('Трубная', 2);
EOL;
        ;

        $db->createCommand($sql)->execute();
    }

    public function down()
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0;');
        $this->truncateTable('metro_station');
        $this->execute('SET FOREIGN_KEY_CHECKS=1;');
    }

    /*
     // Use safeUp/safeDown to do migration with transaction
     public function safeUp()
     {
     }

     public function safeDown()
     {
     }
     */
}