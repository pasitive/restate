<?php
/**
 * @author Denis A Boldinov
 *
 * @copyright
 * Copyright (c) 2012 Denis A Boldinov
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
 * LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
 * NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 */

class DbConnection extends CDbConnection
{
    // Connection
    public $connectionString = 'mysql:host=127.0.0.1;dbname=zapad';
//    public $username = 'zapad';
//    public $password = 'des9she6ghel2aid';
    public $username = 'root';
    public $password = '';
    public $charset = 'UTF8';
    public $emulatePrepare = true;

    // Caching
    public $schemaCachingDuration = 2592000; // 3 дня
    public $queryCachingDuration = 86400; // 1 день

    // Logging
    public $enableParamLogging = false;
    public $enableProfiling = true;

    public function __construct()
    {
        parent::__construct($this->connectionString, $this->username, $this->password);
    }


}