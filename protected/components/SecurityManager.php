<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 10/20/11
 * Time: 3:52 PM
 *
 * Алгоритм усиления будет следующим:
 * если n’ый символ в MD5-хэше от plain-текста (нешифрованного текста) является цифрой,
 * то в соленом хэше он поменяется на спецсимвол, номер которого в ранее объявленном массиве
 * соответствует этой цифре. То есть второй символ в plain-строке - ноль.
 * Следовательно, он заменит символ «6» в соленой строке символом «~».
 * Далее, второе условие: если n’ый символ в MD5-хэше от plain-текста является буквой и попадает в диапазон a-d,
 * то в соленой строке он переводится в верхний регистр.
 * Ну и если ни одно из условий не выполняется, то в соленой строке он поменяется на символ с соответствующим
 * порядковым номером из строки md5(md5(pass).md5(salt)).
 */

class SecurityManager extends CSecurityManager
{
    protected $spec = array('~', '!', '@', '#', '$', '%', '^', '&', '*', '?');

    public function hashPassword($password, $salt)
    {
        // Соленая строка
        $saltString = md5(md5($password) . md5($salt));

        // Несоленая строка
        $hashedString = md5($password);

        //Результат
        $temp = '';

        for ($i = 0; $i < strlen($saltString); $i++) {
            // Если $i-ый символ число, то заменяем его спецсимволом из $spec
            if (ord($hashedString[$i]) >= 48 and ord($hashedString[$i]) <= 57) {
                $temp .= $this->spec[$hashedString[$i]];
            } // Если preg_match('/[a-d]/', $i) - то в соленой строке переводим его в верхний регистр
            elseif (ord($hashedString[$i]) >= 97 and ord($hashedString[$i]) <= 100) {
                $temp .= strtoupper($saltString[$i]);
            } // Заменяем на символ с соответствующмим порядковым номером из соленой строки
            else {
                $temp .= $saltString[$i];
            }

        }
        return md5($temp);
    }

    public function getRandomKey()
    {
        return parent::generateRandomKey();
    }
}
