<?php
class Hash{
    /**
     * @param $algoritm алгоритм md5
     * @param $data объект кодирования
     * @param $key одинаково по всему сайту
     * @return string  возвращение строки
     */
    //Hash::create('md5','passwordhere','SaltIfThereIsOne');
    public static function create($algoritm,$data,$key){
        $content_pass = hash_init($algoritm, HASH_HMAC,$key);
        hash_update($content_pass,$data);

        return hash_final($content_pass);
    }
}